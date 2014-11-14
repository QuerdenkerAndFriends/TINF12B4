<?php

namespace DhBw\Pattern\Structural\Adapter;


class Socket
{

    /**
     * @var PlugInterface
     */
    public $plug;
    /**
     * @var int
     */
    public $voltage = 230;

    /**
     * @param PlugInterface $plug
     */
    public function connectPlug(PlugInterface $plug)
    {
        $this->plug = $plug;
        $this->plug->powerOn($this->voltage);
    }

    public function disconnectPlug()
    {
        $this->plug->powerOff();
        $this->plug = null;
    }

}