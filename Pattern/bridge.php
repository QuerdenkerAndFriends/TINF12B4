<?php

use DhBw\Util\ClassLoader;
use DhBw\Util\Console;
use DhBw\Pattern\Structural\Bridge\Radio;
use DhBw\Pattern\Structural\Bridge\Tv;
use DhBw\Pattern\Structural\Bridge\PullSwitch;
use DhBw\Pattern\Structural\Bridge\ToggleSwitch;


require_once 'DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('.');
$classLoader->register();

$console = new Console();


$console->writeLine('Test Case 1');
$console->writeLine('-----------');

$pullSwitch = new PullSwitch();
$radio = new Radio($pullSwitch);
$radio->startRadio();
$radio->stopRadio();

$console->newLine();



$console->writeLine('Test Case 2');
$console->writeLine('-----------');

$toggleSwitch = new ToggleSwitch();
$radio = new Radio($toggleSwitch);
$radio->startRadio();
$radio->stopRadio();

$console->newLine();




$console->writeLine('Test Case 3');
$console->writeLine('-----------');

$pullSwitch = new PullSwitch();
$tv = new Tv($pullSwitch);
$tv->startTv();
$tv->stopTv();

$console->newLine();



$console->writeLine('Test Case 4');
$console->writeLine('-----------');

$toggleSwitch = new ToggleSwitch();
$tv = new Tv($toggleSwitch);
$tv->startTv();
$tv->stopTv();

$console->newLine();
