<?php
 namespace Drupal\event_request\Controller;

 use Drupal\Core\Controller\ControllerBase;

 class MyController extends ControllerBase {

  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This is restricted content.'),
    );
  }
}
