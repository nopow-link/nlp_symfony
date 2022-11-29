<?php

namespace NlpSymfony\Bundle\Utils;

use NllLib\ApiSettings;
use NllLib\Utils\Path;
use Symfony\Component\HttpKernel\Kernel;

class Settings
{
    
    private static $INSTANCE = null;

    private $settings;

    private function __construct($parameter)
    {
        $path = new Path(__DIR__); 

        // évantuellement ajouté un warning si apikey vaut nul
        $this->api_settings = ApiSettings::getInstance();
        $this->apikey = $parameter["apikey"];
        $this->api_settings->setCacheFolder($path->absolut($parameter["apicache"]));
        $this->api_settings->setUrl($parameter["url"]);
        $this->api_settings->setTimeout($parameter["timeout"]);
        // var_dump($this->api_settings);
    }

    public static function getInstance(array $parameter = [])
    {
        if (!self::$INSTANCE)
            self::$INSTANCE = new Settings($parameter);
        return self::$INSTANCE;
    }

    // évantuellement ajouté un warning si apikey vaut nul
    public function getApiKey()
    {
        return $this->apikey;
    }

    public function getApiSettings()
    {
        return $this->api_settings;
    }
    

}
