<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class ExtraBun extends BurgerLayerAbstract
{

    protected $name = 'Extra Bun';

    public function show()
    {
        $this->console->writeLine('Extra Bun -       BUN BUN BUN BUN BUN B');
    }

}