<?php

use DhBw\Util\ClassLoader;
use DhBw\Util\Console;

use DhBw\Pattern\Creational\AbstractFactory\WarriorFactory;
use DhBw\Pattern\Creational\AbstractFactory\AmazonFactory;
use DhBw\Pattern\Creational\AbstractFactory\SorcererFactory;
use DhBw\Pattern\Creational\AbstractFactory\Game;

require_once 'DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('.');
$classLoader->register();


$warriorFactory = new WarriorFactory();
$amazonFactory = new AmazonFactory();
$sorcererFactory = new SorcererFactory();

$game = new Game($warriorFactory);
$game->start();

$game->setSuperHeroFactory($amazonFactory);
$game->start();

$game->setSuperHeroFactory($sorcererFactory);
$game->start();



