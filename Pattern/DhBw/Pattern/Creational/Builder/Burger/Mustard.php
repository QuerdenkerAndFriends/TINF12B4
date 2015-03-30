<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class Mustard extends BurgerLayerAbstract
{

    protected $name = 'Mustard';

    public function show()
    {
        $this->console->writeLine('Mustard   -        ~~~~~~ ~~~~~ ~~~~~~');
    }

}