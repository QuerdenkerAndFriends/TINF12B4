<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

use DhBw\Util\Console;

class Dodge implements DefenseInterface
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console();
    }

    public function defend()
    {
        $this->console->writeLine('dodge');
    }

}