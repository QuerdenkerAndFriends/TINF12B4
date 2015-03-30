<?php

namespace DhBw\Pattern\Creational\AbstractFactory;


class WarriorFactory implements SuperHeroFactoryInterface
{

    /**
     * @return SuperHero
     */
    public function createSuperHero()
    {
        $superHero = new SuperHero(
            'Warrior',
            $this->createMovement(),
            $this->createAttack(),
            $this->createDefense()
        );

        return $superHero;
    }

    /**
     * @return MovementInterface
     */
    public function createMovement()
    {
        return new Walk();
    }

    /**
     * @return AttackInterface
     */
    public function createAttack()
    {
        return new Sword();
    }

    /**
     * @return DefenseInterface
     */
    public function createDefense()
    {
        return new Shield();
    }

}