<?php

namespace DhBw\Pattern\Behavioral\Strategy;


interface SorterInterface
{

    /**
     * @param array $arrayToSort
     */
    public function sort(array &$arrayToSort);

}