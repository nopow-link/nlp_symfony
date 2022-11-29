<?php

namespace NlpSymfony\Bundle\Event;

use NllLib\ApiCache;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use NlpSymfony\Bundle\Utils\Settings;
use NlpSymfony\Bundle\Controller\CertifyController;

class Request implements EventSubscriberInterface
{
    private ParameterBagInterface $settings;

    public function __construct(ParameterBagInterface $settings)
    {
        $this->settings = $settings; 
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [
                ['getSettings', 0],
            ],
        ];
    }

    public function getSettings(RequestEvent $event)
    {        
        $parameter = [
            "apikey" => $this->settings->get('nlp_symfony.api_key'),
            "apicache" => $this->settings->get('nlp_symfony.advanced')["api_cache"],
            "url" => $this->settings->get('nlp_symfony.advanced')["url"],
            "timeout" => $this->settings->get('nlp_symfony.advanced')["timeout"]
        ];

        Settings::getInstance($parameter);        
    }

}