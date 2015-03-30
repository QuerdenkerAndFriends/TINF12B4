<?php

namespace DhBw\Pattern\Creational\Builder;

use DhBw\Util\Type\ArrayCollection;
use DhBw\Util\Console;
use DhBw\Util\Type\TypeHint;

use DhBw\Pattern\Creational\Builder\Burger\BurgerLayerAbstract;
use DhBw\Pattern\Creational\Builder\Burger\ExtraBun;
use DhBw\Pattern\Creational\Builder\Burger\Meat;
use DhBw\Pattern\Creational\Builder\Burger\Salad;
use DhBw\Pattern\Creational\Builder\Burger\Ketchup;
use DhBw\Pattern\Creational\Builder\Burger\Mustard;

class Menu
{

    protected $console;
    protected $items;

    public function __construct()
    {
        $this->console = new Console();

        $this->items = new ArrayCollection();
        $this->items->add(0, 'Extra Bun');
        $this->items->add(1, 'Meat');
        $this->items->add(2, 'Salad');
        $this->items->add(3, 'Ketchup');
        $this->items->add(4, 'Mustard');
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        TypeHint::exceptionIfArgumentIsNotString($key);

        return $this->items->has($key);
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function get($key)
    {
        TypeHint::exceptionIfArgumentIsNotString($key);

        return $this->items->get($key);
    }

    /**
     * @return array
     */
    public function getAvailablePositions()
    {
        $positions = array();

        foreach (array_keys($this->items->toArray()) as $key) {
            $positions[] = (string)$key;
        }

        return $positions;
    }

    public function show()
    {
        $console = new Console();

        $console->writeLine('------------------------------------------');
        $console->writeLine('| CUSTOM BURGERS                         |');
        $console->writeLine('------------------------------------------');

        foreach ($this->items as $index => $item) {
            /** @var BurgerLayerAbstract $item */
            $console->writeLine(sprintf('| %s | %s |', (string)$index, str_pad($item, 34)));
        }

        $console->writeLine('------------------------------------------');
        $console->writeLine('| Q | Say Bye!                           |');
        $console->writeLine('------------------------------------------');

        $console->newLine();
    }

}