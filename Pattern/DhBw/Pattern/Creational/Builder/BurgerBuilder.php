<?php

namespace DhBw\Pattern\Creational\Builder;

use DhBw\Pattern\Creational\Builder\Burger\ExtraBun;
use DhBw\Pattern\Creational\Builder\Burger\Ketchup;
use DhBw\Pattern\Creational\Builder\Burger\Meat;
use DhBw\Pattern\Creational\Builder\Burger\Mustard;
use DhBw\Pattern\Creational\Builder\Burger\Salad;
use DhBw\Pattern\Creational\Builder\Burger\TopBun;
use DhBw\Pattern\Creational\Builder\Burger\BottomBun;

class BurgerBuilder implements BurgerBuilderInterface
{

    /**
     * @var Burger
     */
    protected $burger;

    public function __construct()
    {
        $this->initializeNewBurger();
    }

    public function initializeNewBurger()
    {
        $this->burger = new Burger();
        $this->burger->add(new BottomBun());
    }

    public function addExtraBun()
    {
        $this->burger->add(new ExtraBun());
    }

    public function addMeat()
    {
        $this->burger->add(new Meat());
    }

    public function addSalad()
    {
        $this->burger->add(new Salad());
    }

    public function addKetchup()
    {
        $this->burger->add(new Ketchup());
    }

    public function addMustard()
    {
        $this->burger->add(new Mustard());
    }

    public function finalizeBurger()
    {
        $this->burger->add(new TopBun());
    }

    /**
     * @return Burger
     */
    public function getBurger()
    {
        $this->finalizeBurger();
        $burger = $this->burger;
        $this->initializeNewBurger();

        return $burger;
    }

}