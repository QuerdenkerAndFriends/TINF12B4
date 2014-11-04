<?php

namespace DhBw\Util\Type\String;

use DhBw\Util\Type\TypeHint;

class StringReplace
{

    /**
     * @param string $string
     * @param string $search
     * @param string $replace
     *
     * @return string
     */
    public static function replace($string, $search, $replace)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($search);
        TypeHint::exceptionIfArgumentIsNotString($replace);

        return (string)str_replace($search, $replace, $string);
    }

}
