<?php

namespace DhBw\Pattern\Behavioral\Strategy;


class BubbleSorter implements SorterInterface
{

    /**
     * @param array $arrayToSort
     */
    public function sort(array &$arrayToSort)
    {
        $n = sizeof($arrayToSort);
        for ($i = 1; $i < $n; $i++) {
            for ($j = $n - 1; $j >= $i; $j--) {
                if($arrayToSort[$j-1] > $arrayToSort[$j]) {
                    $tmp = $arrayToSort[$j - 1];
                    $arrayToSort[$j - 1] = $arrayToSort[$j];
                    $arrayToSort[$j] = $tmp;
                }
            }
        }
    }

}