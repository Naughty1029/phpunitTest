<?php

class Mailer
{
  /**
   * @param string
   * @param string
   * 
   * @return boolean
   */

   public function sendMessage($email, $message)
   {
      if (empty($email))
      {
          throw new Exception;
      }
      
      // Use mail() or PHPMailer for example
      sleep(3);

      echo "send '$message' to '$email'";

      return true;
   }
}