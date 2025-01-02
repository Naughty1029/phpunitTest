<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
  public function testReturnsFullName()
  {    
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

  /**
   * @test
  */
  public function user_has_first_name()
  {
    
    $user = new User;
    $user->first_name = "Masahiro";

    $this->assertEquals("Masahiro", $user->first_name);
  }
}
