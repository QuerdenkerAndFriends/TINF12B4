<?php

namespace DhBw\Pattern\Behavioral\Strategy;


class ArrayCollection implements \IteratorAggregate, \Countable
{

    protected $values = array();
    /**
     * @var SorterInterface
     */
    protected $sorter;


    /**
     * @param array $values
     */
    public function initFromArray(array $values)
    {
        $this->values = $values;
    }

    /**
     * @param ArrayCollection $values
     */
    public function initFromCollection(ArrayCollection $values)
    {
        $this->values = $values->toArray();
    }

    /**
     * @param $key
     * @param $value
     */
    public function add($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * @param array $values
     */
    public function addAll(array $values)
    {
        foreach ($values as $key => $value) {
            $this->add($key, $value);
        }
    }

    /**
     * @param $key
     * @throws \RuntimeException
     */
    public function remove($key)
    {
        if (!$this->has($key)) {
            throw new \RuntimeException("Key not set $key");
        }
        unset($this->values[$key]);
    }

    /**
     * @param $key
     *
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public function get($key)
    {
        if (!$this->has($key)) {
            throw new \RuntimeException();
        }

        return $this->values[$key];
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        $isSet = isset($this->values[$key]);

        return $isSet;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public function contains($value)
    {
        foreach ($this->values as $currentValue) {
            if ($value === $currentValue) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->values;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->values);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        $objArrayIterator = new \ArrayIterator($this->toArray());

        return $objArrayIterator;
    }

    /**
     * @param SorterInterface $sorter
     */
    public function setSorter(SorterInterface $sorter)
    {
        $this->sorter = $sorter;
    }

    /**
     * @return bool
     */
    public function isSetSorter()
    {
        $isSet = $this->sorter instanceof SorterInterface;

        return $isSet;
    }

    /**
     * @return SorterInterface
     */
    public function getSorter()
    {
        return $this->sorter;
    }

    /**
     * @throws \RuntimeException
     */
    public function sort()
    {
        if(!$this->isSetSorter()) {
            throw new \RuntimeException('Sorter is not set');
        }
        $this->sorter->sort($this->values);
    }

}