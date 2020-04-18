<?php

  class LoginDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("Login");

        
    }




  }

?>