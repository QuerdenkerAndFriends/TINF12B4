<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

use DhBw\Util\Console;

class Fly implements MovementInterface
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console();
    }

    public function moveForward()
    {
        $this->console->writeLine('fly forward');
    }

    public function moveBackward()
    {
        $this->console->writeLine('fly backward');
    }

    public function turnLeft()
    {
        $this->console->writeLine('fly left');
    }

    public function turnRight()
    {
        $this->console->writeLine('fly right');
    }

}