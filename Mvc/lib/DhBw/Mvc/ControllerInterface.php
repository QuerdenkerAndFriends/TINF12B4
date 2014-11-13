<?php

namespace DhBw\Mvc;

interface ControllerInterface
{

    /**
     * @param Request $request
     * @return Response
     */
    public function execute(Request $request);

}