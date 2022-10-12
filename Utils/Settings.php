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

        $this->api_settings = ApiSettings::getInstance();
        $this->api_settings->setCacheFolder($path->absolut($parametter[1]));
        $this->api_settings->setUrl($parametter[2]);
        $this->api_settings->setTimeout($parametter[3]);
        var_dump($this->api_settings);
    }

    public static function getInstance(array $settings = [])
    {
        if (!self::$INSTANCE)
            self::$INSTANCE = new Settings($settings);
        return self::$INSTANCE;
    }
    

}
