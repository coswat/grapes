<?php

namespace Coswat\Grapes;

class BaseController
{
    public static function findTimeAgo(string $timestamp): string
    {
        $time_diff = time() - $timestamp;

        switch ($time_diff) {
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
    public static function timezoneInfo(string $ip)
    {
        $url = "http://ip-api.com/json/{$ip}";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($data);
        return $data->timezone;
    }
    public static function getTimeDifference(
        int $firstTime,
        int $secondTime
    ): string {
        $timeDiff = $firstTime - $secondTime;

        if ($timeDiff < 60) {
            return "{$timeDiff} seconds";
        } elseif ($timeDiff >= 60 && $timeDiff < 3599) {
            $minutes = floor($timeDiff / 60);
            return "{$minutes} minute";
        } elseif ($timeDiff >= 3600 && $timeDiff < 86399) {
            $hours = $timeDiff / 3600;
            $getAccurate = explode(".", $hours);
            $getAfter = substr($getAccurate[1], 0, 2);
            $hours = "{$getAccurate[0]}.{$getAfter}";
            return "{$hours} hour";
        } elseif ($timeDiff >= 86400) {
            $days = $timeDiff / 86400;
            $getAccurate = explode(".", $days);
            $getAfter = substr($getAccurate[1], 0, 2);
            $days = "{$getAccurate[0]}.{$getAfter}";
            return "{$days} day";
        }
    }
}
