<?php

namespace DhBw\Pattern\Behavioral\Observer;

use DhBw\Util\Console;

class ConcreteMeasurementObserverB implements  MeasurementObserverInterface
{

    /**
     * @param MeasurementSubjectInterface $measurementSubject
     */
    public function update(MeasurementSubjectInterface $measurementSubject)
    {
        $console = new Console();

        $time = $measurementSubject->getTime();
        $point = $measurementSubject->getPoint();
        $x = chr($point->getX());
        $y = chr($point->getY());

        $console->writeLine("Observer B: [{$time}] {$x}{$y}");
    }

}