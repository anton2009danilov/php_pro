<?php
namespace App\services\renders;

interface IRenderService
{
    public function render($template, $params = []);
}

