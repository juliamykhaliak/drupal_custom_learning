<?php

namespace Drupal\demald\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Demald routes.
 */
class DemaldThirdController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    $build['#title'] = 'Hello Drupal';

    $build[] = [
      '#theme' => 'demald_quote',
      '#quote' => $this->t('Drupal in your heart'),
      '#author' => $this->t('Alderan'),
      '#year' => 2019,
      '#source_title' => 'Drupal',
    ];

    $build[] = [
      '#theme' => 'demald_quote',
      '#quote' => $this->t('Wordpress'),
      '#author' => $this->t('Cries'),
      '#year' => 2018,
      '#source_title' => 'Wordpress',
      '#source_url' => 'https://dri.es/',
    ];

    return $build;
  }

}
