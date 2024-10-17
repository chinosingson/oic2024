<?php

namespace Drupal\n1ed;

use Drupal\Core\Security\TrustedCallbackInterface;
use Drupal\Core\Url;

/**
 * Implements logic of attaching Flmngr file manager to file fields.
 */
class N1edFileField implements TrustedCallbackInterface {

  /**
   * Get trusted callbacks list.
   */
  public static function trustedCallbacks() {
    return ['preRenderWidget'];
  }

  /**
   * Processes widget form.
   */
  public static function processWidget(
    $element,
    $form_state,
    $form
  ) {

    try {

      // Parse acceptable extensions for the field
      $field_name = $element['#field_name'];

      $field_definition = NULL;
      $form_object = $form_state->getFormObject();
      if (method_exists($form_object, 'getEntity')) {
        $entity = $form_object->getEntity();
        if ($entity)
          $field_definition = $entity->getFieldDefinition($field_name);
      }
      if (!empty($field_definition)) {
        $field_settings = $field_definition->getSettings();
      }
      if (!empty($field_settings)) {
        $file_extensions = $field_settings['file_extensions'];
      }

      if (!empty($file_extensions)) {

        $extensions = explode(' ', $file_extensions);

      }
      else {

        error_log("Unable to parse extension list using the modern Drupal API");
        $extensions = $element['#upload_validators']['file_validate_extensions'][0] ?? ''; // Legacy Drupal 9 API
        if (empty($extensions)) {

          error_log("Unable to parse extension list using the legacy Drupal API, fallback to parent field");

          try {
            // Try to get settings of parent field
            // For example in case of file field inside paragraphs
            $parents = $element['#parents'];
            if (!empty($parents)) {
              $field_name = array_pop($parents);
              $entity_type = array_pop($parents);
              $field_storage = \Drupal::entityTypeManager()
                ->getStorage('field_config')
                ->loadByProperties([
                  'field_name' => $entity_type,
                ]);
              if (!empty($field_storage)) {
                $field_definition = reset($field_storage);
                $field_settings = $field_definition->getSettings();
                if (!empty($field_settings)) {
                  $extensions = $field_settings['file_extensions'];
                }
              }
            }
          } catch (Exception $e) {}

          if (empty($extensions)) {
            error_log("Unable to parse extension list from parent field, fallback to defaults");
            $extensions = "png gif jpg jpeg webp"; // Fallback defaults
          }

        }

      }

      $element['n1ed_file_field'] = [
        '#type' => 'hidden',
        '#attributes' => [
          'class' => ['n1ed-file-field-filefield'],
          'data-extensions' => $extensions,
          'data-multiple' => $element['#multiple'] ? 1 : 0,
        ],
      ];
      $element['#attached']['library'][] = 'n1ed/drupal.n1ed.filefield';
      $element['#pre_render'][] = [get_called_class(), 'preRenderWidget'];

    } catch (Exception $e) {
      // Not logging this exception:
      // probably this was just an appropriate widget we shouldn't process anyway.
      //
      //error_log("Unable to process an element, skipping it");
      //error_log(print_r($e));
    }

    return $element;
  }


  /**
   * Pre-renders widget form.
   */
  public static function preRenderWidget($element) {
    // Hide elements if there is already an uploaded file.
    if (!empty($element['#value']['fids'])) {
      $element['n1ed_file_field']['#access'] = FALSE;
    }
    return $element;
  }

}
