<?php

namespace NlpSymfony\Bundle\DependencyInjection;

use NlpSymfony\Bundle\Ressources\views\Settings;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NlpSymfonyExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        var_dump("load");
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Ressources/config')
        );
        $loader->load('services.yaml');
        var_dump($loader);
    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        var_dump("get_configuration");   
    }

}