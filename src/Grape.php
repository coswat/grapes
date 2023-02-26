<?php
declare(strict_types=1);
namespace Coswat\Grapes;
use Coswat\Grapes\BaseController;

class Grape extends BaseController
{
    public static $time;
    
    public static function Time(int $time): self
    {
       self::$time = $time;
       return new static;
    }
    
    public static function toTime(): int|float
    {
       $time = date('H:i:s',self::$time);
       return $time;
    }
    public static function toRaw(): int|float
    {
      $raw = date('Y-m-d H:i:s',self::$time);
      return $raw;
    }
    public static function toYear(): int
    {
      $year = date('Y',self::$time);
      return $year;
    }
    public static function toMonth(): string
    {
      $month = date('F',self::$time);
      return $month;
    }
    public static function toDay(): string
    {
       $day = date('l',self::$time);
       return $day;
    }
    public static function timeAgo(): string
    {
       return self::findTimeAgo((string)self::$time);
    }
    public static function nextDay()
    {
       $date = date('Y-m-d', strtotime("+1 day"));
       return $date;
    }
}