<?php

namespace DhBw\Util\Type\String;

use DhBw\Util\Type\TypeHint;

class StringTrim
{

    /**
     * @param string $string
     *
     * @return string
     */
    public static function trimWhitespaces($string)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);

        return self::trimChars($string, ' ');
    }

    /**
     * @param string $string
     * @param string $charlist
     *
     * @return string
     */
    public static function trimChars($string, $charlist)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($charlist);

        return trim($string, $charlist);
    }

    /**
     * @param $string
     * @param $charlist
     *
     * @return string
     */
    public static function trimLeftChars($string, $charlist)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($charlist);

        return ltrim($string, $charlist);
    }

    /**
     * @param $string
     * @param $charlist
     *
     * @return string
     */
    public static function trimRightChars($string, $charlist)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($charlist);

        return rtrim($string, $charlist);
    }

    /**
     * @param string $string
     * @param string $stringToFind
     *
     * @return string
     */
    public static function trimLeftByFirstFoundString($string, $stringToFind)
    {
        TypeHint::exceptionIfArgumentIsNotString($string);
        TypeHint::exceptionIfArgumentIsNotString($stringToFind);

        $position = strpos($string, $stringToFind);

        if ($position !== false) {
            $positionToStart = $position + strlen($stringToFind);
            $string          = substr($string, $positionToStart);
        }

        return $string;
    }

}