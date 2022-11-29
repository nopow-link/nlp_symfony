<?php

namespace NlpSymfony\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test-bundle', name:'test-bundle')]
    public function index(): Response
    {
        return new Response("test");
    }
}