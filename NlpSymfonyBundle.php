<?php

namespace NlpSymfony\Bundle;

use NlpSymfony\Bundle\DependencyInjection\NlpSymfonyExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder; 

class NlpSymfonyBundle extends Bundle { 

    public function build(ContainerBuilder $container)
    {   
        var_dump("build");
        $ext = new NlpSymfonyExtension([],$container);
        // var_dump($container)
        var_dump($this->getContainerExtension());

    }

    public function boot()
    {
        var_dump("boot");
        var_dump($this->extension);
        var_dump($this->getName());
        var_dump($this->getPath());
        var_dump($this->getNamespace());
        var_dump($this->getContainerExtension());

    }

}