<?php
defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Joomla\CMS\Factory;
use My\Plugin\Console\Helloworld\Extension\HelloworldConsolePlugin;

return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   4.2.0
	 */
	public function register(Container $container)
	{
		$container->set(
			PluginInterface::class,
			function (Container $container) {
				$dispatcher = $container->get(DispatcherInterface::class);
				$plugin     = new HelloworldConsolePlugin(
					$dispatcher,
					(array) PluginHelper::getPlugin('console', 'helloworld')
				);
				$plugin->setApplication(Factory::getApplication());

				return $plugin;
			}
		);
	}
};