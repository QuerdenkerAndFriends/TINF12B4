<?php

namespace DhBw\Pattern\Behavioral\State;


class Bestellung
{

    protected $status;

    public function __construct()
    {
        $this->status = new OffenStatus();
    }

    public function senden()
    {
        $this->status = $this->status->senden();
    }

    public function ausliefern()
    {
        $this->status = $this->status->ausliefern();
    }

    public function stornieren()
    {
        $this->status = $this->status->stornieren();
    }

    public function retoure()
    {
        $this->status = $this->status->retoure();
    }

}