<?php

declare(strict_types=1);

namespace Coswat\Grapes\Test;

use PHPUnit\Framework\TestCase;
use Coswat\Grapes\Grape;

class GrapeTest extends TestCase
{
    public function test_toYear_function(): void
    {
        $year = Grape::time(1687350065)->toYear();
        $expected = 2023;
        $this->assertEquals($expected, $year);
    }
    public function test_toMonth_function(): void
    {
        $month = Grape::time(1687350065)->toMonth();
        $expected = "June";
        $this->assertEquals($expected, $month);
    }
    public function test_toDay_function(): void
    {
        $day = Grape::time(1687350065)->toDay();
        $expected = "Wednesday";
        $this->assertEquals($expected, $day);
    }
    public function test_getTimezone_function(): void
    {
        $ip = "8.8.8.8";
        $timeZone = Grape::getTimezone($ip);
        $expected = "America/New_York";
        $this->assertEquals($expected, $timeZone);
    }
    public function test_toTime_function(): void
    {
        $time = Grape::time(1687350065)->toTime();
        $expected = '12:21:05';
        $this->assertEquals($expected, $time);
    }
    public function test_toRaw_function(): void
    {
        $time = Grape::time(1687350065)->toRaw();
        $expected = '2023-06-21 12:21:05';
        $this->assertEquals($expected, $time);
    }
    public function test_nextDay_function(): void
    {
        $time = Grape::time(1687350065)->nextDay();
        $expected = '2023-06-22 12:21:05';
        $this->assertEquals($expected, $time);
        // check with unix timestamp also
        $time = Grape::time(1687350065)->nextDay(true);
        $expected = '1687436465';
        $this->assertEquals($expected, $time);
    }
    public function test_nextWeek_function(): void
    {
        $time = Grape::time(1687350065)->nextWeek();
        $expected = '2023-06-28 12:21:05';
        $this->assertEquals($expected, $time);
        // check with unix timestamp also
        $time = Grape::time(1687350065)->nextWeek(true);
        $expected = '1687954865';
        $this->assertEquals($expected, $time);
    }
    public function test_nextMonth_function(): void
    {
        $time = Grape::time(1687350065)->nextMonth();
        $expected = '2023-07-21 12:21:05';
        $this->assertEquals($expected, $time);
        // check with unix timestamp also
        $time = Grape::time(1687350065)->nextMonth(true);
        $expected = '1689942065';
        $this->assertEquals($expected, $time);
    }
    public function test_addDays_function(): void
    {
        $time = Grape::time(1687350065)->addDays(17);
        $expected = '2023-07-08 12:21:05';
        $this->assertEquals($expected, $time);
        // check with unix timestamp also
        $time = Grape::time(1687350065)->addDays(17, true);
        $expected = '1688818865';
        $this->assertEquals($expected, $time);
    }
    public function test_addWeeks_function(): void
    {
        $time = Grape::time(1687350065)->addWeeks(7);
        $expected = '2023-08-09 12:21:05';
        $this->assertEquals($expected, $time);
        // check with unix timestamp also
        $time = Grape::time(1687350065)->addWeeks(7, true);
        $expected = '1691583665';
        $this->assertEquals($expected, $time);
    }
    public function test_addMonths_function(): void
    {
        $time = Grape::time(1687350065)->addMonths(8);
        $expected = '2024-02-21 12:21:05';
        $this->assertEquals($expected, $time);
        // check with unix timestamp also
        $time = Grape::time(1687350065)->addMonths(8, true);
        $expected = '1708518065';
        $this->assertEquals($expected, $time);
    }
}
