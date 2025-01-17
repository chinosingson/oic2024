<?php

namespace Drupal\nd_visualshortcodes\Controller;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Form\FormState;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\filter\Entity\FilterFormat;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Template\TwigEnvironment;
use Drupal\shortcode\ShortcodeService;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;
use Drupal\Component\Utility\Html;

/**
 * nd_visualshortcodes Controller.
 */
class nd_visualshortcodesController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * The Twig environment.
   *
   * @var \Drupal\Core\Template\TwigEnvironment
   */
  protected $twig;

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $conn;

  /**
   * The Shortcode service.
   *
   * @var \Drupal\shortcode\ShortcodeService
   */
  protected $shortcode;

  /**
   * {@inheritdoc}
   */
  public function __construct(TwigEnvironment $twig, Connection $database, ShortcodeService $shortcode) {
    $this->twig = $twig;
    $this->conn = $database;
    $this->shortcode = $shortcode;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('twig'),
      $container->get('database'),
      $container->get('shortcode')
    );
  }

  /**
   * Returns a simple page.
   *
   * @return JsonResponse
   *   A simple renderable array.
   */
  public function nd_visualshortcodes_ajax_upload_img() {
    if (isset($_FILES ['files']['name']["style_background_image"])) {
      //$validators = array('file_validate_extensions' => array('png gif jpg jpeg'));
      $validators = [];

      $entity_type = 'nd_visualshortcodes';
      $entity_id = 'file_ajax';
      if(isset($_SERVER['HTTP_REFERER'])) {
        preg_match_all("/\/(\d+)/", $_SERVER['HTTP_REFERER'], $matches);
        $entity_id = $matches[1][0];
        if (strpos($_SERVER['HTTP_REFERER'], 'node') !== FALSE) {
          $entity_type = 'node';
        }
        elseif (strpos($_SERVER['HTTP_REFERER'], 'block') !== FALSE) {
          $entity_type = 'block';
        }
      }

      return new JsonResponse(array(
        'id' => 0,
        'error' => $entity_type . ':' . $entity_id
      ));


      if ($file = file_save_upload('style_background_image', $validators, 'public://', \Drupal\Core\File\FileSystemInterface::EXISTS_RENAME)) {
        \Drupal::service('file.usage')->add($file, 'file',  $entity_type, $entity_id, 1);
        $filename = $file->getFileUri();
        $medium = ImageStyle::load('thumbnail')->buildUrl($filename);
        return new JsonResponse(array(
          'id' => $file->id(),
          'url' => $filename,
          'entity:id' => $entity_type . ':' . $entity_id
        ));
      }
      else {
        return new JsonResponse(array('id' => 0));
      }
    }
    else {
      return new JsonResponse(array('id' => 0));
    }
  }

  /**
   *
   */
  public function nd_visualshortcodes_ajax_backend_layout() {
    $config = $this->config('nd_visualshortcodes.settings');
    if (!isset($_POST['code'])) {
      return new Response("");
    }

    $shortcodes = $this->nd_visualshortcodes_process_shortcodes($_POST['code'], $_POST['format']);
    $live_preview = $config->get('live_preview');

    $path = \Drupal::service('extension.list.module')->getPath('nd_visualshortcodes');
    $path .= '/templates/nd_visualshortcodes.html.twig';
    $template = $this->twig->load($path);

    $markup = $template->render([
      'output' => $shortcodes,
      'live_preview' => $live_preview
    ]);

    return new Response($markup);
  }

  public function nd_visualshortcodes_media_upload_image() {
    $query = \Drupal::entityQuery('file')->accessCheck(FALSE)->sort('fid', 'DESC')->range(0, 500);
    $entitys = $query->execute();
    $output = '<div class="nd-visualshortcodes-gallery-links">';
    $output .= '<form id="ajax-dackend-image-form"><div class="js-form-item form-item js-form-type-file form-type-file js-form-item-files-style-background-image form-item-files-style-background-image">
      <label for="edit-style-background-image">Upload Image</label>
        <input class="image-image-upload-vc  js-form-file form-file" onchange="nd_visualshortcodes_upload_img(this)" data-drupal-selector="edit-style-background-image" id="edit-style-background-image" name="files[style_background_image]" size="60" type="file">
      <span class="field-suffix"><i class="fa fa-spinner fa-spin loading hidden"></i></span>
        </div></form> <hr><ul id="list-item-images">';
    foreach ($entitys as $file) {
      $img = File::load($file);
      if ($img) {
        if (!\Drupal::service('file_system')->getDestinationFilename($img->getFileUri(), FileSystemInterface::EXISTS_ERROR)) {
          if ($img->getMimeType() == "image/jpeg" || $img->getMimeType() == "image/png" || $img->getMimeType() == "image/gif") {
            $filename = $img->getFileUri();
            $medium = ImageStyle::load('thumbnail')->buildUrl($filename);
            $files[] = array("link" => $medium, "id" => $file);
            $output .= '<li><a href="#" class="gallery-links"  data-id="' . $file . '" data-link="' . $medium . '" ><img src="' . $medium . '"></a></li>';
            // $output .='<a href="#" class="galimage"  >dddd'.$file.'</a>';
          }
        }
      }
    }
    $output .= '</ul></div><script>jQuery(function($){
    	$("ul#list-item-images").easyPaginate({
		    step:16,nextprev:false
	    });
    });</script>';

    return new Response($output);
  }

  function nd_visualshortcodes_ajax_shortcodes_list_add(Request $request) {
//    $type = $_POST['shortcode'];
    $type = \Drupal::request()->request->get('shortcode');

    // if ($type=="nd_save"){
    //   return new Response($element);
    // }
    $shortcodes = $this->shortcode->loadShortcodePlugins();
    // $shortcode = $shortcodes[$_POST['shortcode']];
    $function = '_nd_visualshortcodes_backend_element';
    if (isset($shortcodes[$type]['process_backend_callback'])) {
      $element = call_user_func($shortcodes[$type]['process_backend_callback'], [], '', $type);
      return new Response($element);
    }

    $class = $shortcodes[$type]['class'];
    $method = 'process';
    if (method_exists($class, $method)) {
      // $function="$class::$method" ;
    }

    $element = call_user_func($function, [], '', $type);
    return new Response($element);

  }

  /**
   * Shortcodes list and filter (shown in pop-up).
   */
  function nd_visualshortcodes_ajax_shortcodes_list() {
    $shortcodes = $this->shortcode->loadShortcodePlugins();

    $query = $this->conn->select('nd_visualshortcodes_saved', 'n');
    $query->fields('n', ['id', 'name']);
    $saved = $query->execute()->fetchAllKeyed(0, 1);

    $path = \Drupal::service('extension.list.module')->getPath('nd_visualshortcodes');
    $path .= '/templates/filter-popup-list.html.twig';
    $template = $this->twig->load($path);

    $child = !empty($_POST['shortcode']) && isset($shortcodes[$_POST['shortcode']]['child_shortcode'])
      ? $shortcodes[$_POST['shortcode']]['child_shortcode']
      : '';

    $markup = $template->render([
      'shortcodes' => $shortcodes,
      'value' => $child,
      'saved' => $saved,
    ]);

    return new Response($markup);
  }

  /**
   * AJAX "admin_ajax/nd_visualshortcodes/ajax_backend_shortcode"
   * Return Form Ajax
   */
  function nd_visualshortcodes_ajax_backend_shortcode() {
    $form = \Drupal::formBuilder()
      ->getForm('Drupal\nd_visualshortcodes\Form\AjaxDackendShortcodeForm', $_POST);

    return new JsonResponse([
      array(
        'command' => 'shortcode_settings',
        'method' => NULL,
        'selector' => '#nd-visualshortcodes-shortcode-settings',
        'data' => \Drupal::service('renderer')->render($form),
      )
    ], 200, array("X-Drupal-Ajax-Token" => 1));

  }

  /**
   *
   */
  function nd_visualshortcodes_process_shortcodes($text, $format) {
    $text = trim($text);
    // Wrap any code in begining of the text, search to first shortcode
    $text = preg_replace('/^(?<!\[)([^\[]+)/si', "\n" . '[html]${1}[/html]${2}', $text);
    // Wrap any code on the end of the text
    $text = preg_replace('/(\])(?<!\[html)([^\]\[]+$)/si', '${1}[html]${2}[/html]', $text);
    // Wrap any code from the begining to the end of the text
    $text = preg_replace('/^(?<!\[)(?<!\[html\])([^\]\[]+$)/si', "\n" . '[html]{1}${2}${3}[/html]' . "\n", $text);
    // Wrap inside shortcode with next to another shortcode
    $text = preg_replace('/(\[[a-z]+[^\]]*\])(?<!\[html\])([\s]*)([^\s\[]+[^\[]+)/si', '${1}[html]${2}${3}[/html]', $text);
    // Wrap between two shortcodes
    $text = preg_replace('/(\[\/[a-z]+\])([\s]*)([^\s\[]+[^\[]+)/si', '${1}[html]${2}${3}[/html]', $text);
    // Clean double [html] tags
    $text = preg_replace('/(\[html[^\]]*\])[\s]*\[html[^\]]*\]/s', '${1}', $text);
    $text = preg_replace('/(\[\/html\])[\s]*\[\/html\]/s', '[/html]', $text);
    // Remove the empty [html] tags
    $text = preg_replace('/(\[html[^\]]*\])[\s]*\[\/html]*\]/s', '', $text);

    // $format->access()
    // $text=check_markup($text,$format);

    $shortcodeService = \Drupal::service('shortcode');
    $filter_format = FilterFormat::load($format);
    if ($filter_format) {
      foreach ($filter_format->filters() as $filter_name => $filter) {

        if ($filter->status) {
          $text = $this->_nd_visualshortcodes_backend_process($text, $filter);
          // $text=$shortcodeService->process($text, '', $filter) ;
        }
      }
    }

    return $text;
  }

  /**
   * Processes the Shortcodes according to the text and the text format.
   */
  function _nd_visualshortcodes_backend_process($text, $filter) {
    $shortcodeService = \Drupal::service('shortcode');
    $shortcodes = $shortcodeService->loadShortcodePlugins();
    $shortcodes_enabled = [];

    foreach ($filter->settings as $name => $value) {
      // print_r($shortcodes[$name]["status"]);
      if ($value && !empty($shortcodes[$name]['status'])) {
        $shortcodes_enabled[$name] = array(
          'function' => '_nd_visualshortcodes_backend_element',
        );
      }
    }

    if (empty($shortcodes_enabled)) {
      return $text;
    }

    // Save the Shortcodes in the local cache.
    // _shortcode_tags($shortcodes_enabled);

    // Processing recursively, now embeding tags within other tags is supported!
    $chunks = preg_split('!(\[{1,2}.*?\]{1,2})!', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

    $heap = array();
    $heap_index = array();

    foreach ($chunks as $c) {
      if (!$c) {
        continue;
      }

      $escaped = FALSE;

      if ((substr($c, 0, 2) == '[[') && (substr($c, -2, 2) == ']]')) {
        $escaped = TRUE;
        // Checks media tags, eg: [[{ }]].
        if ((substr($c, 0, 3) != '{') && (substr($c, -3, 1) != '}')) {
          // Removes the outer [].
          $c = substr($c, 1, -1);
        }
      }
      // Decide this is a Shortcode tag or not.
      if (!$escaped && ($c[0] == '[') && (substr($c, -1, 1) == ']')) {
        // The $c maybe contains Shortcode macro.

        // This is maybe a self-closing tag.
        // Removes outer [].
        $original_text = $c;
        $c = substr($c, 1, -1);
        $c = trim($c);

        $ts = explode(' ', $c);

        $tag = array_shift($ts);
        $tag = trim($tag, '/');

        if (!$shortcodeService->isValidShortcodeTag($tag)) {
          // if (!shortcode_is_tag($tag)) {
          // The current tag is not enabled.
          echo "1\n";
          array_unshift($heap_index, '_string_');
          array_unshift($heap, $original_text);
        }
        elseif (substr($c, -1, 1) == '/') {
          echo "2\n";
          // Processes a self closing tag, - it has "/" at the end-
          /*
           * The exploded array elements meaning:
           * 0 - the full tag text?
           * 1/5 - An extra [] to allow for escaping Shortcodes with double [[]].
           * 2 - The Shortcode name.
           * 3 - The Shortcode argument list.
           * 4 - The content of a Shortcode when it wraps some content.
           */

          $m = array(
            $c,
            '',
            $tag,
            implode(' ', $ts),
            NULL,
            '',
          );

          array_unshift($heap_index, '_string_');
          // $str = _nd_visualshortcodes_backend_element($m[4], $original_text, $el = '') ;
          // echo $ts."-".$tag;
          if ($shortcodes[$tag]['process_backend_callback']) {
            $element = call_user_func($shortcodes[$tag]['process_backend_callback'], $ts, $original_text, $tag);
            array_unshift($heap, $element);
          }
          else {
            array_unshift($heap, _nd_visualshortcodes_backend_element($ts, $original_text, $tag));
          }
        }
        elseif ($c[0] == '/') {

          // Indicate a closing tag, so we process the heap.
          $closing_tag = substr($c, 1);

          $process_heap = array();
          $process_heap_index = array();
          $found = FALSE;

          // Get elements from heap and process.
          do {
            $tag = array_shift($heap_index);
            $heap_text = array_shift($heap);

            if ($closing_tag == $tag) {
              // Process the whole tag.
              $m = array(
                $tag . ' ' . $heap_text,
                '',
                $tag,
                $heap_text,
                implode('', $process_heap),
                '',
              );

              $attrb = _nd_visualshortcodes_parse_attrs($m[3]);

              if (isset($shortcodes[$tag]['process_backend_callback']) && $shortcodes[$tag]['process_backend_callback']) {
                // echo $shortcodes[$tag]['process_backend_callback'];
                $element = call_user_func($shortcodes[$tag]['process_backend_callback'], $attrb, implode('', $process_heap), $tag);
                // echo $element;
                $str = $m[1] . $element . $m[5];
              }
              else {
                $str = $m[1] . _nd_visualshortcodes_backend_element($attrb, implode('', $process_heap), $tag) . $m[5];
              }
              array_unshift($heap_index, '_string_');
              array_unshift($heap, $str);
              $found = TRUE;
            }
            else {
              array_unshift($process_heap, $heap_text);
              array_unshift($process_heap_index, $tag);
            }
          } while (!$found && $heap);

          if (!$found) {
            foreach ($process_heap as $val) {
              array_unshift($heap, $val);
            }
            foreach ($process_heap_index as $val) {
              array_unshift($heap_index, $val);
            }
          }

        }
        else {
          // This is a starting tag. Put it to the heap.
          array_unshift($heap_index, $tag);
          array_unshift($heap, implode(' ', $ts));
        }
        // If escaped or not a Shortcode.
      }
      else {
        // Maybe not found a pair?
        array_unshift($heap_index, '_string_');
        array_unshift($heap, $c);
      }
      // End of foreach.
    }

    return (implode('', array_reverse($heap)));
  }

  function nd_visualshortcodes_ajax_backend_shortcode_preview(Request $request) {
    $data = \Drupal::request()->request->all();
    $el = $data['shortcode'] ?? '';
    $attrs = $data['attrs'] ?? [];

    $text = '';

    foreach ($attrs as $name => $value) {
      if (!$value) {
        unset($attrs[$name]);
      }
      if (strpos($name, '[format') !== FALSE) {
        $attrs['format'] = $value;
      }
      if (strpos($name, '[value') !== FALSE) {
        $text = $value;
      }
    }
    $preview = nd_visualshortcodes_preview($el, $attrs, $text);
    // $preview = '<div class = "nd_backend_preview">' . $preview . '</div>';
    return new Response($preview);
  }

  /**
   * Save shortcode.
   */
  function nd_visualshortcodes_ajax_shortcodes_save(Request $request) {
    // Todo: test.
    // array('name' => 'olla', 'code' => '[Col]').
    $this->conn->insert('nd_visualshortcodes_saved')->fields([
      'name' => $request->request->get('name'),
      'code' => $request->request->get('code'),
    ])->execute();

    return new Response("save");
  }

  /**
   * Delete shortcode.
   */
  function nd_visualshortcodes_ajax_shortcodes_delete_saved(Request $request) {
    $this->conn->delete('nd_visualshortcodes_saved')
      ->condition('id', $request->request->get('id'))
      ->execute();
    return new Response('delete');
  }

  function nd_visualshortcodes_ajax_icons_autocomplete() {
    $icons = array();
    // @todo: Where these two variables should be defined?
    $type = '';
    $str = '';

    if ($type == 'font_awesome' || $type == 'all') {
      $font_awesome = nd_visualshortcodes_fontawesome_icons();
      $icons = array_merge($icons, $font_awesome);
    }
    if ($type == 'brands' || $type == 'all') {
      $brands = array(
        'icon-duckduckgo',
        'icon-aim',
        'icon-delicious',
        'icon-paypal',
        'icon-flattr',
        'icon-android',
        'icon-eventful',
        'icon-smashmag',
        'icon-gplus',
        'icon-wikipedia',
        'icon-lanyrd',
        'icon-calendar',
        'icon-stumbleupon',
        'icon-fivehundredpx',
        'icon-pinterest',
        'icon-bitcoin',
        'icon-w3c',
        'icon-foursquare',
        'icon-html5',
        'icon-ie',
        'icon-call',
        'icon-grooveshark',
        'icon-ninetyninedesigns',
        'icon-forrst',
        'icon-digg',
        'icon-spotify',
        'icon-reddit',
        'icon-guest',
        'icon-gowalla',
        'icon-appstore',
        'icon-blogger',
        'icon-cc',
        'icon-dribbble',
        'icon-evernote',
        'icon-flickr',
        'icon-google',
        'icon-viadeo',
        'icon-instapaper',
        'icon-weibo',
        'icon-klout',
        'icon-linkedin',
        'icon-meetup',
        'icon-vk',
        'icon-plancast',
        'icon-disqus',
        'icon-rss',
        'icon-skype',
        'icon-twitter',
        'icon-youtube',
        'icon-vimeo',
        'icon-windows',
        'icon-xing',
        'icon-yahoo',
        'icon-chrome',
        'icon-email',
        'icon-macstore',
        'icon-myspace',
        'icon-podcast',
        'icon-amazon',
        'icon-steam',
        'icon-cloudapp',
        'icon-dropbox',
        'icon-ebay',
        'icon-facebook',
        'icon-github',
        'icon-googleplay',
        'icon-itunes',
        'icon-plurk',
        'icon-songkick',
        'icon-lastfm',
        'icon-gmail',
        'icon-pinboard',
        'icon-openid',
        'icon-quora',
        'icon-soundcloud',
        'icon-tumblr',
        'icon-eventasaurus',
        'icon-wordpress',
        'icon-yelp',
        'icon-intensedebate',
        'icon-eventbrite',
        'icon-scribd',
        'icon-posterous',
        'icon-stripe',
        'icon-opentable',
        'icon-cart',
        'icon-print',
        'icon-angellist',
        'icon-instagram',
        'icon-dwolla',
        'icon-appnet',
        'icon-statusnet',
        'icon-acrobat',
        'icon-drupal',
        'icon-buffer',
        'icon-pocket',
        'icon-bitbucket'
      );
      $icons = array_merge($icons, $brands);
    }
    $matches = array();
    foreach ($icons as $icon) {
      if (stripos($icon, $str) !== FALSE) {
        $matches[$icon] = '<i class = "' . $icon . '"><i> ' . $icon;
      }
    }

    return new JsonResponse($matches);
  }

  function nd_visualshortcodes_ajax_node_autocomplete() {
    $query = $this->conn->select('node', 'n');
    // $str = '';
    $return = $query->fields('n', ['nid', 'title'])
      ->condition('n.title', '%' . $query->escapeLike($str) . '%', 'LIKE')
      ->range(0, 15)
      ->execute();

    $matches = [];
    foreach ($return as $row) {
      $matches['node/' . $row->nid . '/edit'] = Html::escape($row->title);
    }

    return new JsonResponse($matches);
  }
}
