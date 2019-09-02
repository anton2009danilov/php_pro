<?php
namespace App\services\renders;
use App\services\renders\IRenderService;

class TwigRenderService implements IRenderService
{
    public function render($template, $params = []) {
//         var_dump($params); die;
            $page = $template . '.twig';
            $loader = new \Twig\Loader\FilesystemLoader(['../views/']);
            $twig = new \Twig\Environment($loader);
            return  $twig->render($page, $params);

    }
    
}

