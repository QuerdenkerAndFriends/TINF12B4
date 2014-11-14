<?php

namespace DhBw\Pattern\Structural\Adapter;

use DhBw\Util\Console;
use DhBw\Util\Type\TypeHint;


class LegacyPlug
{

    /**
     * @var Console
     */
    protected $console;


    public function __construct()
    {
        $this->console = new Console();
    }

    /**
     * @param int $voltage
     *
     * @throws \RuntimeException
     */
    public function on($voltage)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($voltage);

        if($voltage > 160) {
            throw new \RuntimeException('This plug does not support more than 160V');
        }

        $this->console->writeLine('On: '.$voltage.'V');
    }

    public function off()
    {
        $this->console->writeLine('Off');
    }

}