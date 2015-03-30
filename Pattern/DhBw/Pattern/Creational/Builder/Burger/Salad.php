<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class Salad extends BurgerLayerAbstract
{

    protected $name = 'Salad';

    public function show()
    {
        $this->console->writeLine('Salad     -       \\/\\/\\/ \\/\\ /\\/ \\/\\/\\/');
    }

}