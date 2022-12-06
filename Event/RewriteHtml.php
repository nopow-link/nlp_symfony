<?php

namespace NlpSymfony\Bundle\Event;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use NllLib\ApiRequest;
use NllLib\LinkPlace;
use NllLib\Exception\NllLibCollectException;

class RewriteHtml implements EventSubscriberInterface
{

    private ParameterBagInterface $settings;

    protected $data;

    public function __construct(ParameterBagInterface $settings)
    {
        $this->settings = $settings; 

        $request = new ApiRequest();
        $this->data = Null;
        $this->data = $request->collect($_SERVER['REQUEST_URI']);
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

        $html = $response->getContent();

        $this->link = new LinkPlace($this->data);
        var_dump($this->link);
        return $this->link->place($html);
    }

    
}