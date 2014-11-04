<?php

use DhBw\Mvc\FrontController;
use DhBw\Mvc\Request;
use DhBw\Mvc\Router\RewriteRouter;
use DhBw\Mvc\Router\Route;
use DhBw\Util\ClassLoader;


$strPathBase   = __DIR__.'/..';
$strPathSrc    = $strPathBase . '/src';
$strPathVendor = $strPathBase . '/lib';

require_once $strPathVendor . '/DhBw/Util/ClassLoader.php';

$libClassLoader = new ClassLoader('DhBw');
$libClassLoader->setIncludePath($strPathVendor);
$libClassLoader->register();

$appClassLoader = new ClassLoader('MyApp');
$appClassLoader->setIncludePath($strPathSrc);
$appClassLoader->register();


try {
    $objRequest = Request::instanceFromGlobals();

    $objRouter = new RewriteRouter();
    $objRouter->setDefaultRoute(Route::instanceFromArguments('MyApp', 'MyModule', 'HelloWorld'));

    $frontController = new FrontController($objRouter);
    $frontController->dispatch($objRequest);

} catch(Exception $exception) {
    echo '<pre>'.PHP_EOL;
    echo $exception.PHP_EOL;
    echo '</pre>'.PHP_EOL;
}