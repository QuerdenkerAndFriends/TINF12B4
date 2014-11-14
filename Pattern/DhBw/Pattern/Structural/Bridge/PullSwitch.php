<?php

namespace DhBw\Pattern\Structural\Bridge;


class PullSwitch extends SwitchAbstract
{

    /**
     * @return string
     */
    public function turnOn()
    {
        return 'Pull switch turned on';
    }

    /**
     * @return string
     */
    public function turnOff()
    {
        return 'Pull switch turned off';
    }

}