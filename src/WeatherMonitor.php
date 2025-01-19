<?php

class WeatherMonitor
{
  /**
   * @var TemperatureService
   */
  protected $service;

  /**
   * @param TemperatureService $service
   */
  public function __construct(TemperatureService $service)
  {
    $this->service = $service;
  }

  public function getAverageTemperature(string $start, string $end): int
  {
    $startTemp = $this->service->getTemperature($start);
    $endTemp = $this->service->getTemperature($end);

    return ($startTemp + $endTemp) / 2;
  }
}