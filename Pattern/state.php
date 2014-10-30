<?php

use DhBw\Util\ClassLoader;
use \DhBw\Pattern\Behavioral\State\Bestellung;
use \DhBw\Util\Console;

require_once 'lib/DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('lib');
$classLoader->register();

$console = new Console();


$console->writeLine('Test Case 1:');
$console->writeLine('-----------');
$bestellung = new Bestellung();
$bestellung->senden();
$bestellung->ausliefern();
$bestellung->retoure();
$console->newLine();


$console->writeLine('Test Case 2:');
$console->writeLine('-----------');
$bestellung = new Bestellung();
$bestellung->stornieren();
$console->newLine();


$console->writeLine('Test Case 3:');
$console->writeLine('-----------');
$bestellung = new Bestellung();

try {
    $bestellung->retoure();
} catch(Exception $exception) {
    $console->writeLine($exception->getMessage());
    $console->newLine();
}
