<?php

namespace DhBw\Pattern\Creational\Builder;

interface BurgerBuilderInterface
{

    public function addExtraBun();
    public function addMeat();
    public function addSalad();
    public function addKetchup();
    public function addMustard();

    /**
     * @return Burger
     */
    public function getBurger();

}