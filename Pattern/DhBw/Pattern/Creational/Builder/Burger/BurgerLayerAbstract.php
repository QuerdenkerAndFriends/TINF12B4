<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

use DhBw\Util\Console;

abstract class BurgerLayerAbstract
{

    protected $name = '';
    protected $console;

    public function __construct()
    {
        $this->console = new Console();
    }

    abstract public function show();

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}