<?php

namespace DhBw\Pattern\Creational\Builder;

use DhBw\Util\Type\ArrayCollection;
use DhBw\Util\Console;
use DhBw\Pattern\Creational\Builder\Burger\BurgerLayerAbstract;

class Burger
{

    protected $console;
    protected $layers;

    public function __construct()
    {
        $this->console = new Console();
        $this->layers = new ArrayCollection();
    }

    /**
     * @param BurgerLayerAbstract $burgerLayer
     */
    public function add(BurgerLayerAbstract $burgerLayer)
    {
        $this->layers->add($this->layers->count(), $burgerLayer);
    }

    public function show()
    {
        $this->console->newLine();
        $this->console->newLine();

        $layers = array_reverse($this->layers->toArray());

        foreach ($layers as $layer) {
            /** @var BurgerLayerAbstract $layer */
            $layer->show();
        }

        $this->console->newLine();
        $this->console->newLine();
    }

}