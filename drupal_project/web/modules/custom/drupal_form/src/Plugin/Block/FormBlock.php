<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\XaiBlock.
 */
namespace Drupal\drupal_form\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "custom_form",
 *   admin_label = @Translation("Article block"),
 *   category = @Translation("Custom article block example")
 * )
 */
class FormBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    // return array(
    //   '#type' => 'markup',
    //   '#markup' => 'This block list the article.',
    // );
    $form = \Drupal::formBuilder()->getForm('Drupal\drupal_form\Form\SimpleForm');
    return $form;	
  }
}
