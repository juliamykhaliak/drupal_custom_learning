<?php

/**
 * @file
 * Contains \Drupal\helloworld\Form\CollectPhoneSettings.
 */

namespace Drupal\simpleform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\simpleform\Form;

/**
 * Class CollectFormSettings
 *
 * @package Drupal\simpleform\Form
 */
class CollectFormSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'collect_phone_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    // Returns the name of config file.
    return [
      'simpleform.collect_phone.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('simpleform.collect_phone.settings');
    // Add field to set the phone on default.
    $form['default_phone_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Default phone number'),
      '#default_value' => $config->get('phone_number'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    // Write values to our config file.
    $this->config('simpleform.collect_phone.settings')->set('phone_number', $values['default_phone_number'])->save();
  }

}
