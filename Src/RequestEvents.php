<?php

namespace NlpSymfony\Bundle\Src;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RequestEvents implements EventSubscriberInterface
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
                ['toto', 0],
            ],
        ];
    }

    public function toto(RequestEvent $event)
    {
        var_dump("services controller event");
        $apiKey = $this->settings->get('nlp_symfony.api_key');
        $apiCache = $this->settings->get('nlp_symfony.advanced');
        var_dump($apiKey);
        var_dump($apiCache);
        
    }

    
}