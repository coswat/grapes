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
        $this->assertEquals($year, $expected);
    }
    public function test_toMonth_function(): void
    {
        $month = Grape::time(1687350065)->toMonth();
        $expected = "June";
        $this->assertEquals($month, $expected);
    }
    public function test_toDay_function(): void
    {
        $day = Grape::time(1687350065)->toDay();
        $expected = "Wednesday";
        $this->assertEquals($day, $expected);
    }
    public function test_getTimezone_function(): void
    {
        $ip = "8.8.8.8";
        $timeZone = Grape::getTimezone($ip);
        $expected = "America/New_York";
        $this->assertEquals($timeZone, $expected);
    }
    public function test_toTime_function(): void 
    {
      $time = Grape::time(1687350065)->toTime();
      $expected = '12:21:05';
      $this->assertEquals($time, $expected);
    }
    public function test_toRaw_function(): void 
    {
      $time = Grape::time(1687350065)->toRaw();
      $expected = '2023-06-21 12:21:05';
      $this->assertEquals($time, $expected);
    }

}
