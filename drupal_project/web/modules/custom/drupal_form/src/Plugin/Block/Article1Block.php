<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\XaiBlock.
 */
namespace Drupal\drupal_form\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "Articles",
 *   admin_label = @Translation("Articles block"),
 *   category = @Translation("Custom article block ")
 * )
 */
class Article1Block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $node = \Drupal\node\Entity\Node::create(['type' => 'article']);
     $form = \Drupal::service('entity.form_builder')->getForm($node);
    return $form; 
  }
}
