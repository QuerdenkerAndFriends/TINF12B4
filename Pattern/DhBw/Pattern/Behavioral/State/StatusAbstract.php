<?php

namespace DhBw\Pattern\Behavioral\State;


abstract class StatusAbstract
{

    public function senden()
    {
        throw new \Exception('Senden not allowed');
    }

    public function ausliefern()
    {
        throw new \Exception('Ausliefern not allowed');
    }

    public function stornieren()
    {
        throw new \Exception('Stornieren not allowed');
    }

    public function retoure()
    {
        throw new \Exception('Retoure not allowed');
    }

}