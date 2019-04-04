<?php

/**
 * @file
 * Contains \Drupal\ajax_form\Form\AjaxFormSubmitExample.
 */
namespace Drupal\ajax_form\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;

/**
 * Class AjaxFormSubmitExample.
 *
 * @package Drupal\ajax_form\Form
 */
class AjaxFormSubmitExample extends FormBase {
  use MessengerTrait;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_form_submit_example';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['email'] = [
      '#title' => 'Email',
      '#required' => TRUE,
      '#type' => 'email',
      '#ajax' => [
        'callback' => '::validateEmailAjax',
        // Event when ajax works.
        'event' => 'change',
        // Progress animation of loading.
        'progress' => array(
          'type' => 'throbber',
          'message' => t('Verifying email..'),
        ),
      ],
      // Element, where we write result.
      '#suffix' => '<div class="email-validation-message"></div>',
    ];

    $form['select'] = [
      '#title' => 'Select some fruit',
      '#type' => 'select',
      '#options' => [
        'apple' => 'Apple',
        'banana' => 'Banana',
        'orange' => 'Orange',
      ],
      '#empty_option' => '-Select-',
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::validateFruitAjax',
        'event' => 'change',
      ],
      '#prefix' => '<div id="fruit-selector">',
      '#suffix' => '</div>',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#name' => 'submit',
      '#value' => 'Submit this form',
      '#ajax' => [
        'callback' => '::ajaxSubmitCallback',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
        ],
      ],
    ];

    $form['status_messages'] = [
      '#type' => 'status_messages',
      '#weight' => -10,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addMessage($this->t('Form submitted successfully!'));
  }

  /**
   * {@inheritdoc}
   */
  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (substr($form_state->getValue('email'), -11) == 'example.com') {
      $response->addCommand(new HtmlCommand('.email-validation-message', 'This provider can lost our email. Be care!'));
    }
    else {
      $response->addCommand(new HtmlCommand('.email-validation-message', ''));
    }
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function validateFruitAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    switch ($form_state->getValue('select')) {
      case 'apple':
        $style = ['border' => '2px solid green'];
        break;

      case 'banana':
        $style = ['border' => '2px solid yellow'];
        break;

      case 'orange':
        $style = ['border' => '2px solid orange'];
        break;

      default:
        $style = ['border' => '2px solid transparent'];
    }
    $response->addCommand(new CssCommand('#fruit-selector select', $style));
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function ajaxSubmitCallback(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    /*$message = [
      '#theme' => 'status_messages',
      '#message_list' => $this->messenger->all(),
      '#status_headings' => [
        'status' => t('Status message'),
        'error' => t('Error message'),
        'warning' => t('Warning message'),
      ],
    ];*/
    if ($form_state::hasAnyErrors()) {
      $ajax_response->addCommand(new ReplaceCommand('.ajax-form-submit-example', $form));
    }
    /*$messages = \Drupal::service('renderer')->render($message);
    $ajax_response->addCommand(new HtmlCommand('#form-system-messages', $messages));*/
    return $ajax_response;
  }

}
