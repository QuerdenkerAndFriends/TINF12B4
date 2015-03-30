<?php

namespace DhBw\Pattern\Structural\Adapter;

use DhBw\Util\Type\TypeHint;


class LegacyPlugAdapter implements PlugInterface
{

    /**
     * @var LegacyPlug
     */
    protected $legacyPlug;

    /**
     * @param LegacyPlug $legacyPlug
     */
    public function __construct(LegacyPlug $legacyPlug)
    {
        $this->legacyPlug = $legacyPlug;
    }

    /**
     * @param int $voltage
     */
    public function powerOn($voltage)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($voltage);

        if($voltage > 160) {
            $voltage = 160;
        }

        $this->legacyPlug->on($voltage);
    }

    public function powerOff()
    {
        $this->legacyPlug->off();
    }

}