<?php

namespace DhBw\Util\Type\SimpleArray;

class ArrayReformat
{

    /**
     * @param array $items
     * @return array
     * @throws \RuntimeException
     */
    public static function shiftEvenValuesToKeyStrict(array $items)
    {
        $assocItems = self::shiftEvenValuesToKey($items);

        if (count($assocItems) < count($items) / 2) {
            throw new \RuntimeException("Duplicate keys");
        }

        return $assocItems;
    }

    /**
     * @param array $items
     * @return array
     */
    public static function shiftEvenValuesToKey(array $items)
    {
        $assocItems = array();

        $i    = 0;
        $iMax = count($items);

        while ($i < $iMax) {

            $key = $items[$i];
            $i++;

            $value = isset($items[$i]) ? $items[$i] : null;
            $i++;

            if (strlen($key) > 0) {
                $assocItems[$key] = $value;
            }
        }

        return $assocItems;
    }

}