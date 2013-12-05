<?php
/**
 * @file
 *
 * I do stuff
 */

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HelloController
 * @package Drupal\hello\controller
 *
 * I do something
 */
class HelloController extends ControllerBase implements ContainerInjectionInterface {

  public static function create(ContainerInterface $container) {
    return new static($container);
  }

  public function helloPage() {
    $build = array(
      '#attached' => array(
        'css' => array(
          drupal_get_path('module', 'hello') . '/css/hello.css',
        ),
      ),

      'test' => array(
        '#type' => 'markup',
        '#markup' => drupal_get_path('module', 'hello') . '/css/hello.css',
      ),

      'hello' => array(
        '#theme' => 'hello_item',
        '#attributes' => array('class' => 'hello-markup'),
        '#text' => t('Hello World - We just themed the hell out of drupal 8'),
      ),
    );

    return $build;
  }
}
