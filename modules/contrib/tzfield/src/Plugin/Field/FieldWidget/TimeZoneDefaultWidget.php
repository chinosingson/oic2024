<?php

namespace Drupal\tzfield\Plugin\Field\FieldWidget;

use Drupal\Core\Datetime\TimeZoneFormHelper;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the time zone default widget.
 *
 * @FieldWidget(
 *   id = "tzfield_default",
 *   label = @Translation("Time zone"),
 *   field_types = {
 *     "tzfield"
 *   }
 * )
 */
class TimeZoneDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line Core has not yet documented this method properly.
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    // @phpstan-ignore-next-line BC shim for Drupal < 10.1.
    $timezones = class_exists(TimeZoneFormHelper::class) ? TimeZoneFormHelper::getOptionsListByRegion(!$element['#required']) : system_time_zones(!$element['#required'], TRUE);
    $exclude = $this->getFieldSetting('exclude');
    if (!is_array($exclude)) {
      $exclude = [];
    }
    if ($exclude) {
      foreach ($timezones as $group_key => $timezone_group) {
        // UTC is not in a group.
        if ($group_key && in_array($group_key, $exclude)) {
          unset($timezones[$group_key]);
        }
        foreach ($timezone_group as $timezone => $timezone_label) {
          if (in_array($timezone, $exclude)) {
            unset($timezones[$group_key][$timezone]);
          }
          if (empty($timezones[$group_key])) {
            unset($timezones[$group_key]);
          }
        }
      }
    }
    $element['value'] = $element + [
      '#type' => 'select',
      '#options' => $timezones,
      '#default_value' => $items[$delta]->value ?? NULL,
    ];
    return $element;
  }

}
