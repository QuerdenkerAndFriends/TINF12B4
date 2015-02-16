<?php

use DhBw\Util\ClassLoader;
use DhBw\Util\Console;

use DhBw\Pattern\Creational\Builder\BurgerBuilder;
use DhBw\Pattern\Creational\Builder\BurgerDirector;
use DhBw\Pattern\Creational\Builder\Menu;


require_once 'DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('.');
$classLoader->register();


$menu = new Menu();
$menu->show();


$burgerBuilder = new BurgerBuilder();

$burgerDirector = new BurgerDirector($burgerBuilder);
$burger = $burgerDirector->startBurgerBuildProcess();

$burger->show();

