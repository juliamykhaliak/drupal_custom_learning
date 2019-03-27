<?php

/**
 * Implements hook_token_info().
 */
function hook_module_token_info()
{
	$node['title-reverse'] = [
		'name' => t('Title of node reverse'),
		'type' => 'user',
		'description' => t('Reverse title of the node'),
	];

	return [
		'tokens' => ['node' => $node],
	];
}

/**
 * Implements hook_tokens().
 */
function hook_module_tokens($type, $tokens, array $data, array $options, \Drupal\Core\Render\BubbleableMetadata $bubbleable_metadata)
{
	$replacements = [];

	if ($type == 'node' && !empty($data['node'])) {
		$node = $data['node'];

		foreach ($tokens as $name => $original) {
			switch ($name) {
				case 'title-reverse':
					$replacements[$original] = strrev($node->label());
					break;
			}
		}
	}

	return $replacements;
}