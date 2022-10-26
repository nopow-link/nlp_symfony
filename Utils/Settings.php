<?php

namespace NlpSymfony\Bundle\Utils;

use NllLib\ApiSettings;
use NllLib\Utils\Path;
use Symfony\Component\HttpKernel\Kernel;

class Settings
{
    
    private static $INSTANCE = null;

    private $settings;

    public function __construct($parametter)
    {
        $path = new Path(__DIR__); 

        // évantuellement ajouté un warning si apikey vaut nul
        $this->api_settings = ApiSettings::getInstance();
        $this->apikey = $parametter["apikey"];
        $this->api_settings->setCacheFolder($path->absolut($parametter["apicache"]));
        $this->api_settings->setUrl($parametter["url"]);
        $this->api_settings->setTimeout($parametter["timeout"]);
        // var_dump($this->api_settings);
    }

    public static function getInstance(array $settings = [])
    {
        if (!self::$INSTANCE)
            self::$INSTANCE = new Settings($settings);
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
