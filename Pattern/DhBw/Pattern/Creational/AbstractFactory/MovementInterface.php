<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

interface MovementInterface
{

    public function moveForward();
    public function moveBackward();
    public function turnLeft();
    public function turnRight();

}