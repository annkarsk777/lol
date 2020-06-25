<?php
declare(strict_types=1);
namespace App\View;
class Renderer
{
    /**
     * @var string
     */
    private $templateFileName;
    /**
     * Renderer constructor.
     * @param string $templateFileName
     */
    public function __construct(string $templateFileName)
    {
        $this->templateFileName = $templateFileName;
    }
    /**
     * @param object $controller
     * @return string
     */
    public function render(object $controller): string
    {
        ob_start();
        require_once 'app/template/base.phtml';
        return ob_get_clean();
    }
    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->templateFileName;
    }
}