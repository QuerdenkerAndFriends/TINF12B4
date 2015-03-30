<?php

namespace DhBw\Pattern\Creational\Builder;

use DhBw\Util\Console;
use DhBw\Util\Type\TypeHint;

class BurgerDirector
{

    protected $console;
    protected $burgerBuilder;
    protected $menu;

    /**
     * @param BurgerBuilderInterface $burgerBuilder
     */
    public function __construct(BurgerBuilderInterface $burgerBuilder)
    {
        $this->console = new Console();
        $this->menu = new Menu();
        $this->burgerBuilder = $burgerBuilder;
    }

    /**
     * @return Burger
     *
     * @throws \RuntimeException
     */
    public function startBurgerBuildProcess()
    {
        $this->welcomeClient();

        $order = $this->getOrder();

        while (strtolower($order != 'q')) {

            switch($order) {

                case '0':
                    $this->burgerBuilder->addExtraBun();
                    break;

                case '1':
                    $this->burgerBuilder->addMeat();
                    break;

                case '2':
                    $this->burgerBuilder->addSalad();
                    break;

                case '3':
                    $this->burgerBuilder->addKetchup();
                    break;

                case '4':
                    $this->burgerBuilder->addMustard();
                    break;

                default:
                    throw new \RuntimeException('Not implemented ' . $order);

            }

            $this->console->writeLine('Burger Director: Ok, what else?');
            $order = $this->getOrder();
        }

        $this->sayGoodbye();

        return $this->burgerBuilder->getBurger();
    }

    public function welcomeClient()
    {
        $this->console->writeLine('-------------------------------------------------------------------------');
        $this->console->writeLine('Burger Director: Welcome at CUSTOM BURGERS. What do you want on your bun?');
    }

    /**
     * @return string
     */
    protected function getOrder()
    {
        $options = $this->menu->getAvailablePositions();
        $options[] = 'q';
        $options[] = 'Q';

        $order = $this->console->promptChoice('Client: ', $options, 'Burger Director: Sorry, "%s" seems to be out.');

        return strtolower($order);
    }

    public function sayGoodbye()
    {
        $this->console->writeLine('Burger Director: Tanks! Here is your custom burger:');
        $this->console->newLine();
    }

    /**
     * @param BurgerBuilderInterface $burgerBuilder
     */
    public function setBurgerBuilder(BurgerBuilderInterface $burgerBuilder)
    {
        $this->burgerBuilder = $burgerBuilder;
    }

}