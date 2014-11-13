<?php

use DhBw\Util\ClassLoader;
use \DhBw\Util\Console;
use DhBw\Pattern\Behavioral\Strategy\ArrayCollection;
use DhBw\Pattern\Behavioral\Strategy\PhpSorter;
use DhBw\Pattern\Behavioral\Strategy\BubbleSorter;

require_once 'DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('.');
$classLoader->register();

$console = new Console();


$console->writeLine('Test Case 1');
$console->writeLine('-----------');
$arrayCollection = new ArrayCollection();
$arrayCollection->add(0, 'TEST');
$arrayCollection->add(1, 'BLA');
$arrayCollection->add(2, 'FOO');
$arrayCollection->add(3, 'BIN');
$arrayCollection->add(4, 'BAR');
$arrayCollection->setSorter(new PhpSorter());

$console->writeLine('No of items: ' . (string)count($arrayCollection));

$console->writeLine('Unsorted: ');
foreach ($arrayCollection as $item) {
    $console->writeLine(' - ' . (string)$item);
}

$console->writeLine('Sorted by ' . get_class($arrayCollection->getSorter()) . ': ');
$arrayCollection->sort();
foreach ($arrayCollection as $item) {
    $console->writeLine(' - ' . (string)$item);
}
$console->newLine();



$console->writeLine('Test Case 2');
$console->writeLine('-----------');
$arrayCollection = new ArrayCollection();
$arrayCollection->add(0, 'TEST');
$arrayCollection->add(1, 'BLA');
$arrayCollection->add(2, 'FOO');
$arrayCollection->add(3, 'BIN');
$arrayCollection->add(4, 'BAR');
$arrayCollection->setSorter(new BubbleSorter());

$console->writeLine('No of items: ' . (string)count($arrayCollection));

$console->writeLine('Unsorted: ');
foreach ($arrayCollection as $item) {
    $console->writeLine(' - ' . (string)$item);
}

$console->writeLine('Sorted by ' . get_class($arrayCollection->getSorter()) . ': ');
$arrayCollection->sort();
foreach ($arrayCollection as $item) {
    $console->writeLine(' - ' . (string)$item);
}
$console->newLine();