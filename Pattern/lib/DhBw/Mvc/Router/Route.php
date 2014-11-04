<?php

namespace DhBw\Mvc\Router;

use DhBw\Util\Type\String\StringReplace;
use DhBw\Util\Type\TypeHint;

class Route
{

    protected $controllerNamespaceFormat = '\\%APP%\\%MODULE%\\Controller\\%CONTROLLER%Controller';
    protected $modelFactoryNamespaceFormat = '\\%APP%\\%MODULE%\\Model\\%MODULE%ModelFactory';
    protected $app = '';
    protected $module = '';
    protected $controller = '';

    /**
     * @param string $app
     * @param string $module
     * @param string $controller
     *
     * @return Route
     */
    public static function instanceFromArguments($app, $module, $controller)
    {
        TypeHint::exceptionIfArgumentIsNotString($app);
        TypeHint::exceptionIfArgumentIsNotString($module);
        TypeHint::exceptionIfArgumentIsNotString($controller);

        $route = new Route();
        $route->setApp($app);
        $route->setModule($module);
        $route->setController($controller);

        return $route;
    }

    /**
     * @param string $app
     */
    public function setApp($app)
    {
        TypeHint::exceptionIfArgumentIsNotString($app);
        $this->app = $app;
    }

    /**
     * @return string
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        TypeHint::exceptionIfArgumentIsNotString($controller);
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $module
     */
    public function setModule($module)
    {
        TypeHint::exceptionIfArgumentIsNotString($module);
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return string
     */
    public function getControllerClassName()
    {
        $controllerName = $this->buildClassName($this->controllerNamespaceFormat);

        return $controllerName;
    }

    /**
     * @return string
     */
    public function getModelFactoryClassName()
    {
        $factoryName = $this->buildClassName($this->modelFactoryNamespaceFormat);

        return $factoryName;
    }

    /**
     * @param string $namespaceFormat
     *
     * @return string
     */
    protected function buildClassName($namespaceFormat)
    {
        TypeHint::exceptionIfArgumentIsNotString($namespaceFormat);

        $className = $namespaceFormat;
        $className = StringReplace::replace($className, '%APP%', $this->getApp());
        $className = StringReplace::replace($className, '%MODULE%', $this->getModule());
        $className = StringReplace::replace($className, '%CONTROLLER%', $this->getController());

        return $className;
    }

}