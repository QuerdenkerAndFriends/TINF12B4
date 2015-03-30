<?php

namespace DhBw\Pattern\Behavioral\Observer;

interface MeasurementObserverInterface
{

    /**
     * @param MeasurementSubjectInterface $measurementSubject
     *
     * @return void
     */
    public function update(MeasurementSubjectInterface $measurementSubject);

}