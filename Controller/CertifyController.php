<?php

namespace NlpSymfony\Bundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use NllLib\ApiRequest;
use NllLib\Exception\NllLibReqException;
use NlpSymfony\Bundle\Controller\BaseController;


class CertifyController extends BaseController
{
    public function certify()
    {
        var_dump("certify");
        
        $request = new ApiRequest();
        var_dump($this->settings->getApiSettings()->getCacheFolder());
        
        try {
            $data = $request->certify($this->settings->getApiKey());
            $key = $this->settings->getApiKey();
            var_dump($data);
        } catch (NllLibReqException $e) {
            var_dump($e);
        }
    }

    /**
     * @Route("/nlp_certify", name="certify")
     */
    public function check():Response 
    {
        $check = $this->cache->keyRetrieve();
        return $this->render('Ressources/Views/Certify.html.twig');
    }
}