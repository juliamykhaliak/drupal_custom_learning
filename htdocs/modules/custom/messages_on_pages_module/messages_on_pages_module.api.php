<?php

/**
 * @file
 * Hooks specific to the messages_on_pages_module module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Adds messages to page.
 *
 * @return string|array
 *   Returns string or array of string with additional messages.
 */
function hook_my_page_message() {
  return [
    'First message',
    'Second message',
  ];
}

/**
 * Alter messages being added to page.
 *
 * @param array $messages
 *   Array with messages.
 */
function hook_my_page_messages_alter(array &$messages) {
  $messages[0] = 'Replaced';
}

function hook_my_page_messages_USER_TYPE_alter(array &$messages) {
  $messages[0] = 'Replaced';
}
/**
 * @} End of "addtogroup hooks".
 */