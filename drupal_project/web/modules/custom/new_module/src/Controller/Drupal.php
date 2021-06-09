<?php

namespace Drupal\new_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class Drupal extends ControllerBase {

  public function hello() {
    return array(
      '#markup' => 'Welcome to our Website.'
    );
  }
}