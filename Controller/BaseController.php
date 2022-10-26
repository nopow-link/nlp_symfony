<?php

namespace NlpSymfony\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use NlpSymfony\Bundle\Utils\Settings;
use NlpSymfony\Bundle\Controller\CertifyController;
use NllLib\ApiCache;


class BaseController extends AbstractController
{

    public function __construct($parameter)
    {
        $this->settings = new Settings($parameter);
		$this->cache	= ApiCache::getInstance();

    }
}