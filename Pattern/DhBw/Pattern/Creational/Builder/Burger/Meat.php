<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class Meat extends BurgerLayerAbstract
{

    protected $name = 'Meat';

    public function show()
    {
        $this->console->writeLine('Meat      -       #####################');
    }

}