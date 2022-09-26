<?php

namespace NlpSymfony\Bundle\Ressources\views;

use NllLib\ApiSettings;
use NllLib\Utils\Path;
use Symfony\Component\HttpKernel\Kernel;

class Settings
{
    
    private static $INSTANCE = null;

    private $settings;

    private function __construct(array $settings = [])
    {
        $this->settings = $settings;

        $this->api_settings = ApiSettings::getInstance();
        $this->api_settings->setUrl($this->url);
        // $this->api_settings->setCacheFolder();
    }

    public static function getInstance(array $settings = [])
    {
        if (!self::$INSTANCE)
            self::$INSTANCE = new Settings($settings);
        return self::$INSTANCE;
    }
    

}
