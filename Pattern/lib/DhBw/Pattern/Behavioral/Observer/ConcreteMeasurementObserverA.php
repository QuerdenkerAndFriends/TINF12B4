<?php

namespace DhBw\Pattern\Behavioral\Observer;

use DhBw\Util\Console;

class ConcreteMeasurementObserverA implements  MeasurementObserverInterface
{

    /**
     * @param MeasurementSubjectInterface $measurementSubject
     */
    public function update(MeasurementSubjectInterface $measurementSubject)
    {
        $console = new Console();

        $point = $measurementSubject->getPoint();
        $time = $measurementSubject->getTime();

        $console->writeLine("Observer A: [{$time}] {$point->getX()}/{$point->getY()}");
    }

}