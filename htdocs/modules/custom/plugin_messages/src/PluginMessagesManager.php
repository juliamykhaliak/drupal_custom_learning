<?php

namespace Drupal\plugin_messages;

use Drupal\Component\Plugin\Factory\DefaultFactory;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

class PluginMessagesManager extends DefaultPluginManager {

	public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
		parent::__construct(
			'Plugin/PluginMessages',
			$namespaces,
			$module_handler,
			'Drupal\plugin_messages\PluginMessagesPluginInterface',
			'Drupal\plugin_messages\Annotation\PluginMessages'
		);

		$this->alterInfo('plugin_messages_info');
		$this->setCacheBackend($cache_backend, 'plugin_messages');
		$this->factory = new DefaultFactory($this->getDiscovery());
	}

}