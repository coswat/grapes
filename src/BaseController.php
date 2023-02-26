<?php

namespace Coswat\Grapes;

class BaseController
{
    public static function findTimeAgo(string $timestamp): string
    {
        $time_diff = time() - $timestamp;

        if ($time_diff < 60) {
            return $time_diff . " seconds ago";
        } elseif ($time_diff < 3600) {
            $mins = floor($time_diff / 60);
            return $mins . " minutes ago";
        } elseif ($time_diff < 86400) {
            $hours = floor($time_diff / 3600);
            return $hours . " hours ago";
        } elseif ($time_diff < 604800) {
            $days = floor($time_diff / 86400);
            return $days . " days ago";
        } elseif ($time_diff < 2592000) {
            $weeks = floor($time_diff / 604800);
            return $weeks . " weeks ago";
        } elseif ($time_diff < 31536000) {
            $months = floor($time_diff / 2592000);
            return $months . " months ago";
        } else {
            $year = floor($time_diff / 31536000);
            return $year . " years ago";
        }
    }
}
