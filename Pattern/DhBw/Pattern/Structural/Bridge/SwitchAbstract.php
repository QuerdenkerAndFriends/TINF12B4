<?php

namespace DhBw\Pattern\Structural\Bridge;

abstract class SwitchAbstract
{

    /**
     * @return string
     */
    abstract public function turnOn();

    /**
     * @return string
     */
    abstract public function turnOff();

}