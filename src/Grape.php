<?php
declare(strict_types=1);
namespace Coswat\Grapes;
use Coswat\Grapes\BaseController;

class Grape extends BaseController
{
    public static $time;

    public static function time(int $time): self
    {
        self::$time = $time;
        return new static();
    }

    public static function toTime(): int|float|string
    {
        $time = date("H:i:s", self::$time);
        return $time;
    }
    public static function toRaw(): int|float|string
    {
        $raw = date("Y-m-d H:i:s", self::$time);
        return $raw;
    }
    public static function toYear(): int
    {
        $year = date("Y", self::$time);
        return (int) $year;
    }
    public static function toMonth(): string
    {
        $month = date("F", self::$time);
        return $month;
    }
    public static function toDay(): string
    {
        $day = date("l", self::$time);
        return $day;
    }
    public static function timeAgo(): string
    {
        return self::findTimeAgo((string) self::$time);
    }
    public static function nextDay(bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+1 day"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }
    public static function nextWeek(bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+1 week"));
        if ($unix) {
            return strtotime($date);
        }

        return $date;
    }
    public static function nextMonth(bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+1 month"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }
    public static function addDays(
        int $day,
        bool $unix = false
    ): string|int|float {
        $date = date("Y-m-d H:i:s", strtotime("+{$day} day"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }
    public static function addWeeks(
        int $week,
        bool $unix = false
    ): string|int|float {
        $date = date("Y-m-d H:i:s", strtotime("+{$week} week"));
        if ($unix) {
            return strtotime($date);
        }

        return $date;
    }
    public static function addMonths(
        int $month,
        bool $unix = false
    ): string|int|float {
        $date = date("Y-m-d H:i:s", strtotime("+{$month} month"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }
    public static function getTimezone(string $ip): string
    {
        return self::timezoneInfo($ip);
    }
    public static function getMs(int|float $start_time, int|float $end_time)
    {
        $execution_time = $end_time - $start_time;
        $execution_time_ms = round($execution_time * 1000, 2);

        return $execution_time_ms . " ms";
    }
}
