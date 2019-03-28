<?php

namespace Drupal\date\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HookThemeExamples.
 *
 * @package Drupal\date\Controller
 */
class HookThemeExamplesController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function page() {
    // Example #1.
    $results1 = [
      '#theme' => 'date_example_first',
    ];
    // Example #2.
    $results = [
      '#theme' => 'date_example_second',
      '#list_type' => 'ol',
      '#items' => [
        'item' => [
          'title' => 'Title for first text',
          'text' => 'Some first text',
        ],
        [
          'title' => 'Title for second text',
          'text' => 'Some second text',
        ],
      ],
    ];
    return [
      $results1,
      $results,
    ];
  }

}