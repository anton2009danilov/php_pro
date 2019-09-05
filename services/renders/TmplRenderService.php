<?php
namespace App\services\renders;

class TmplRenderService implements IRenderService
{
    public function render($template, $params = []) {
        ob_start();
        extract($params);
        include dirname(dirname(__DIR__)) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
    
}

