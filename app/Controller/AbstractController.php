<?php
declare(strict_types=1);
namespace App\Controller;
use App\View\Renderer;
abstract class AbstractController
{
    public function renderHtml(string $template)
    {
        $view = new Renderer($template);
        echo $view->render($this);
    }
}