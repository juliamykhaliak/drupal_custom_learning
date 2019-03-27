<?php

namespace Drupal\plugin_messages;

use Drupal\Component\Plugin\PluginBase;

abstract class PluginMessagesPluginBase extends PluginBase implements PluginMessagesPluginInterface {

	public function __construct(array $configuration, string $plugin_id, mixed $plugin_definition)
	{
		parent::__construct($configuration, $plugin_id, $plugin_definition);
	}

	public function getId() {
		return $this->pluginDefinition['id'];
	}

	public function getMessageType()
	{
		return 'status';
	}

	public function getMessage()
	{
		return '';
	}

	public function getPages()
	{
		return [];
	}

}