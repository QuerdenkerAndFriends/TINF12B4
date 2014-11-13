<?php

namespace DhBw\Pattern\Behavioral\Observer;

use DhBw\Util\Type\TypeHint;

class Point
{

    protected $x = 0;
    protected $y = 0;


    /**
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($x);
        TypeHint::exceptionIfArgumentIsNotInteger($y);

        $this->x = $x;
        $this->y = $y;
    }


    /**
     * @param int $x
     */
    public function setX($x)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($x);

        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($y);

        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

}