<?php

namespace Drupal\demald\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Demald routes.
 */
class DemaldController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['my_example'] = [
      '#theme' => 'demald_example_first',
      '#cache' => [
        'max-age' => 0,
      ],
    ];

    return $build;
  }

}
