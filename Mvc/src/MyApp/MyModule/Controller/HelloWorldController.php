<?php

namespace MyApp\MyModule\Controller;

use DhBw\Mvc\ControllerInterface;
use DhBw\Mvc\Request;
use DhBw\Mvc\Response;

class HelloWorldController implements ControllerInterface
{

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function execute(Request $request)
    {
        $response = new Response();
        $response->setBody('Hello World');

        return $response;
    }

}