<?php

/**
 * @file
 * Contains \Drupal\simpleform\Form\CollectPhone.
 */
namespace Drupal\simpleform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CollectPhone.
 */
class CollectPhone extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'collect_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $phone = NULL) {
    $form['phone_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('Your number'),
      '#default_value' => $phone,
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your name'),
    ];

    $form['actions']['#type'] = 'actions';

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send name and phone'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('name')) < 5) {
      $form_state->setErrorByName('name', $this->t('Name id too short'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage($this->t('Thank you, @name. Your phone number is @phone_number', array(
      '@name' => $form_state->getValue('name'),
      '@phone_number' => $form_state->getValue('phone_number'),
    )));
  }

}
