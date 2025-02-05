<?php

namespace Drupal\n1ed\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Provides route responses for Flmngr file manager.
 */
class N1EDController extends ControllerBase {

  /**
   * Drupal\Core\Config\ConfigFactoryInterface definition.
   *
   * @var Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Symfony\Component\HttpFoundation\RequestStack definition.
   *
   * @var Symfony\Component\HttpFoundation\RequestStack
   */
  private $requestStack;

  /**
   * {@inheritdoc}
   */
  public function __construct(ConfigFactoryInterface $config_factory,
      RequestStack $request_stack) {
    $this->configFactory = $config_factory;
    $this->requestStack = $request_stack;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('request_stack')
    );
  }

  /**
   * Sets API key into Drupal config.
   */
  public function setApiKey() {
    $apiKey = $this->requestStack->getCurrentRequest()->request->get("n1edApiKey");

    if ($apiKey == NULL) {
      throw new AccessDeniedHttpException();
    }

    $config = $this->configFactory->getEditable('n1ed.settings');
    $config->set('apikey', $apiKey);
    $config->set('token', null); // no token since long (24) API keys
    $config->set('integrationType', 'n1ed');
    $config->save(TRUE);

    // Force caching the value
    n1ed_get_integration_type(null);

    return new Response();
  }

  /**
   * Toggles on the option defining attaching file manager to Drupaд file fields.
   */
  public function toggleUseFlmngrOnFileFields() {
    $useFlmngrOnFileFields = json_decode(file_get_contents('php://input'))->useFlmngrOnFileFields;
    $config = $this->configFactory->getEditable('n1ed.settings');
    $config->set('useFlmngrOnFileFields', $useFlmngrOnFileFields);
    $config->save(TRUE);
    return new Response();
  }

  /**
   * Toggles on the option defining attaching file manager to Drupa file fields.
   */
  public function toggleUseLegacyFlmngrBackend() {
    $useLegacyFlmngrBackend = json_decode(file_get_contents('php://input'))->useLegacyFlmngrBackend;
    $config = $this->configFactory->getEditable('n1ed.settings');
    $config->set('useLegacyFlmngrBackend', $useLegacyFlmngrBackend);
    $config->save(TRUE);
    return new Response();
  }

}
