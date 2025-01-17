<?php

namespace Drupal\jango_shortcodes\Controller;

use Drupal\Component\Utility\Html;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller routines for page example routes.
 */
class JangoShortcodesController extends ControllerBase {

  /**
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function ajax_icons_autocomplete(Request $request) {
    $matches = array();
    $string = $request->query->get('q');
    if ($string) {
      $simplelineicons = array(
        'icon-user',
        'icon-user-female',
        'icon-users',
        'icon-user-follow',
        'icon-user-following',
        'icon-user-unfollow',
        'icon-trophy',
        'icon-speedometer',
        'icon-social-youtube',
        'icon-social-twitter',
        'icon-social-tumblr',
        'icon-social-facebook',
        'icon-social-dropbox',
        'icon-social-dribbble',
        'icon-shield',
        'icon-screen-tablet',
        'icon-screen-smartphone',
        'icon-screen-desktop',
        'icon-plane',
        'icon-notebook',
        'icon-moustache',
        'icon-mouse',
        'icon-magnet',
        'icon-magic-wand',
        'icon-hourglass',
        'icon-graduation',
        'icon-ghost',
        'icon-game-controller',
        'icon-fire',
        'icon-eyeglasses',
        'icon-envelope-open',
        'icon-envelope-letter',
        'icon-energy',
        'icon-emoticon-smile',
        'icon-disc',
        'icon-cursor-move',
        'icon-crop',
        'icon-credit-card',
        'icon-chemistry',
        'icon-bell',
        'icon-badge',
        'icon-anchor',
        'icon-action-redo',
        'icon-action-undo',
        'icon-bag',
        'icon-basket',
        'icon-basket-loaded',
        'icon-book-open',
        'icon-briefcase',
        'icon-bubbles',
        'icon-calculator',
        'icon-call-end',
        'icon-call-in',
        'icon-call-out',
        'icon-compass',
        'icon-cup',
        'icon-diamond',
        'icon-direction',
        'icon-directions',
        'icon-docs',
        'icon-drawer',
        'icon-drop',
        'icon-earphones',
        'icon-earphones-alt',
        'icon-feed',
        'icon-film',
        'icon-folder-alt',
        'icon-frame',
        'icon-globe',
        'icon-globe-alt',
        'icon-handbag',
        'icon-layers',
        'icon-map',
        'icon-picture',
        'icon-pin',
        'icon-playlist',
        'icon-present',
        'icon-printer',
        'icon-puzzle',
        'icon-speech',
        'icon-vector',
        'icon-wallet',
        'icon-arrow-down',
        'icon-arrow-left',
        'icon-arrow-right',
        'icon-arrow-up',
        'icon-bar-chart',
        'icon-bulb',
        'icon-calendar',
        'icon-control-end',
        'icon-control-forward',
        'icon-control-pause',
        'icon-control-play',
        'icon-control-rewind',
        'icon-control-start',
        'icon-cursor',
        'icon-dislike',
        'icon-equalizer',
        'icon-graph',
        'icon-grid',
        'icon-home',
        'icon-like',
        'icon-list',
        'icon-login',
        'icon-logout',
        'icon-loop',
        'icon-microphone',
        'icon-music-tone',
        'icon-music-tone-alt',
        'icon-note',
        'icon-pencil',
        'icon-pie-chart',
        'icon-question',
        'icon-rocket',
        'icon-share',
        'icon-share-alt',
        'icon-shuffle',
        'icon-size-actual',
        'icon-size-fullscreen',
        'icon-support',
        'icon-tag',
        'icon-trash',
        'icon-umbrella',
        'icon-wrench',
        'icon-ban',
        'icon-bubble',
        'icon-camcorder',
        'icon-camera',
        'icon-check',
        'icon-clock',
        'icon-close',
        'icon-cloud-download',
        'icon-cloud-upload',
        'icon-doc',
        'icon-envelope',
        'icon-eye',
        'icon-flag',
        'icon-folder',
        'icon-heart',
        'icon-info',
        'icon-key',
        'icon-link',
        'icon-lock',
        'icon-lock-open',
        'icon-magnifier',
        'icon-magnifier-add',
        'icon-magnifier-remove',
        'icon-paper-clip',
        'icon-paper-plane',
        'icon-plus',
        'icon-pointer',
        'icon-power',
        'icon-refresh',
        'icon-reload',
        'icon-settings',
        'icon-star',
        'icon-symbol-female',
        'icon-symbol-male',
        'icon-target',
        'icon-volume-1',
        'icon-volume-2',
        'icon-volume-off',
        'fa fa-support'
      );
      $glyfon_icons = array(
        'glyphicon glyphicon-asterisk',
        'glyphicon glyphicon-plus',
        'glyphicon glyphicon-euro',
        'glyphicon glyphicon-minus',
        'glyphicon glyphicon-cloud',
        'glyphicon glyphicon-envelope',
        'glyphicon glyphicon-pencil',
        'glyphicon glyphicon-glass',
        'glyphicon glyphicon-music',
        'glyphicon glyphicon-search',
        'glyphicon glyphicon-heart',
        'glyphicon glyphicon-star',
        'glyphicon glyphicon-star-empty',
        'glyphicon glyphicon-user',
        'glyphicon glyphicon-film',
        'glyphicon glyphicon-th-large',
        'glyphicon glyphicon-th',
        'glyphicon glyphicon-th-list',
        'glyphicon glyphicon-ok',
        'glyphicon glyphicon-remove',
        'glyphicon glyphicon-zoom-in',
        'glyphicon glyphicon-zoom-out',
        'glyphicon glyphicon-off',
        'glyphicon glyphicon-signal',
        'glyphicon glyphicon-cog',
        'glyphicon glyphicon-trash',
        'glyphicon glyphicon-home',
        'glyphicon glyphicon-file',
        'glyphicon glyphicon-time',
        'glyphicon glyphicon-road',
        'glyphicon glyphicon-download-alt',
        'glyphicon glyphicon-download',
        'glyphicon glyphicon-upload',
        'glyphicon glyphicon-inbox',
        'glyphicon glyphicon-play-circle',
        'glyphicon glyphicon-repeat',
        'glyphicon glyphicon-refresh',
        'glyphicon glyphicon-list-alt',
        'glyphicon glyphicon-lock',
        'glyphicon glyphicon-flag',
        'glyphicon glyphicon-headphones',
        'glyphicon glyphicon-volume-off',
        'glyphicon glyphicon-volume-down',
        'glyphicon glyphicon-volume-up',
        'glyphicon glyphicon-qrcode',
        'glyphicon glyphicon-barcode',
        'glyphicon glyphicon-tag',
        'glyphicon glyphicon-tags',
        'glyphicon glyphicon-book',
        'glyphicon glyphicon-bookmark',
        'glyphicon glyphicon-print',
        'glyphicon glyphicon-camera',
        'glyphicon glyphicon-font',
        'glyphicon glyphicon-bold',
        'glyphicon glyphicon-italic',
        'glyphicon glyphicon-text-height',
        'glyphicon glyphicon-text-width',
        'glyphicon glyphicon-align-left',
        'glyphicon glyphicon-align-center',
        'glyphicon glyphicon-align-right',
        'glyphicon glyphicon-align-justify',
        'glyphicon glyphicon-list',
        'glyphicon glyphicon-indent-left',
        'glyphicon glyphicon-indent-right',
        'glyphicon glyphicon-facetime-video',
        'glyphicon glyphicon-picture',
        'glyphicon glyphicon-map-marker',
        'glyphicon glyphicon-adjust',
        'glyphicon glyphicon-tint',
        'glyphicon glyphicon-edit',
        'glyphicon glyphicon-share',
        'glyphicon glyphicon-check',
        'glyphicon glyphicon-move',
        'glyphicon glyphicon-step-backward',
        'glyphicon glyphicon-fast-backward',
        'glyphicon glyphicon-backward',
        'glyphicon glyphicon-play',
        'glyphicon glyphicon-pause',
        'glyphicon glyphicon-stop',
        'glyphicon glyphicon-forward',
        'glyphicon glyphicon-fast-forward',
        'glyphicon glyphicon-step-forward',
        'glyphicon glyphicon-eject',
        'glyphicon glyphicon-chevron-left',
        'glyphicon glyphicon-chevron-right',
        'glyphicon glyphicon-plus-sign',
        'glyphicon glyphicon-minus-sign',
        'glyphicon glyphicon-remove-sign',
        'glyphicon glyphicon-ok-sign',
        'glyphicon glyphicon-question-sign',
        'glyphicon glyphicon-info-sign',
        'glyphicon glyphicon-screenshot',
        'glyphicon glyphicon-remove-circle',
        'glyphicon glyphicon-ok-circle',
        'glyphicon glyphicon-ban-circle',
        'glyphicon glyphicon-arrow-left',
        'glyphicon glyphicon-arrow-right',
        'glyphicon glyphicon-arrow-up',
        'glyphicon glyphicon-arrow-down',
        'glyphicon glyphicon-share-alt',
        'glyphicon glyphicon-resize-full',
        'glyphicon glyphicon-resize-small',
        'glyphicon glyphicon-exclamation-sign',
        'glyphicon glyphicon-gift',
        'glyphicon glyphicon-leaf',
        'glyphicon glyphicon-fire',
        'glyphicon glyphicon-eye-open',
        'glyphicon glyphicon-eye-close',
        'glyphicon glyphicon-warning-sign',
        'glyphicon glyphicon-plane',
        'glyphicon glyphicon-calendar',
        'glyphicon glyphicon-random',
        'glyphicon glyphicon-comment',
        'glyphicon glyphicon-magnet',
        'glyphicon glyphicon-chevron-up',
        'glyphicon glyphicon-chevron-down',
        'glyphicon glyphicon-retweet',
        'glyphicon glyphicon-shopping-cart',
        'glyphicon glyphicon-folder-close',
        'glyphicon glyphicon-folder-open',
        'glyphicon glyphicon-resize-vertical',
        'glyphicon glyphicon-resize-horizontal',
        'glyphicon glyphicon-hdd',
        'glyphicon glyphicon-bullhorn',
        'glyphicon glyphicon-bell',
        'glyphicon glyphicon-certificate',
        'glyphicon glyphicon-thumbs-up',
        'glyphicon glyphicon-thumbs-down',
        'glyphicon glyphicon-hand-right',
        'glyphicon glyphicon-hand-left',
        'glyphicon glyphicon-hand-up',
        'glyphicon glyphicon-hand-down',
        'glyphicon glyphicon-circle-arrow-right',
        'glyphicon glyphicon-circle-arrow-left',
        'glyphicon glyphicon-circle-arrow-up',
        'glyphicon glyphicon-circle-arrow-down',
        'glyphicon glyphicon-globe',
        'glyphicon glyphicon-wrench',
        'glyphicon glyphicon-tasks',
        'glyphicon glyphicon-filter',
        'glyphicon glyphicon-briefcase',
        'glyphicon glyphicon-fullscreen',
        'glyphicon glyphicon-dashboard',
        'glyphicon glyphicon-paperclip',
        'glyphicon glyphicon-heart-empty',
        'glyphicon glyphicon-link',
        'glyphicon glyphicon-phone',
        'glyphicon glyphicon-pushpin',
        'glyphicon glyphicon-usd',
        'glyphicon glyphicon-gbp',
        'glyphicon glyphicon-sort',
        'glyphicon glyphicon-sort-by-alphabet',
        'glyphicon glyphicon-sort-by-alphabet-alt',
        'glyphicon glyphicon-sort-by-order',
        'glyphicon glyphicon-sort-by-order-alt',
        'glyphicon glyphicon-sort-by-attributes',
        'glyphicon glyphicon-sort-by-attributes-alt',
        'glyphicon glyphicon-unchecked',
        'glyphicon glyphicon-expand',
        'glyphicon glyphicon-collapse-down',
        'glyphicon glyphicon-collapse-up',
        'glyphicon glyphicon-log-in',
        'glyphicon glyphicon-flash',
        'glyphicon glyphicon-log-out',
        'glyphicon glyphicon-new-window',
        'glyphicon glyphicon-record',
        'glyphicon glyphicon-save',
        'glyphicon glyphicon-open',
        'glyphicon glyphicon-saved',
        'glyphicon glyphicon-import',
        'glyphicon glyphicon-export',
        'glyphicon glyphicon-send',
        'glyphicon glyphicon-floppy-disk',
        'glyphicon glyphicon-floppy-saved',
        'glyphicon glyphicon-floppy-remove',
        'glyphicon glyphicon-floppy-save',
        'glyphicon glyphicon-floppy-open',
        'glyphicon glyphicon-credit-card',
        'glyphicon glyphicon-transfer',
        'glyphicon glyphicon-cutlery',
        'glyphicon glyphicon-header',
        'glyphicon glyphicon-compressed',
        'glyphicon glyphicon-earphone',
        'glyphicon glyphicon-phone-alt',
        'glyphicon glyphicon-tower',
        'glyphicon glyphicon-stats',
        'glyphicon glyphicon-sd-video',
        'glyphicon glyphicon-hd-video',
        'glyphicon glyphicon-subtitles',
        'glyphicon glyphicon-sound-stereo',
        'glyphicon glyphicon-sound-dolby',
        'glyphicon glyphicon-sound-5-1',
        'glyphicon glyphicon-sound-6-1',
        'glyphicon glyphicon-sound-7-1',
        'glyphicon glyphicon-copyright-mark',
        'glyphicon glyphicon-registration-mark',
        'glyphicon glyphicon-cloud-download',
        'glyphicon glyphicon-cloud-upload',
        'glyphicon glyphicon-tree-conifer',
        'glyphicon glyphicon-tree-deciduous ',
        'glyphicon glyphicon-flag',
        'glyphicon glyphicon-headphones',
        'glyphicon glyphicon-volume-off',
        'glyphicon glyphicon-volume-down',
        'glyphicon glyphicon-volume-up',
        'glyphicon glyphicon-qrcode',
        'glyphicon glyphicon-barcode',
        'glyphicon glyphicon-tag',
        'glyphicon glyphicon-tags',
        'glyphicon glyphicon-book',
        'glyphicon glyphicon-bookmark',
        'glyphicon glyphicon-print',
        'glyphicon glyphicon-camera',
        'glyphicon glyphicon-font',
        'glyphicon glyphicon-bold',
        'glyphicon glyphicon-italic',
        'glyphicon glyphicon-text-height',
        'glyphicon glyphicon-text-width',
        'glyphicon glyphicon-align-left',
        'glyphicon glyphicon-align-center',
        'glyphicon glyphicon-align-right',
        'glyphicon glyphicon-align-justify',
        'glyphicon glyphicon-list',
        'glyphicon glyphicon-indent-left',
        'glyphicon glyphicon-indent-right',
        'glyphicon glyphicon-facetime-video',
        'glyphicon glyphicon-picture',
        'glyphicon glyphicon-map-marker',
        'glyphicon glyphicon-adjust',
        'glyphicon glyphicon-tint',
        'glyphicon glyphicon-edit',
        'glyphicon glyphicon-share',
        'glyphicon glyphicon-check',
        'glyphicon glyphicon-move',
        'glyphicon glyphicon-step-backward',
        'glyphicon glyphicon-fast-backward',
        'glyphicon glyphicon-backward',
        'glyphicon glyphicon-play',
        'glyphicon glyphicon-pause',
        'glyphicon glyphicon-stop',
        'glyphicon glyphicon-forward',
        'glyphicon glyphicon-fast-forward',
        'glyphicon glyphicon-step-forward',
        'glyphicon glyphicon-eject',
        'glyphicon glyphicon-chevron-left',
        'glyphicon glyphicon-chevron-right',
        'glyphicon glyphicon-plus-sign',
        'glyphicon glyphicon-minus-sign',
        'glyphicon glyphicon-remove-sign',
        'glyphicon glyphicon-ok-sign',
        'glyphicon glyphicon-question-sign',
        'glyphicon glyphicon-info-sign',
        'glyphicon glyphicon-screenshot',
        'glyphicon glyphicon-remove-circle',
        'glyphicon glyphicon-ok-circle',
        'glyphicon glyphicon-ban-circle',
        'glyphicon glyphicon-arrow-left',
        'glyphicon glyphicon-arrow-right',
        'glyphicon glyphicon-arrow-up',
        'glyphicon glyphicon-arrow-down',
        'glyphicon glyphicon-share-alt',
        'glyphicon glyphicon-resize-full',
        'glyphicon glyphicon-resize-small',
        'glyphicon glyphicon-exclamation-sign',
        'glyphicon glyphicon-gift',
        'glyphicon glyphicon-leaf',
        'glyphicon glyphicon-fire',
        'glyphicon glyphicon-eye-open',
        'glyphicon glyphicon-eye-close',
        'glyphicon glyphicon-warning-sign',
        'glyphicon glyphicon-plane',
        'glyphicon glyphicon-calendar',
        'glyphicon glyphicon-random',
        'glyphicon glyphicon-comment',
        'glyphicon glyphicon-magnet',
        'glyphicon glyphicon-chevron-up',
        'glyphicon glyphicon-chevron-down',
        'glyphicon glyphicon-retweet',
        'glyphicon glyphicon-shopping-cart',
        'glyphicon glyphicon-folder-close',
        'glyphicon glyphicon-folder-open',
        'glyphicon glyphicon-resize-vertical',
        'glyphicon glyphicon-resize-horizontal',
        'glyphicon glyphicon-hdd',
        'glyphicon glyphicon-bullhorn',
        'glyphicon glyphicon-bell',
        'glyphicon glyphicon-certificate',
        'glyphicon glyphicon-thumbs-up',
        'glyphicon glyphicon-thumbs-down',
        'glyphicon glyphicon-hand-right',
        'glyphicon glyphicon-hand-left',
        'glyphicon glyphicon-hand-up',
        'glyphicon glyphicon-hand-down',
        'glyphicon glyphicon-circle-arrow-right',
        'glyphicon glyphicon-circle-arrow-left',
        'glyphicon glyphicon-circle-arrow-up',
        'glyphicon glyphicon-circle-arrow-down',
        'glyphicon glyphicon-globe',
        'glyphicon glyphicon-wrench',
        'glyphicon glyphicon-tasks',
        'glyphicon glyphicon-filter',
        'glyphicon glyphicon-briefcase',
        'glyphicon glyphicon-fullscreen',
        'glyphicon glyphicon-dashboard',
        'glyphicon glyphicon-paperclip',
        'glyphicon glyphicon-heart-empty',
        'glyphicon glyphicon-link',
        'glyphicon glyphicon-phone',
        'glyphicon glyphicon-pushpin',
        'glyphicon glyphicon-usd',
        'glyphicon glyphicon-gbp',
        'glyphicon glyphicon-sort',
        'glyphicon glyphicon-sort-by-alphabet',
        'glyphicon glyphicon-sort-by-alphabet-alt',
        'glyphicon glyphicon-sort-by-order',
        'glyphicon glyphicon-sort-by-order-alt',
        'glyphicon glyphicon-sort-by-attributes',
        'glyphicon glyphicon-sort-by-attributes-alt',
        'glyphicon glyphicon-unchecked',
        'glyphicon glyphicon-expand',
        'glyphicon glyphicon-collapse-down',
        'glyphicon glyphicon-collapse-up',
        'glyphicon glyphicon-log-in',
        'glyphicon glyphicon-flash',
        'glyphicon glyphicon-log-out',
        'glyphicon glyphicon-new-window',
        'glyphicon glyphicon-record',
        'glyphicon glyphicon-save',
        'glyphicon glyphicon-open',
        'glyphicon glyphicon-saved',
        'glyphicon glyphicon-import',
        'glyphicon glyphicon-export',
        'glyphicon glyphicon-send',
        'glyphicon glyphicon-floppy-disk',
        'glyphicon glyphicon-floppy-saved',
        'glyphicon glyphicon-floppy-remove',
        'glyphicon glyphicon-floppy-save',
        'glyphicon glyphicon-floppy-open',
        'glyphicon glyphicon-credit-card',
        'glyphicon glyphicon-transfer',
        'glyphicon glyphicon-cutlery',
        'glyphicon glyphicon-header',
        'glyphicon glyphicon-compressed',
        'glyphicon glyphicon-earphone',
        'glyphicon glyphicon-phone-alt',
        'glyphicon glyphicon-tower',
        'glyphicon glyphicon-stats',
        'glyphicon glyphicon-sd-video',
        'glyphicon glyphicon-hd-video',
        'glyphicon glyphicon-subtitles',
        'glyphicon glyphicon-sound-stereo',
        'glyphicon glyphicon-sound-dolby',
        'glyphicon glyphicon-sound-5-1',
        'glyphicon glyphicon-sound-6-1',
        'glyphicon glyphicon-sound-7-1',
        'glyphicon glyphicon-copyright-mark',
        'glyphicon glyphicon-registration-mark',
        'glyphicon glyphicon-cloud-download',
        'glyphicon glyphicon-cloud-upload',
        'glyphicon glyphicon-tree-conifer',
        'glyphicon glyphicon-tree-deciduous'
      );
      $font_awesome = nd_visualshortcodes_fontawesome_icons();

      $icons = array_merge($simplelineicons, $font_awesome);
      $icons = array_merge($icons, $glyfon_icons);

      $matches = array();
      foreach ($icons as $icon) {
        if (stripos($icon, $string) !== FALSE) {
          $matches[] = [
            'value' => $icon,
            'label' => $icon,
          ];
        }
      }
    }
    return new JsonResponse(array_values($matches));
  }

  /**
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function ajax_custom_line__icons_autocomplete(Request $request) {
    $matches = array();
    $string = $request->query->get('q');
    if ($string) {
      $icons = array(
        'c-icon-1',
        'c-icon-2',
        'c-icon-3',
        'c-icon-4',
        'c-icon-5',
        'c-icon-6',
        'c-icon-7',
        'c-icon-8',
        'c-icon-9',
        'c-icon-10',
        'c-icon-11',
        'c-icon-12',
        'c-icon-13',
        'c-icon-14',
        'c-icon-15',
        'c-icon-16',
        'c-icon-17',
        'c-icon-18',
        'c-icon-19',
        'c-icon-20',
        'c-icon-21',
        'c-icon-22',
        'c-icon-23',
        'c-icon-24',
        'c-icon-25',
        'c-icon-26',
        'c-icon-27',
        'c-icon-28',
        'c-icon-29',
        'c-icon-30',
        'c-icon-31',
        'c-icon-32',
        'c-icon-33',
        'c-icon-34',
        'c-icon-35',
        'c-icon-36',
        'c-icon-37',
        'c-icon-38',
        'c-icon-39',
        'c-icon-40',
        'c-icon-41',
        'c-icon-42',
        'c-icon-43',
        'c-icon-44',
        'c-icon-45',
        'c-icon-46',
        'c-icon-47',
        'c-icon-48',
        'c-icon-49'
      );

      $matches = array();
      foreach ($icons as $icon) {
        if (stripos($icon, $string) !== FALSE) {
          $matches[] = [
            'value' => $icon,
            'label' => $icon,
          ];
        }
      }
    }
    return new JsonResponse(array_values($matches));
  }

  /**
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function ajax_social_icons_autocomplete(Request $request) {
    $matches = array();
    $string = $request->query->get('q');
    if ($string) {
      $icons = array(
        'twitter',
        'facebook',
        'google',
        'pinterest',
        'foursquare',
        'yahoo',
        'skype',
        'yelp',
        'feedburner',
        'linkedin',
        'viadeo',
        'myspace',
        'soundcloud',
        'spotify',
        'grooveshark',
        'lastfm',
        'youtube',
        'vimeo',
        'dailymotion',
        'vine',
        'flickr',
        '500px',
        'instagram',
        'wordpress',
        'tumblr',
        'blogger',
        'technorati',
        'reddit',
        'dribbble',
        'stumbleupon',
        'digg',
        'envato',
        'behance',
        'delicious',
        'deviantart',
        'forrst',
        'playstore',
        'zerply',
        'wikipedia',
        'apple',
        'flattr',
        'github',
        'chimein',
        'friendfeed',
        'newsvine',
        'identica',
        'bebo',
        'zynga',
        'steam',
        'xbox',
        'windows',
        'outlook',
        'coderwall',
        'tripadvisor',
        'appnet',
        'goodreads',
        'tripit',
        'lanyrd',
        'slideshare',
        'buffer',
        'rss',
        'vkontakte',
        'disqus',
        'houzz',
        'mail',
        'patreon',
        'paypal',
        'playstation',
        'smugmug',
        'swarm',
        'triplej',
        'yammer',
        'stackoverflow',
        'drupal',
        'odnoklassniki',
        'android',
        'meetup',
        'persona'
      );

      $matches = array();
      foreach ($icons as $icon) {
        if (stripos($icon, $string) !== FALSE) {
          $matches[] = [
            'value' => $icon,
            'label' => $icon,
          ];
        }
      }
    }
    return new JsonResponse(array_values($matches));
  }

  /**
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function ajax_node_autocomplete(Request $request) {
    $matches = array();
    $string = $request->query->get('q');
    if ($string) {
      $query = \Drupal::database()->select('node_field_data', 'nfd');
      $return = $query
        ->fields('nfd', array('nid', 'title'))
        ->condition('nfd.title', '%' . $query->escapeLike($string) . '%', 'LIKE')
        ->range(0, 15)
        ->execute();
      $matches = array();
      foreach ($return as $row) {
        $matches[] = [
          'value' => 'node/' . $row->nid . '/edit',
          'label' => Html::escape($row->title),
        ];
      }
    }
    return new JsonResponse(array_values($matches));
  }
}
