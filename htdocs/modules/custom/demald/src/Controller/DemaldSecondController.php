<?php

namespace Drupal\demald\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Demald routes.
 */
class DemaldSecondController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#theme' => 'demald_example_second',
      '#list_type' => 'ul',
      '#items' => [
        'first',
        'second',
      ],
    ];

    return $build;
  }

}
