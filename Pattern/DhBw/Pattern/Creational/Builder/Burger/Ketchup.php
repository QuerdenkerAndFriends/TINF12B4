<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class Ketchup extends BurgerLayerAbstract
{

    protected $name = 'Ketchup';

    public function show()
    {
        $this->console->writeLine('Ketchup   -        ^^^^^  ^^^^^  ^^^^^');
    }

}