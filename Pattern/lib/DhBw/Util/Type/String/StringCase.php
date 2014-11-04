<?php

namespace DhBw\Util\Type\String;

use DhBw\Util\Type\TypeHint;

class StringCase
{

    /**
     * @param string $string
     *
     * @return string
     */
    public static function toCamelCaseLower($string)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);

        $camelCase = self::toCamelCaseUpper($string);
        $camelCase = lcfirst($camelCase);

        return $camelCase;
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function toCamelCaseUpper($string)
    {
        $items     = StringToArray::toArrayByDelimiter($string, '-');
        $camelCase = '';
        foreach ($items as $item) {
            $camelCase .= ucfirst($item);
        }

        return $camelCase;
    }

}
