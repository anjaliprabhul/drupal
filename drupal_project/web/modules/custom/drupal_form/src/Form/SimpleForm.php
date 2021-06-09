<?php

namespace Drupal\drupal_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;


class SimpleForm extends FormBase {

  /**
   * @return string
   */
  public function getFormId() 
  {
    return 'simple_form_api';
  }
  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
  */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
 
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#size' => 60,
      '#maxlength' => 128,
    ];
    $form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('Password:'),
      '#size' => 20,
      '#maxlength' => 128,
    ];
    $form['phone_no'] = [
      '#type' => 'tel',
      '#title' => $this->t('PhoneNo:'),
      '#size' => 15,
      '#maxlength' => 128,
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email id:'),
      '#size' => 20,
      '#maxlength' => 128,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $email = $form_state->getValue('email');
    $db = \Drupal::database();
    $result = $db->select('drupal_form', 'pf')
    ->fields('pf', ['name'])
    ->condition('pf.name', $name, '=')
    ->execute()
    ->fetchAll();
    foreach ($result as $value) {
      $ename = $value->name;
    }
    $result1 = $db->select('drupal_form', 'pf')
    ->fields('pf', ['email'])
    ->condition('pf.email', $email, '=')
    ->execute()
    ->fetchAll();
    foreach ($result as $value) {
      $email = $value->email;
    }

    if(!empty($ename)) {
      $form_state->setErrorByName('name', 'Name already exists!');
    }
    if (!empty($email)) {
      $form_state->setErrorByName('email', 'Email already exists!');
    }
  }
	public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::database()->insert('drupal_form')
    ->fields([
      'name' => $form_state->getValue('name'),
      'password' => $form_state->getValue('password'),
      'phone_no' => $form_state->getValue('phone_no'),
      'email' => $form_state->getValue('email'),
     ])
      ->execute();
    }
  }
  