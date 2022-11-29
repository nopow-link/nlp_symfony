<?php

namespace NlpSymfony\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use NllLib\ApiRequest;
use NllLib\Exception\NllLibReqException;
use NlpSymfony\Bundle\Utils\Settings;
use NllLib\ApiCache;

class CertifyController extends AbstractController
{

    public function certify($parameter)
    {
        $request = new ApiRequest();
        // var_dump($this->settings->getApiSettings()->getCacheFolder());
        try {
            $data = $request->certify($this->settings->getApiKey());
            $key = $this->settings->getApiKey();
            // var_dump($data);
        } catch (NllLibReqException $e) {
            var_dump($e);
        }
    }


    #[Route('/nlp_certify?key={{$key}}', name:'certify')]
    public function check():Response 
    {
        $this->settings = Settings::getInstance();
        $this->cache    = ApiCache::getInstance();

        $key = $this->settings->getApiKey();

        $check = $this->cache->keyRetrieve();
        if (strcmp($key, $check) == 0)
        {
            return new Response("{'data': { 'valid' : True }}");
        }
        return new Response("{'data': { 'valid' : False }}");
    }
}