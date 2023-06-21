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

class BaseController
{
    /**
     * Calculates and returns a human-readable representation of the time ago from a given timestamp.
     *
     * @param string $timestamp The timestamp to calculate the time ago from.
     * @return string The time ago representation.
     */
    public static function findTimeAgo(string $timestamp): string
    {
        $time_diff = time() - $timestamp;

        switch (true) {
            case $time_diff < 60:
                return "{$time_diff} seconds ago";
                break;
            case $time_diff < 3600:
                $mins = floor($time_diff / 60);
                return "{$mins} mins ago";
                break;
            case $time_diff < 86400:
                $hours = floor($time_diff / 3600);
                return "{$hours} hours ago";
                break;
            case $time_diff < 604800:
                $days = floor($time_diff / 86400);
                return "{$days} days ago";
                break;
            case $time_diff < 2592000:
                $weeks = floor($time_diff / 604800);
                return "{$weeks} weeks ago";
                break;
            case $time_diff < 31536000:
                $months = floor($time_diff / 2592000);
                return "{$months} months ago";
                break;
            default:
                $year = floor($time_diff / 31536000);
                return "{$year} years ago";
                break;
        }
    }
    /**
     * Retrieves the timezone information for the given IP address.
     *
     * @param string $ip The IP address.
     * @return string|null The timezone information or null if not found.
     */
    public static function timezoneInfo(string $ip): ?string
    {
        $url = "http://ip-api.com/json/{$ip}";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($data);
        if(!$data->timezone) {
            return null;
        }
        return $data->timezone;
    }
    /**
     * Calculates and returns the time difference between two timestamps in a human-readable format.
     *
     * @param int $firstTime The first timestamp.
     * @param int $secondTime The second timestamp.
     * @return string The time difference in a human-readable format.
     */
    public static function getTimeDifference(
        int $firstTime,
        int $secondTime
    ): string {
        $timeDiff = $firstTime - $secondTime;

        switch (true) {
            case $timeDiff < 60:
                return "{$timeDiff} seconds";
                break;
            case $timeDiff >= 60 && $timeDiff < 3600:
                $minutes = floor($timeDiff / 60);
                return "{$minutes} minute";
                break;
            case $timeDiff >= 3600 && $timeDiff < 86400:
                $hours = $timeDiff / 3600;
                $getAccurate = explode('.', $hours);
                $getAfter = substr($getAccurate[1], 0, 2);
                $hours = "{$getAccurate[0]}.{$getAfter}";
                return "{$hours} hour";
                break;
            default:
                $days = $timeDiff / 86400;
                $getAccurate = explode('.', $days);
                $getAfter = substr($getAccurate[1], 0, 2);
                $days = "{$getAccurate[0]}.{$getAfter}";
                return "{$days} day";
                break;
        }
    }
}
