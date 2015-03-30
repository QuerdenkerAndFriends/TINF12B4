<?php

namespace DhBw\Pattern\Behavioral\State;


class AusgeliefertStatus extends StatusAbstract
{

    public function retoure()
    {
        echo 'retoure' . PHP_EOL;
        return new RetoureStatus();
    }

}