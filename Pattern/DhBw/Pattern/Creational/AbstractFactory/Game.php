<?php

namespace DhBw\Pattern\Creational\AbstractFactory;

use DhBw\Util\Console;

class Game
{

    protected $superHeroFactory;
    protected $console;

    /**
     * @param SuperHeroFactoryInterface $superHeroFactory
     */
    public function __construct(SuperHeroFactoryInterface $superHeroFactory)
    {
        $this->superHeroFactory = $superHeroFactory;
        $this->console = new Console();
    }

    /**
     * @param SuperHeroFactoryInterface $superHeroFactory
     */
    public function setSuperHeroFactory(SuperHeroFactoryInterface $superHeroFactory)
    {
        $this->superHeroFactory = $superHeroFactory;
    }

    public function start()
    {
        $this->console->writeLine('Start New Super Hero Game');
        $this->console->writeLine('-------------------------');

        $superHero = $this->superHeroFactory->createSuperHero();

        $superHero->moveForward();
        $superHero->moveBackward();
        $superHero->turnLeft();
        $superHero->turnRight();
        $superHero->attack();
        $superHero->defend();

        $this->console->writeLine('=========================');
    }

}