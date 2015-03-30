<?php

namespace MyApp\MyModule\Controller;

use DhBw\Mvc\ControllerInterface;
use DhBw\Mvc\Request;
use DhBw\Mvc\Response;
use DhBw\Mvc\Renderer\Renderer;


class BinController implements ControllerInterface
{

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function execute(Request $request)
    {
        $renderer = new Renderer();
        $body = $renderer->render('../src/MyApp/MyModule/View/bin.php');

        $response = new Response();
        $response->setBody($body);

        return $response;
    }

}