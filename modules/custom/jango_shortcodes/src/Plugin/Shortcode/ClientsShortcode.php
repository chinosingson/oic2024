<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\taxonomy\Entity\Term;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

/**
 * @Shortcode(
 *   id = "nd_client",
 *   title = @Translation("Clients"),
 *   description = @Translation("Clients."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */
class ClientsShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process(array $attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    if (!$attrs['category']) {
      return '';
    }

    $output = $text;
    $items = [];

    $query = \Drupal::database()
      ->select('taxonomy_term_data', 'ttd');
    $query->leftJoin('taxonomy_term_field_data', 'ttfd', 'ttd.tid = ttfd.tid');      
    $query->fields('ttd', ['tid'])
      ->condition('ttd.vid', $attrs['category'])
      ->orderBy('ttfd.name', 'ASC');
    $tids = $query->execute()->fetchCol();

    switch ($attrs['type']) {
      case 'carousel':
        foreach ($tids as $tid) {
          $term = Term::load($tid);
          $link = $term->get('field_link')->getValue();
          $uri = !empty($link[0]['uri']) ? $link[0]['uri'] : 'internal:#';
          $image_id = (int) $term->get('field_image_client_logo')->getValue()[0]['target_id'];
          $file = File::load($image_id);
          if ($file) {
            $image_uri = $file->getFileUri();
            $url = \Drupal::service('file_url_generator')->generateAbsoluteString($image_uri);
            $items[] = [
              'href' => Url::fromUri($uri)->toString(),
              'src' => $url,
            ];
          }
        }
        $theme_array = [
          '#theme' => 'jango_shortcodes_clients_carousel',
          '#items' => $items,
        ];
        $output = $this->render($theme_array);
        break;

      case 'block':
        $count = 0;
        foreach ($tids as $tid) {
          if ($count > 5) {
            break;
          }
          $term = Term::load($tid);
          $link = $term->get('field_link')->getValue();
          $uri = !empty($link[0]['uri']) ? $link[0]['uri'] : 'internal:#';
          $image_id = (int) $term->get('field_image_client_logo')->getValue()[0]['target_id'];
          $file = File::load($image_id);
          if ($file) {
            $image_uri = $file->getFileUri();
            $url = \Drupal::service('file_url_generator')->generateAbsoluteString($image_uri);
            $items[] = [
              'count' => $count,
              'href' => Url::fromUri($uri)->toString(),
              'src' => $url,
            ];
            $count++;
          }
        }
        $theme_array = [
          '#theme' => 'jango_shortcodes_clients_block',
          '#items' => $items,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings(array $attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'carousel' => 'Carousel clients',
      'block' => 'Block clients (3x2)',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'carousel',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['category'] = [
      '#type' => 'select',
      '#title' => t('Category'),
      '#options' => return_taxonomy_vocabularies(),
      '#default_value' => isset($attrs['category']) ? $attrs['category'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
