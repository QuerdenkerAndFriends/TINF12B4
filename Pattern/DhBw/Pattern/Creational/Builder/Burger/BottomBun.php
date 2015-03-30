<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class BottomBun extends BurgerLayerAbstract
{

    protected $name = 'Bottom Bun';

    public function show()
    {
        $this->console->writeLine('                   BUN BUN BUN BUN BUN');
        $this->console->writeLine('Bun       -          BUN BUN BUN BUN');
    }

}