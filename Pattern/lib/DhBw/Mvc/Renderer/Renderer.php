<?php

namespace DhBw\Mvc\Renderer;

use DhBw\Util\Type\TypeHint;

class Renderer implements RendererInterface
{

    public function render($file)
    {
        TypeHint::exceptionIfArgumentIsNotString($file);

        $rendered = '';

        if (!\file_exists($file)) {
            throw new \RuntimeException("View file does not exist $file");
        }

        \ob_start();

        require $file;

        $rendered .= \ob_get_clean();

        return $rendered;
    }

}