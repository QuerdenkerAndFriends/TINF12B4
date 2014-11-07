<?php

namespace DhBw\Pattern\Behavioral\Observer;

use DhBw\Util\Type\ArrayCollection;
use DhBw\Util\Type\TypeHint;

class ConcreteMeasurementSubject implements MeasurementSubjectInterface
{

    protected $time = 0;
    protected $point;

    /**
     * @var ArrayCollection
     */
    protected $observers;


    public function __construct()
    {
        $this->point = new Point(0, 0);
        $this->observers = new ArrayCollection();
    }


    /**
     * @param MeasurementObserverInterface $measurementObserver
     */
    public function attach(MeasurementObserverInterface $measurementObserver)
    {
        $this->observers->add(get_class($measurementObserver), $measurementObserver);
    }

    /**
     * @param MeasurementObserverInterface $measurementObserver
     */
    public function detach(MeasurementObserverInterface $measurementObserver)
    {
        $this->observers->remove(get_class($measurementObserver));
    }

    public function notify()
    {
        foreach($this->observers as $observer) {
            /** @var MeasurementObserverInterface $observer */
            $observer->update($this);
        }
    }

    /**
     * @param int $time
     * @param Point $point
     */
    public function setMeasurementValue($time, Point $point)
    {
        TypeHint::exceptionIfArgumentIsNotInteger($time);

        $this->time = $time;
        $this->point = $point;

        $this->notify();
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return Point
     */
    public function getPoint()
    {
        return $this->point;
    }

}