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
  public function build() {
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
    // Example #3 (quote).
    $result_quote1 = [
      '#theme' => 'date_example_quote',
      '#quote' => 'This is the first quote',
    ];
    $result_quote2 = [
      '#theme' => 'date_example_quote',
      '#quote' => 'This is the second quote',
      '#author' => 'John Doe',
      '#year' => 2017,
    ];
    $result_quote3 = [
      '#theme' => 'date_example_quote',
      '#quote' => 'It was a nice day',
      '#author' => 'John Doe',
      '#year' => '2019',
      '#source_title' => 'Google',
      '#source_url' => 'https://google.com/',
    ];
    return [
      $results1,
      $results,
      $result_quote1,
      $result_quote2,
      $result_quote3,
    ];
  }
}