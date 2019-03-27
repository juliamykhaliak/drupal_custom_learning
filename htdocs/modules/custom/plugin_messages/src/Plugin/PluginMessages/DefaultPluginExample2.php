<?php

namespace Drupal\plugin_messages\Plugin\PluginMessages;

use Drupal\plugin_messages\Annotation\PluginMessages;
use Drupal\plugin_messages\PluginMessagesPluginBase;

class DefaultPluginExample2 extends PluginMessagesPluginBase {

	public function getMessage()
	{
		return 'Message from example #2';
	}

	public function getMessageType()
	{
		return 'error';
	}

	public function getPages()
	{
	  return [
			'/node/*',
			'/contact',
			'<front>',
		];
	}
}