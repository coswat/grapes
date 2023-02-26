<?php
namespace Coswat\Grapes;

class Grape 
{
    public static $time;
    
    public static function Time(int $time): self
    {
       self::$time = $time;
       return new static;
    }
    
    public static function toTime()
    {
       $time = date('H:i:s',self::$time);
       return $time;
    }
    public static function toRaw()
    {
      $raw = date('Y-m-d H:i:s',self::$time);
      return $raw;
    }
    public static function toYear()
    {
      $year = date('Y',self::$time);
      return $year;
    }
}