<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Coswat\Grapes\Grape;
class GrapeTest extends TestCase
{
    public function test_toYear_function(): void
    {
        $year = Grape::time(time())->toYear();
        $expected = 2023;
        $this->assertEquals($year, $expected);
    }
    public function test_toMonth_function(): void
    {
        $month = Grape::time(time())->toMonth();
        $expected = "March";
        $this->assertEquals($month, $expected);
    }
    public function test_toDay_function(): void
    {
        $day = Grape::time(time())->toDay();
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
}
