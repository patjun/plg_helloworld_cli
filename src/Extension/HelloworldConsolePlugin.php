<?php
namespace My\Plugin\Console\Helloworld\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;
use Joomla\Application\ApplicationEvents;
use My\Plugin\Console\Helloworld\CliCommand\RunHelloCommand;

class HelloworldConsolePlugin extends CMSPlugin implements SubscriberInterface
{
	public static function getSubscribedEvents(): array
	{
		return [
			\Joomla\Application\ApplicationEvents::BEFORE_EXECUTE => 'registerCommands',
		];
	}

	public function registerCommands(): void
	{
		$app = $this->getApplication();
		$app->addCommand(new RunHelloCommand());
	}
}