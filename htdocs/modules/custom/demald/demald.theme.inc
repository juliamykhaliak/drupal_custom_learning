<?php

/**
 * @file
 * Main file for all theme hook preprocess.
 */

use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Implements template_preprocess_HOOK() for demald_example_second.
 *
 * @param array $variables
 *   Variables array.
 */
function template_preprocess_demald_example_second(array &$variables) {
  $list_type = &$variables['list_type'];
  $allowed_list_types = ['ul', 'ol'];

  if (!in_array($list_type, $allowed_list_types)) {
    $list_type = 'ul';
  }
}

/**
 * Implements template_preprocess_HOOK() for demald_quote.
 *
 * @param array $variables
 *   Variables array.
 */
function template_preprocess_demald_quote(array &$variables) {
  $variables['source'] = NULL;
  $source = &$variables['source'];

  if ($variables['source_title'] && $variables['source_url']) {
    $url = Url::fromUri($variables['source_url']);
    $source = Link::fromTextAndUrl($variables['source_title'], $url)->toString();
  }
  elseif ($variables['source_title']) {
    $source = $variables['source_title'];
  }

  $footer = [];
  !$variables['author'] ?: $footer[] = $variables['author'];
  !$variables['year'] ?: $footer[] = $variables['year'];
  !$source ?: $footer[] = $source;

  $variables['footer'] = !empty($footer) ? implode(', ', $footer) : FALSE;
}

/**
 * Implements hook_theme_suggestions_HOOK().
 *
 * Adds new theme hook suggestions.
 *  - demald--{YEAR}
 *  - demald--{SOURCE}
 *  - demald--{AUTHOR}
 *  - demald--{AUTHOR}--{YEAR}--{SOURCE}
 */
function demald_theme_suggestions_demald_quote(array $variables) {
  $suggestions = [];
  /** @var Drupal\Core\Transliteration\PhpTransliteration $transliteration */
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

  $pattern = 'demald_quote__';

  if ($year) {
    // demald_quote__{YEAR}.
    $suggestions[] = $pattern . $year;
  }
  if ($source) {
    // demald_quote__{SOURCE}.
    $suggestions[] = $pattern . $source;
  }
  if ($author) {
    // demald_quote__{AUTHOR}.
    $suggestions[] = $pattern . $author;
  }
  if ($author && $year && $source) {
    // demald_{AUTHOR}__{YEAR}__{SOURCE}.
    $suggestions[] = "{$pattern}{$author}__{$year}__{$source}";
  }

  return $suggestions;
}
