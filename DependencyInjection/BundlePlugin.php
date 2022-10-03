<?php

namespace NlpSymfony\Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

interface BundlePlugin
{
    /**
     * The name of this plugin. It will be used as the configuration key.
     *
     * @return string
     */
    

    /**
     * When the container is generated for the first time, you can register compiler passes inside this method.
     *
     * @see BundleInterface::build()
     * @param ContainerBuilder $container
     * @return void
     */
    public function build(ContainerBuilder $container);

    /**
     * When the bundles are booted, you can do any runtime initialization required inside this method.
     *
     * @see BundleInterface::boot()
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container);
}