<?php

namespace NlpSymfony\Bundle\Event;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RewriteHtml implements EventSubscriberInterface
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
                ['response', 0],
            ],
        ];
    }

    public function response(ResponseEvent $event)
    {
        $apiKey = $this->settings->get('nlp_symfony.api_key');
        $apiCache = $this->settings->get('nlp_symfony.advanced');
        
        $response = $event->getResponse();
        
        $response->headers->set('X-Frame-Options`', $apiKey);
        $response->headers->set('test', $apiCache); 
        var_dump($response->getContent());
    }

    
}