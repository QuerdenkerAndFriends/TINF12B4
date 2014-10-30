<?php

namespace DhBw\Pattern\Behavioral\Strategy;


class PhpSorter implements SorterInterface
{

    /**
     * @param array $arrayToSort
     */
    public function sort(array &$arrayToSort)
    {
        sort($arrayToSort, SORT_REGULAR);
    }

}