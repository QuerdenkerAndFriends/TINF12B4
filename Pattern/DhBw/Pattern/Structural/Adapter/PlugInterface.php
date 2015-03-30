<?php

namespace DhBw\Pattern\Structural\Adapter;


interface PlugInterface
{

    /**
     * @param int $voltage
     *
     * @return void
     */
    public function powerOn($voltage);

    /**
     * @return void
     */
    public function powerOff();

}