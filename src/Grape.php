<?php

declare(strict_types=1);

/*
 * This file is part of Grapes pacakage
 *
 * (c) Abhishek B <abhishek.b4696@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Coswat\Grapes;

use Coswat\Grapes\BaseController;

class Grape extends BaseController
{
    /**
     * @var int The time value in Unix timestamp format.
     */
    public static $time;

    /**
     * Sets the time value.
     *
     * @param int $time The time value in Unix timestamp format.
     * @return self
     */
    public static function time(int $time): self
    {
        self::$time = $time;
        return new static();
    }

    /**
     * Converts the time to a formatted string representation (H:i:s).
     *
     * @return int|float|string The formatted time string.
     */
    public static function toTime(): int|float|string
    {
        $time = date("H:i:s", self::$time);
        return $time;
    }

    /**
     * Converts the time to a formatted string representation (Y-m-d H:i:s).
     *
     * @return int|float|string The formatted time string.
     */
    public static function toRaw(): int|float|string
    {
        $raw = date("Y-m-d H:i:s", self::$time);
        return $raw;
    }

    /**
     * Converts the time to the year value (Y).
     *
     * @return int The year value.
     */
    public static function toYear(): int
    {
        $year = date("Y", self::$time);
        return (int) $year;
    }

    /**
     * Converts the time to the month value (F).
     *
     * @return string The month value.
     */
    public static function toMonth(): string
    {
        $month = date("F", self::$time);
        return $month;
    }

    /**
     * Converts the time to the day value (l).
     *
     * @return string The day value.
     */
    public static function toDay(): string
    {
        $day = date("l", self::$time);
        return $day;
    }

    /**
     * Calculates and returns a string representation of the time ago relative to the current time.
     *
     * @return string The time ago string.
     */
    public static function timeAgo(): string
    {
        return self::findTimeAgo((string) self::$time);
    }

    /**
     * Retrieves the date string for the next day.
     *
     * @param bool $unix Flag to indicate whether to return the result as a Unix timestamp.
     * @return string|int|float The next day's date string or Unix timestamp, depending on the $unix flag.
     */
    public static function nextDay(bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+1 day"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }

    /**
     * Retrieves the date string for the next week.
     *
     * @param bool $unix Flag to indicate whether to return the result as a Unix timestamp.
     * @return string|int|float The next week's date string or Unix timestamp, depending on the $unix flag.
     */
    public static function nextWeek(bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+1 week"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }

    /**
     * Retrieves the date string for the next month.
     *
     * @param bool $unix Flag to indicate whether to return the result as a Unix timestamp.
     * @return string|int|float The next month's date string or Unix timestamp, depending on the $unix flag.
     */
    public static function nextMonth(bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+1 month"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }

    /**
     * Retrieves the date string for the specified number of days ahead.
     *
     * @param int $day The number of days to add.
     * @param bool $unix Flag to indicate whether to return the result as a Unix timestamp.
     * @return string|int|float The resulting date string or Unix timestamp, depending on the $unix flag.
     */
    public static function addDays(int $day, bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+{$day} day"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }

    /**
     * Retrieves the date string for the specified number of weeks ahead.
     *
     * @param int $week The number of weeks to add.
     * @param bool $unix Flag to indicate whether to return the result as a Unix timestamp.
     * @return string|int|float The resulting date string or Unix timestamp, depending on the $unix flag.
     */
    public static function addWeeks(int $week, bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+{$week} week"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }

    /**
     * Retrieves the date string for the specified number of months ahead.
     *
     * @param int $month The number of months to add.
     * @param bool $unix Flag to indicate whether to return the result as a Unix timestamp.
     * @return string|int|float The resulting date string or Unix timestamp, depending on the $unix flag.
     */
    public static function addMonths(int $month, bool $unix = false): string|int|float
    {
        $date = date("Y-m-d H:i:s", strtotime("+{$month} month"));
        if ($unix) {
            return strtotime($date);
        }
        return $date;
    }

    /**
     * Retrieves the timezone information for the given IP address.
     *
     * @param string $ip The IP address.
     * @return string The timezone information.
     */
    public static function getTimezone(string $ip): string
    {
        return self::timezoneInfo($ip);
    }

    /**
     * Calculates and returns the execution time difference between two timestamps in milliseconds.
     *
     * @param int|float $start_time The start timestamp.
     * @param int|float $end_time The end timestamp.
     * @return string The execution time difference in milliseconds.
     */
    public static function getMs(int|float $start_time, int|float $end_time): string
    {
        $execution_time = $end_time - $start_time;
        $execution_time_ms = round($execution_time * 1000, 2);

        return "{$execution_time_ms} ms";
    }

    /**
     * Calculates and returns the time difference between two timestamps in a human-readable format.
     *
     * @param int $firstTime The first timestamp.
     * @param int $secondTime The second timestamp.
     * @return string The time difference in a human-readable format.
     */
    public static function timeDiff(int $firstTime, int $secondTime): string
    {
        return self::getTimeDifference($firstTime, $secondTime);
    }

}
