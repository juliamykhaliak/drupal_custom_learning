<?php

use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Implements template_preprocess_HOOK().
 */
function template_preprocess_date_example_second(&$variables) {
  $list_type = &$variables['list_type'];
  $allowed_list_types = ['ol', 'ul'];
  // Default value for list_type.
  if (!in_array($list_type, $allowed_list_types)) {
    $list_type = 'ul';
  }
}

/**
 * Implements hook_theme_suggestions_HOOK().
 */
function date_theme_suggestions_date_example_quote(array $variables) {
  $suggestions = [];
  $transliteration = \Drupal::transliteration();
  $author = $variables['author'];
  $year = $variables['year'];
  $source = $variables['source_title'];
  if ($author) {
    $author = $transliteration->transliterate($author);
    $author = strtolower($author);
    $author = str_replace(' ', '_', $author);
  }
  if ($source) {
    $source = $transliteration->transliterate($source);
    $source = strtolower($source);
    $source = str_replace(' ', '_', $source);
  }
  if ($year) {
    $suggestions[] = 'date_example_quote__' . $year;
  }
  if ($source) {
    $suggestions[] = 'date_example_quote__' . $source;
  }
  if ($author) {
    $suggestions[] = 'date_example_quote__' . $author;
  }
  if ($author && $year && $source) {
    $suggestions[] = 'date_example_quote__' . $author . '__' . $year . '__' . $source;
  }
  return $suggestions;
}

/**
 * Implements template_preprocess_HOOK().
 */
function template_preprocess_date_example_quote(array &$variables) {
  // Default value for new variable.
  $variables['source'] = NULL;
  $source = &$variables['source'];

  // If we have 2 values of title and url.
  if ($variables['source_title'] && $variables['source_url']) {
    // Generate object URL.
    $url = Url::fromUri($variables['source_url']/*, [
      'attributes' => [
        'target' => '_blank',
        'rel' => 'nofollow',
      ],
    ]*/);
    // Generate link.
    $source = Link::fromTextAndUrl($variables['source_title'], $url)->toString();
  }
  elseif ($variables['source_title']) {
    $source = $variables['source_title'];
  }

  // Adding all defined variables to common array.
  $footer = [];
  !$variables['author'] ?: $footer[] = $variables['author'];
  !$variables['year'] ?: $footer[] = $variables['year'];
  !$source ?: $footer[] = $source;
  // We implode vars to one string if they are not empty.
  $variables['footer'] = !empty($footer) ? implode(', ', $footer) : FALSE;
}
