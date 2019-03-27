<?php

namespace Drupal\plugin_messages;

use Drupal\Component\Plugin\PluginInspectionInterface;

interface PluginMessagesPluginInterface extends PluginInspectionInterface {

	public function getId();

	public function getMessageType();

	public function getMessage();

	public function getPages();

}