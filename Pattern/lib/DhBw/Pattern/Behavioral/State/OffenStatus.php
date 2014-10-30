<?php

namespace DhBw\Pattern\Behavioral\State;


class OffenStatus extends StatusAbstract
{

    public function __construct()
    {
        echo 'bestellt' . PHP_EOL;
    }

    public function senden()
    {
        echo 'senden' . PHP_EOL;
        return new VersandtStatus();
    }

    public function stornieren()
    {
        echo 'stornieren' . PHP_EOL;
        return new StorniertStatus();
    }

}