<?php

namespace DhBw\Pattern\Creational\AbstractFactory;


interface SuperHeroFactoryInterface
{

    /**
     * @return SuperHero
     */
    public function createSuperHero();

    /**
     * @return MovementInterface
     */
    public function createMovement();

    /**
     * @return AttackInterface
     */
    public function createAttack();

    /**
     * @return DefenseInterface
     */
    public function createDefense();

}