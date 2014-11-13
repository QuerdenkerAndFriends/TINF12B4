<?php

namespace MyApp\MyModule\Model;

class FooModel
{

    protected $foo = 32;

    public function doSomething()
    {
        return $this->foo + 10;
    }

}