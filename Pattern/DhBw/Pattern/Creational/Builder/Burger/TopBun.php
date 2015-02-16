<?php

namespace DhBw\Pattern\Creational\Builder\Burger;

class TopBun extends BurgerLayerAbstract
{

    protected $name = 'Top Bun';

    public function show()
    {
        $this->console->writeLine('Bun       -              BUN BUN');
        $this->console->writeLine('                     BUN BUN BUN BUN');
        $this->console->writeLine('                   BUN BUN BUN BUN BUN');
    }

}