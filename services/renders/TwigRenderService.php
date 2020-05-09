<?php
namespace App\services\renders;

class TwigRenderService implements IRenderService
{
    private $twig;
    
    public function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader([dirname(__DIR__, 2) . '/views']);
        $this->twig = new \Twig\Environment($loader);
    }
    
    /**
     * 
     * @param $template
     * @param array $params
     * @return string
     */
    public function render($template, $params = []) {
            $template .= '.twig';
            return  $this->twig->render($template, $params);

    }
    
}

