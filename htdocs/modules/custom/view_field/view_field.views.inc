<?php

/**
 * @file
 * Views hooks.
 */

/**
 * Implements hook_views_data_alter().
 */
function view_field_views_data_alter(array &$data) {
  // Field for showing creation date for nodes in view.
  $data['node']['view_field_created_relative'] = [
    'title' => t('Relative creation date'),
    'field' => [
      'title' => t('Relative creation date'),
      'help' => t('The creation date will be printed as relative date.'),
      'id' => 'view_field_created_relative',
    ],
  ];

  // Field for math operation between two views.
  $data['node']['view_field_two_fields'] = [
    'title' => t('Two fields math operation'),
    'field' => [
      'title' => t('Two fields math operation'),
      'help' => t('Simple math operation between two selected fields.'),
      'id' => 'view_field_two_field_math',
      'click sortable' => FALSE,
    ],
  ];
}
