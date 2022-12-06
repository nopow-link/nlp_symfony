<?php

namespace NlpSymfony\Bundle\DependencyInjection;

use Exception;
use NlpSymfony\Bundle\DependencyInjection\Configuration;
use NlpSymfony\Bundle\Utils\Settings;
use NllLib\Utils\Path;
use NllLib\ApiRequest;
use NllLib\Exception\NllLibReqException;
use NllLib\Exception\NllLibCollectException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NlpSymfonyExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {

        $path = new Path(__FILE__);

        var_dump("load <br/>");
        var_dump($configs);
        var_dump("<br/>");
        $loader = new YamlFileLoader(
            $container,
            new FileLocator($path->absolut('./../Ressources/config'))
        );
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config as $key => $value) {
            $container->setParameter('nlp_symfony.' . $key, $value);
        }
        // lever une exception si aucune clé d'api 
        // throw new \Exception();
        // if ($config["api_key"] == "")
        // {
        //     throw new NllLibCollectException();
        // }
        var_dump($config);
        $parameter = [
            "apikey" => $config["api_key"],
            "apicache" => $config["advanced"]["api_cache"],
            "url" => $config["advanced"]["url"],
            "timeout" => $config["advanced"]["timeout"],
        ];
        
        $settings = Settings::getInstance($parameter);        

        $request = new ApiRequest();
        var_dump($settings->getApiSettings()->getCacheFolder());
        
        try {
            $data = $request->certify($settings->getApiKey());
            $key = $settings->getApiKey();
            var_dump($data);
            var_dump($key);
        } catch (NllLibReqException $e) {
            var_dump($e);
        }
        
    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        var_dump("get_configuration <br/>");   
        var_dump($config);
        var_dump("<br/>");
        echo("terminal");
    }

}