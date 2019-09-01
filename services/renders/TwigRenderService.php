<?php
namespace App\services\renders;
use App\services\renders\IRenderService;

class TwigRenderService implements IRenderService
{
    public function render($template, $params = []) {
//             var_dump($templateName . '.twig'); die;
//             ob_start();
            $page = $template . '.twig';
//             var_dump($page);
            $loader = new \Twig\Loader\FilesystemLoader(['../views/']);
            $twig = new \Twig\Environment($loader);
            return  $twig->render($page, $params);
//             return  ob_get_clean();

    }
    
}

