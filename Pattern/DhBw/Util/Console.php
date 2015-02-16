<?php

namespace DhBw\Util;

use \DhBw\Util\Type\TypeHint;
use DhBw\Util\Type\UnexpectedArgument;

class Console
{

    /**
     * @param string $text
     */
    public function writeLine($text)
    {
        TypeHint::exceptionIfArgumentIsNotString($text);

        $this->write($text);
        $this->newLine();
    }

    /**
     * @param string $text
     */
    public function write($text)
    {
        TypeHint::exceptionIfArgumentIsNotString($text);

        echo $text;
    }

    public function newLine()
    {
        echo PHP_EOL;
    }

    /**
     * @return string
     */
    public function readLine()
    {
        $line = trim(fgets(STDIN));

        return $line;
    }

    /**
     * @param string $prompt
     *
     * @return string
     */
    public function prompt($prompt)
    {
        TypeHint::exceptionIfArgumentIsNotString($prompt);

        $this->write($prompt);

        return $this->readLine();
    }

    /**
     * @param string $prompt
     * @param array $options
     * @param string $invalidChoiceMessage
     *
     * @return string
     *
     * @throws \UnexpectedValueException
     */
    public function promptChoice($prompt, array $options, $invalidChoiceMessage = 'please try again')
    {
        TypeHint::exceptionIfArgumentIsNotString($prompt);

        if (count($options) === 0) {
            throw new \UnexpectedValueException('Options array must not be empty');
        }

        $input = $this->prompt($prompt);

        while (!in_array($input, $options, true)) {
            $this->writeLine(sprintf($invalidChoiceMessage, $input));

            $input = $this->prompt($prompt);
        }

        return $input;
    }

}