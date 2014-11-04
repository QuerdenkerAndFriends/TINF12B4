<?php

namespace MyApp\MyModule\Controller;

use DhBw\Mvc\ControllerInterface;
use DhBw\Mvc\Request;
use DhBw\Mvc\Response;
use MyApp\MyModule\Model\FooModel;

class FooController implements ControllerInterface
{

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function execute(Request $request)
    {
        $fooModel = new FooModel();
        $body = 'The Foo Action ' . $fooModel->doSomething();

        $response = new Response();
        $response->setBody($body);

        return $response;
    }

}