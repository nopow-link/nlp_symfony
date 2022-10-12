<?php

namespace NlpSymfony\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use NlpSymfony\Bundle\Utils\Settings;


class BaseController extends AbstractController
{

    public function __construct($parameter)
    {
        var_dump("construct controller");
        var_dump($parameter);

        $settings = new Settings($parameter);

    }

    public function index(): Response
    {   
        

    }
}