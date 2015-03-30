<?php

use DhBw\Util\ClassLoader;
use DhBw\Util\Console;
use DhBw\Pattern\Structural\Adapter\Socket;
use DhBw\Pattern\Structural\Adapter\Plug;
use DhBw\Pattern\Structural\Adapter\LegacyPlug;
use DhBw\Pattern\Structural\Adapter\LegacyPlugAdapter;


require_once 'DhBw/Util/ClassLoader.php';


$classLoader = new ClassLoader('DhBw');
$classLoader->setIncludePath('.');
$classLoader->register();

$console = new Console();


$console->writeLine('Test Case 1');
$console->writeLine('-----------');

$socketA = new Socket();
$plug    = new Plug();

$socketA->connectPlug($plug);
$socketA->disconnectPlug();

$console->newLine();



$console->writeLine('Test Case 2');
$console->writeLine('-----------');

$socketB           = new Socket();
$legacyPlug        = new LegacyPlug();
$legacyPlugAdapter = new LegacyPlugAdapter($legacyPlug);

$socketB->connectPlug($legacyPlugAdapter);
$socketB->disconnectPlug();

$console->newLine();