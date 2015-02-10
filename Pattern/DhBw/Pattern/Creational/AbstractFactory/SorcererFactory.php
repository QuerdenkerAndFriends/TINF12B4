<?php

namespace DhBw\Pattern\Creational\AbstractFactory;


class SorcererFactory implements SuperHeroFactoryInterface
{

    /**
     * @return SuperHero
     */
    public function createSuperHero()
    {
        $superHero = new SuperHero(
            'Sorcerer',
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
        return new Fly();
    }

    /**
     * @return AttackInterface
     */
    public function createAttack()
    {
        return new Fireball();
    }

    /**
     * @return DefenseInterface
     */
    public function createDefense()
    {
        return new MagicShield();
    }

}