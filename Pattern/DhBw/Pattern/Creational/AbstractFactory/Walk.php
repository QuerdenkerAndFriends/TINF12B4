<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

use DhBw\Util\Console;

class Walk implements MovementInterface
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console();
    }

    public function moveForward()
    {
        $this->console->writeLine('step forward');
    }

    public function moveBackward()
    {
        $this->console->writeLine('step backward');
    }

    public function turnLeft()
    {
        $this->console->writeLine('turn left');
    }

    public function turnRight()
    {
        $this->console->writeLine('turn right');
    }

}