<?php

namespace DhBw\Pattern\Structural\Bridge;

use DhBw\Util\Console;


abstract class ElectricalDeviceAbstract
{

    /**
     * @var Console
     */
    protected $console;
    /**
     * @var SwitchAbstract
     */
    protected $switchImplementation;

    /**
     * @param SwitchAbstract $switchImplementation
     */
    public function __construct(SwitchAbstract $switchImplementation)
    {
        $this->switchImplementation = $switchImplementation;
        $this->console = new Console();
    }

    protected function on()
    {
        return $this->switchImplementation->turnOn();
    }

    protected function off()
    {
        return $this->switchImplementation->turnOff();
    }

}
