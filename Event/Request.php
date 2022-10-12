<?php

namespace NlpSymfony\Bundle\Event;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use NlpSymfony\Bundle\Utils\Settings;
use NlpSymfony\Bundle\Controller\BaseController;

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
        $apiKey     = $this->settings->get('nlp_symfony.api_key');
        $apiCache   = $this->settings->get('nlp_symfony.advanced');
        $url        = $this->settings->get('nlp_symfony.advanced');
        $timeout    = $this->settings->get('nlp_symfony.advanced');
        
        $apiCache   = $apiCache["api_cache"];
        $url        = $url["url"];
        $timeout    = $timeout["timeout"];

        $parameter = array($apiKey, $apiCache, $url, $timeout);

        $controller = new BaseController($parameter);
        
    }

}