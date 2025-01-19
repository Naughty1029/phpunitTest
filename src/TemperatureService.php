<?php

class TemperatureService
{

  /**
   * @param string
   * @return int
   */
  public function getTemperature(): int
  {
      // Access the external service to get the temperature
      return 20;
  }
}