<?php

use DhBw\Util\ClassLoader;
use \DhBw\Util\Console;
use \DhBw\Pattern\Behavioral\Observer\ConcreteMeasurementObserverA;
use \DhBw\Pattern\Behavioral\Observer\ConcreteMeasurementObserverB;
use \DhBw\Pattern\Behavioral\Observer\ConcreteMeasurementSubject;
use \DhBw\Pattern\Behavioral\Observer\Point;


require_once 'DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('.');
$classLoader->register();

$console = new Console();


$measurementSubject = new ConcreteMeasurementSubject();
$measurementObserverA = new ConcreteMeasurementObserverA();
$measurementObserverB = new ConcreteMeasurementObserverB();

$measurementSubject->attach($measurementObserverA);
$console->writeLine('...Attached Observer A');
$measurementSubject->attach($measurementObserverB);
$console->writeLine('...Attached Observer B');


for($time = 0; $time <= 20; $time++)
{
    $x = rand(65, 90);
    $y = rand(65, 90);

    if($time == 10) {
        $measurementSubject->detach($measurementObserverB);
        $console->writeLine('...Detached Observer B');
    }

    if($time == 15) {
        $measurementSubject->detach($measurementObserverA);
        $console->writeLine('...Detached Observer A');
        $measurementSubject->attach($measurementObserverB);
        $console->writeLine('...Attached Observer B');
    }

    $measurementSubject->setMeasurementValue($time, new Point($x, $y));
}

