<?php

namespace DhBw\Pattern\Structural\Bridge;


class ToggleSwitch extends SwitchAbstract
{

    /**
     * @return string
     */
    public function turnOn()
    {
        return 'Toggle switch turned on';
    }

    /**
     * @return string
     */
    public function turnOff()
    {
        return 'Toggle switch turned off';
    }

}