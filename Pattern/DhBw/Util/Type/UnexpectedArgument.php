<?php

namespace DhBw\Util\Type;

class UnexpectedArgument
{

    public static function throwExceptionIfStringLengthLess($string, $minChars = 0)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotInteger($minChars);

        if(strlen($string) < $minChars) {
            throw new \UnexpectedValueException("Argument of type string must have at least $minChars chars");
        }
    }

    public static function throwExceptionIfNegativeInteger($integer)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($integer);

        if($integer < 0) {
            throw new \UnexpectedValueException("Argument of type integer must be positive, negative $integer given");
        }
    }

}