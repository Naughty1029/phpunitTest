<?php

class User
{
  /**
   * @var string
   */
  public $first_name;
  
  /**
   * @var string
   */
  public $surname;

  /**
   * @return string
   */
  public function getFullName()
  {
    return trim("$this->first_name $this->surname");
  }
}