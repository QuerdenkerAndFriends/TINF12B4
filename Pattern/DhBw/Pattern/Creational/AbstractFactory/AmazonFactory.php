<?php

namespace DhBw\Pattern\Creational\AbstractFactory;


class AmazonFactory implements SuperHeroFactoryInterface
{

    /**
     * @return SuperHero
     */
    public function createSuperHero()
    {
        $superHero = new SuperHero(
            'Amazon',
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
        return new BowAndArrow();
    }

    /**
     * @return DefenseInterface
     */
    public function createDefense()
    {
        return new Dodge();
    }

}