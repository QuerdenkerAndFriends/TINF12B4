<?php

namespace DhBw\Mvc\Router;

use DhBw\Mvc\Request;

interface RouterInterface
{

    /**
     * @param Request $request
     * @return Route
     */
    public function route(Request $request);

}