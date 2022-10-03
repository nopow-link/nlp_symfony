<?php

namespace NlpSymfony\Bundle\DependencyInjection;

use NlpSymfony\Bundle\Ressources\views\Settings;
use NlpSymfony\Bundle\DependencyInjection\Configuration;
use NllLib\Utils\Path;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NlpSymfonyExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {

        $path = new Path(__FILE__);

        var_dump("load");
        var_dump($configs);
        $loader = new YamlFileLoader(
            $container,
            new FileLocator($path->absolut('./../Ressources/config'))
        );
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        // var_dump($config);
        foreach ($config as $key => $value) {
            $container->setParameter('nlp_symfony.' . $key, $value);
        }
        // var_dump($container);



        

    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        var_dump("get_configuration");   
    }

}