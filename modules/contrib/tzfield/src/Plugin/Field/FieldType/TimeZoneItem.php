<?php

namespace Drupal\tzfield\Plugin\Field\FieldType;

use Drupal\Core\Datetime\TimeZoneFormHelper;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the time zone field type.
 *
 * @FieldType(
 *   id = "tzfield",
 *   label = @Translation("Time zone"),
 *   description = @Translation("This field stores a time zone in the database."),
 *   default_widget = "tzfield_default",
 *   default_formatter = "basic_string"
 * )
 */
class TimeZoneItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line Core has not yet documented this method properly.
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'varchar',
          'length' => 50,
        ],
      ],
      'indexes' => [
        'value' => [
          'value',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Time zone'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line Core has not yet documented this method properly.
   */
  public function getConstraints() {
    $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
    $constraints = parent::getConstraints();

    $max_length = 50;
    $constraints[] = $constraint_manager->create('ComplexData', [
      'value' => [
        'AllowedValues' => [
          'callback' => [\DateTimeZone::class, 'listIdentifiers'],
          'message' => $this->t('%name: The value you selected is not a valid time zone identifier.', [
            '%name' => $this->getFieldDefinition()->getLabel(),
          ]),
        ],
        'Length' => [
          'max' => $max_length,
          'maxMessage' => $this->t('%name: The time zone name may not be longer than @max characters.', [
            '%name' => $this->getFieldDefinition()->getLabel(),
            '@max' => $max_length,
          ]),
        ],
      ],
    ]);

    return $constraints;
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line Core has not yet documented this method properly.
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {
    // @phpstan-ignore-next-line BC shim for Drupal < 10.1.
    $values['value'] = array_rand(class_exists(TimeZoneFormHelper::class) ? TimeZoneFormHelper::getOptionsList() : system_time_zones());
    return $values;
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line Core has not yet documented this method properly.
   */
  public static function defaultFieldSettings() {
    return ['exclude' => [], 'default_site' => FALSE, 'default_user' => FALSE] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function applyDefaultValue($notify = TRUE) {
    parent::applyDefaultValue($notify);
    if ($this->getSetting('default_site')) {
      $this->setValue(['value' => \Drupal::config('system.date')->get('timezone.default')], $notify);
    }
    if ($this->getSetting('default_user') && \Drupal::currentUser()->getTimeZone()) {
      $this->setValue(['value' => \Drupal::currentUser()->getTimeZone()], $notify);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line Core has not yet documented this method properly.
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::fieldSettingsForm($form, $form_state);

    $element['exclude'] = [
      '#title' => $this->t('Time zones to be excluded from the option list'),
      '#type' => 'select',
      '#multiple' => TRUE,
      // @phpstan-ignore-next-line BC shim for Drupal < 10.1.
      '#options' => class_exists(TimeZoneFormHelper::class) ? TimeZoneFormHelper::getOptionsListByRegion() : system_time_zones(FALSE, TRUE),
      '#default_value' => $this->getSetting('exclude'),
      '#size' => 20,
      '#description' => $this->t('Any time zones selected here will be excluded from the allowed values.'),
    ];
    $element['default_site'] = [
      '#title' => $this->t("Use site's default time zone as default value"),
      '#type' => 'checkbox',
      '#default_value' => $this->getSetting('default_site'),
      '#states' => ['disabled' => [':input[name="set_default_value"]' => ['checked' => TRUE]]],
    ];
    if (\Drupal::config('system.date')->get('timezone.user.configurable')) {
      $element['default_user'] = $element['default_site'];
      $element['default_user']['#title'] = $this->t("Use current user's time zone as default value");
      $element['default_user']['#default_value'] = $this->getSetting('default_user');
      $element['default_user']['#description'] = $this->t("If both <em>Use site's default time zone</em> and <em>Use current user's time zone</em> are checked and the current user does not have a time zone, the site's default time zone will be used as a fallback.");
    }
    return $element;
  }

}
