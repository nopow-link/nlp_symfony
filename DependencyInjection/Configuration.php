<?php

namespace NlpSymfony\Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('npl_symfony');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('api_key')->isRequired()->end()
                ->arrayNode('advanced')
                    ->children()
                        ->scalarNode('api_cache')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}