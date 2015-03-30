<?php

namespace DhBw\Util;

use \DhBw\Util\Type\TypeHint;


class Console
{

    /**
     * @param string $text
     */
    public function writeLine($text)
    {
        TypeHint::exceptionIfArgumentIsNotString($text);

        $this->write($text);
        $this->newLine();
    }

    /**
     * @param string $text
     */
    public function write($text)
    {
        TypeHint::exceptionIfArgumentIsNotString($text);

        echo $text;
    }

    public function newLine()
    {
        echo PHP_EOL;
    }

}