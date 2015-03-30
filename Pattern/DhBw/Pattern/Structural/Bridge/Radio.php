<?php

namespace DhBw\Pattern\Structural\Bridge;

use DhBw\Util\Console;


class Radio extends ElectricalDeviceAbstract
{

    public function startRadio()
    {
        $this->console->writeLine($this->on() . ' the radio');
    }

    public function stopRadio()
    {
        $this->console->writeLine($this->off() . ' the radio');
    }

}