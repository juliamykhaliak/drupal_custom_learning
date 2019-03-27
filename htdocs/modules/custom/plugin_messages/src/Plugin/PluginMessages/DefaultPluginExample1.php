<?php

namespace Drupal\plugin_messages\Plugin\PluginMessages;

use Drupal\plugin_messages\Annotation\PluginMessages;
use Drupal\plugin_messages\PluginMessagesPluginBase;

class DefaultPluginExample1 extends PluginMessagesPluginBase {

	public function getMessage()
	{
		return 'This is message from example #1';
	}
}