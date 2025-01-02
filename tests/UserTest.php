<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
  public function testReturnsFullName()
  {
    require 'User.php';
    
    $user = new User;
    
    $user->first_name = "Masahiro";
    $user->surname = "Watanabe";

    $this->assertEquals("Masahiro Watanabe", $user->getFullName());
  }

  public function testFullNameIsEmptyDefault()
  {
    
    $user = new User;

    $this->assertEquals("", $user->getFullName());
  }
}
