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
   * Email address
   * @var string
   */
  public $email;

  /**
   * Mailer object
   * @var Mailer
   */
  protected $mailer;

  /**
   * Set the mailer dependency
   *
   * @param Mailer $mailer The Mailer object
   */
  public function setMailer(Mailer $mailer) {
    $this->mailer = $mailer;
  }

  /**
   * @return string
   */
  public function getFullName()
  {
    return trim("$this->first_name $this->surname");
  }

  /**
   * Send the user a message
   *
   * @param string $message The message
   *
   * @return boolean True if sent, false otherwise
   */
  public function notify($message)
  {
    return $this->mailer->sendMessage($this->email, $message);
  }
}