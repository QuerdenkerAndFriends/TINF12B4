<?php

namespace DhBw\Mvc\Renderer;

interface RendererInterface
{

    /**
     * @param string $file
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function render($file);

}