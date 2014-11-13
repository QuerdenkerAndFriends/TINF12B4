<?php

namespace DhBw\Mvc\Router;

use DhBw\Mvc\Request;
use DhBw\Util\Parser\UrlParser;
use DhBw\Util\Type\SimpleArray\ArrayReformat;
use DhBw\Util\Type\String\StringCase;
use DhBw\Util\Type\String\StringToArray;

class RewriteRouter implements RouterInterface
{

    protected $defaultRoute;
    protected $urlParser;

    public function __construct()
    {
        $this->urlParser = new UrlParser();
    }

    /**
     * @param Request $request
     *
     * @return Route
     *
     * @throws \RuntimeException
     */
    public function route(Request $request)
    {
        $url       = $this->urlParser->parse($request->getUrl());
        $path      = $url->getPathCleaned();
        $pathItems = StringToArray::toArrayByDelimiter($path, '/');

        if ($this->isRoutable($pathItems)) {
            $route = $this->routeSpecified($request, $pathItems);

        } elseif ($this->hasDefaultRoute()) {
            $route = $this->routeDefault($request, $pathItems);

        } else {
            throw new \RuntimeException('Request cannot be routed');
        }

        return $route;
    }

    /**
     * @param array $pathItems
     *
     * @return bool
     */
    protected function isRoutable(array $pathItems)
    {
        return count($pathItems) >= 3;
    }

    /**
     * @param Request $request
     * @param array $pathItems
     *
     * @return Route
     */
    protected function routeSpecified(Request $request, array $pathItems)
    {
        $app        = array_shift($pathItems);
        $module     = array_shift($pathItems);
        $controller = array_shift($pathItems);

        $app        = StringCase::toCamelCaseUpper($app);
        $module     = StringCase::toCamelCaseUpper($module);
        $controller = StringCase::toCamelCaseUpper($controller);

        $route = new Route();
        $route->setApp($app);
        $route->setModule($module);
        $route->setController($controller);

        $additionalGetParameters = ArrayReformat::shiftEvenValuesToKey($pathItems);

        $request->getGetParameters()->addAll($additionalGetParameters);

        return $route;
    }

    /**
     * @param Request $request
     * @param array $pathItems
     *
     * @return Route
     */
    protected function routeDefault(Request $request, array $pathItems)
    {
        $route                   = $this->getDefaultRoute();
        $additionalGetParameters = ArrayReformat::shiftEvenValuesToKey($pathItems);

        $request->getGetParameters()->addAll($additionalGetParameters);

        return $route;
    }


    /**
     * @param UrlParser $urlParser
     */
    public function setUrlParser(UrlParser $urlParser)
    {
        $this->urlParser = $urlParser;
    }

    /**
     * @return bool
     */
    public function hasDefaultRoute()
    {
        return $this->defaultRoute instanceof Route;
    }

    /**
     * @param Route $route
     */
    public function setDefaultRoute(Route $route)
    {
        $this->defaultRoute = $route;
    }

    /**
     * @return Route
     * @throws \DomainException
     */
    public function getDefaultRoute()
    {
        if (!$this->hasDefaultRoute()) {
            throw new \DomainException('Default Route is not set');
        }

        return $this->defaultRoute;
    }

}