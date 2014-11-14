<?php

namespace DhBw\Pattern\Structural\Adapter;

use DhBw\Util\Console;
use DhBw\Util\Type\TypeHint;


class Plug implements PlugInterface
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
     */
    public function powerOn($voltage)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($voltage);

        $this->console->writeLine('Power On: ' . $voltage . 'V');
    }

    public function powerOff()
    {
        $this->console->writeLine('Power Off');
    }

}