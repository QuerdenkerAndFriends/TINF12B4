<?php

namespace DhBw\Mvc;

use DhBw\Mvc\Router\RouterInterface;
use DhBw\Util\Type\TypeHint;

class FrontController
{

    protected $router;


    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }


    /**
     * @param Request $request
     */
    public function dispatch(Request $request)
    {
        $route = $this->router->route($request);

        $controllerName     = $route->getControllerClassName();
        $controllerInstance = $this->getControllerInstanceFor($controllerName);

        $response = $controllerInstance->execute($request);

        $this->sendResponse($response);
    }

    /**
     * @param string $controllerName
     *
     * @return ControllerInterface
     *
     * @throws \RuntimeException
     */
    protected function getControllerInstanceFor($controllerName)
    {
        TypeHint::exceptionIfArgumentIsNotString($controllerName);

        $controllerInstance = new $controllerName();
        if (!$controllerInstance instanceof ControllerInterface) {
            throw new \RuntimeException('Controller must implement ControllerInterface but does not');
        }

        return $controllerInstance;
    }

    /**
     * @param Response $response
     *
     * @throws \RuntimeException
     */
    protected function sendResponse(Response $response)
    {
        if (\headers_sent() && $response->hasHeaders()) {
            throw new \RuntimeException('Headers already sent');
        }
        foreach ($response->getHeaders() as $header) {
            \header($header);
        }

        echo $response->getBody();
        \flush();
    }

}
