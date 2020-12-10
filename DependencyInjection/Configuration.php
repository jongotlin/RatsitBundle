<?php

namespace JGI\RatsitBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ratsit');
        $root = $treeBuilder->getRootNode();
        $root->children()
            ->scalarNode('http_client')->isRequired()->end()
            ->scalarNode('token')->isRequired()->end()
            ->end();

        return $treeBuilder;
    }
}
