<?php

namespace AUMBotBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('aum_bot');
        
        $rootNode
            ->children()
                ->arrayNode("step_login")
                    ->children()
                        ->scalarNode("login")->end()
                        ->scalarNode("password")->end()
                    ->end()
                ->end()
                ->arrayNode("step_visit")
                    ->children()
                        ->scalarNode("max_visit")->end()
                        ->scalarNode("waiting_second")->end()
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}
