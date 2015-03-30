<?php

namespace DhBw\Pattern\Behavioral\Observer;

interface MeasurementSubjectInterface
{

    /**
     * @param MeasurementObserverInterface $measurementObserver
     *
     * @return void
     */
    public function attach(MeasurementObserverInterface $measurementObserver);

    /**
     * @param MeasurementObserverInterface $measurementObserver
     *
     * @return void
     */
    public function detach(MeasurementObserverInterface $measurementObserver);

    /**
     * @return void
     */
    public function notify();

}