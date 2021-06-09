<?php

namespace Drupal\custom_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class testone extends ControllerBase {

  public function welcome() {
    return array(
      '#markup' => 'Welcome to our Website.'
    );
  }
}