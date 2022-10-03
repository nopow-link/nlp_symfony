<?php

namespace NlpSymfony\Bundle\Src;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseEvents implements EventSubscriberInterface
{

    private ParameterBagInterface $settings;

    public function __construct(ParameterBagInterface $settings)
    {
        $this->settings = $settings; 
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => [
                ['addSecurityHeaders', 0],
            ],
        ];
    }

    public function addSecurityHeaders(ResponseEvent $event)
    {
        var_dump("services");
        $apiKey = $this->settings->get('nlp_symfony.api_key');
        $apiCache = $this->settings->get('nlp_symfony.advanced');
        var_dump($apiKey);
        var_dump($apiCache);

        $response = $event->getResponse();

        $response->headers->set('X-Frame-Options`', $apiKey);
        $response->headers->set('test', $apiCache); 
    }

    
}