<?php

namespace JGI\RatsitBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class RatsitExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $config);
        foreach ($config as $key => $value) {
            $container->setParameter('jgi.ratsit.' . $key, $value);
        }
        $container->getDefinition('jgi.ratsit')->addMethodCall('setHttpClient', [new Reference($config['http_client'])]);
        $container->getDefinition('jgi.ratsit')->addMethodCall('setEventDispatcher', [new Reference('event_dispatcher')]);
    }
}
