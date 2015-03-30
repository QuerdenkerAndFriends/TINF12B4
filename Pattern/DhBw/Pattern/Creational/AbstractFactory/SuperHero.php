<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

use DhBw\Util\Console;
use DhBw\Util\Type\TypeHint;

class SuperHero
{

    protected $name = 'A Super Hero';
    protected $movement;
    protected $attack;
    protected $defense;
    protected $console;

    public function __construct(
        $name,
        MovementInterface $movement,
        AttackInterface $attack,
        DefenseInterface $defense
    ) {
        TypeHint::exceptionIfArgumentIsNotString($name);

        $this->name = $name;
        $this->movement = $movement;
        $this->attack = $attack;
        $this->defense = $defense;

        $this->console = new Console();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function moveForward()
    {
        $this->console->write($this->getName() . ': ');
        $this->movement->moveForward();
    }

    public function moveBackward()
    {
        $this->console->write($this->getName() . ': ');
        $this->movement->moveBackward();
    }

    public function turnLeft()
    {
        $this->console->write($this->getName() . ': ');
        $this->movement->turnLeft();
    }

    public function turnRight()
    {
        $this->console->write($this->getName() . ': ');
        $this->movement->turnRight();
    }

    public function attack()
    {
        $this->console->write($this->getName() . ': ');
        $this->attack->attack();
    }

    public function defend()
    {
        $this->console->write($this->getName() . ': ');
        $this->defense->defend();
    }

}