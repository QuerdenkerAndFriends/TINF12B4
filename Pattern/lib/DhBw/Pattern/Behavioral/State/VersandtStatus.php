<?php

namespace DhBw\Pattern\Behavioral\State;


class VersandtStatus extends StatusAbstract
{

    public function ausliefern()
    {
        echo 'ausliefern' . PHP_EOL;
        return new AusgeliefertStatus();
    }

}