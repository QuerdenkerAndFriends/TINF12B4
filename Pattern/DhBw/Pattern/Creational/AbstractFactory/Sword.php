<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

use DhBw\Util\Console;

class Sword implements AttackInterface
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console();
    }

    public function attack()
    {
        $this->console->writeLine('sword punch');
    }

}