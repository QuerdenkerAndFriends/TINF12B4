<?php

namespace DhBw\Pattern\Structural\Bridge;

use DhBw\Util\Console;

class Tv extends ElectricalDeviceAbstract
{

    public function startTv()
    {
        $this->console->writeLine($this->on() . ' the television');
    }

    public function stopTv()
    {
        $this->console->writeLine($this->off() . ' the television');
    }

}