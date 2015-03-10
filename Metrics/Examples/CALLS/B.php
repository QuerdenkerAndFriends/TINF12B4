<?php

class B
{
    public function a()
    {
        $this->b();
    }

    public function b()
    {
        $a = new A();
        $a->a();
    }

}