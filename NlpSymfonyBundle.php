<?php

namespace NlpSymfony\Bundle;

use NlpSymfony\Bundle\DependencyInjection\NlpSymfonyExtension;
use NlpSymfony\Bundle\Controller\BaseController;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder; 
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Kernel;

class NlpSymfonyBundle extends Bundle
{ 

    public function build(ContainerBuilder $container)
    {
        var_dump("build");
        $ext = new NlpSymfonyExtension([],$container);
        var_dump("container");
        var_dump($this->getContainerExtension());
    }
}