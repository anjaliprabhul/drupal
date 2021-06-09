<?php

/**
* @file
* Contains \Drupal\new_module\Form\SimpleForm.
*/
namespace Drupal\new_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;


class SimpleForm extends FormBase {

  /**
   * @return string
   */
  public function getFormId() {
    return 'simple_form_api';
  }
  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
  */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    // Item
    $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('This example shows how to add some inputs'),
    ];

    // Textfield.
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#size' => 60,
      '#maxlength' => 128,
    ];

    // CheckBoxes.
    $form['test_checkboxes'] = [
      '#type' => 'checkboxes',
      '#options' => ['drupal' => $this->t('Drupal'), 'wordpress' => $this->t('Wordpress')],
      '#title' => $this->t('Are you developer :'),
    ];
    return $form;
  }
	  

  public function validateForm(array &$form, FormStateInterface $form_state) {
    
  }
	public function submitForm(array &$form, FormStateInterface $form_state) {
    
  }

}