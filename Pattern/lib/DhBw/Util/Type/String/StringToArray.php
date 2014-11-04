<?php

namespace DhBw\Util\Type\String;

use DhBw\Util\Type\SimpleArray\ArrayReformat;
use DhBw\Util\Type\TypeHint;
use DhBw\Util\Type\UnexpectedArgument;

class StringToArray
{

    /**
     * @param string $string
     * @param string $delimiter
     *
     * @return array
     */
    public static function toArrayByDelimiter($string, $delimiter)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($delimiter);
        UnexpectedArgument::throwExceptionIfStringLengthLess($delimiter, 1);

        return explode($delimiter, $string);
    }

    /**
     * @param string $string
     * @param string $delimiter
     *
     * @return array
     */
    public static function toKeyValueArrayByDelimiter($string, $delimiter)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($delimiter);

        $items      = self::toArrayByDelimiter($string, $delimiter);
        $assocItems = ArrayReformat::shiftEvenValuesToKey($items);

        return $assocItems;
    }

}
