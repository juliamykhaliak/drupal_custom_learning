<?php

namespace Drupal\view_field\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * @ingroup views_field_handlers
 *
 * @ViewsField("view_field_two_field_math")
 */
class ViewFieldTwoFieldMath extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    parent::query(); // TODO: Change the autogenerated stub
  }
  
  /**
   * {@inheritdoc}
   */
  public function defineOptions() {
    return parent::defineOptions(); // TODO: Change the autogenerated stub
  }
  
  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state); // TODO: Change the autogenerated stub
  }
  
  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    return parent::render($values); // TODO: Change the autogenerated stub
  }
  
  /**
   * {@inheritdoc}
   */
  public function getFieldOptions() {
  
  }

}
