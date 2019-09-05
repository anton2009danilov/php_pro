<?php
namespace App\services\renders;

class TwigRenderService implements IRenderService
{
    private $twig;
    
    public function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader([dirname(__DIR__, 2) . '/views']);
        $this->twig = new \Twig\Environment($loader);
    }
    
    public function render($template, $params = []) {
            $template .= '.twig';
//             var_dump($params, $template); die;
            return  $this->twig->render($template, $params);

    }
    
}

