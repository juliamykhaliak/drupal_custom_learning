<?php

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
