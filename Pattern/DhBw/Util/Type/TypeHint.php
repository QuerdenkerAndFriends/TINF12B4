<?php

namespace DhBw\Util\Type;


class TypeHint
{

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function exceptionIfArgumentIsNotString($argument)
    {
        if (!is_string($argument)) {
            self::throwInvalidArgumentException('string', $argument);
        }
    }

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function exceptionIfArgumentIsNotInteger($argument)
    {
        if (!is_int($argument)) {
            self::throwInvalidArgumentException('integer', $argument);
        }
    }

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function exceptionIfArgumentIsNotBoolean($argument)
    {
        if (!is_bool($argument)) {
            self::throwInvalidArgumentException('boolean', $argument);
        }
    }

    /**
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    public static function exceptionIfArgumentIsNotFloat($argument)
    {
        if (!is_float($argument)) {
            self::throwInvalidArgumentException('float', $argument);
        }
    }

    /**
     * @param string $expectedType
     * @param mixed $argument
     *
     * @throws \InvalidArgumentException
     */
    protected static function throwInvalidArgumentException($expectedType, $argument)
    {
        $givenType = gettype($argument);
        $message   = 'Argument has to be %s, %s given';
        $message   = sprintf($message, $expectedType, $givenType);
        throw new \InvalidArgumentException($message);
    }

}