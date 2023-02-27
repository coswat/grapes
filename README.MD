## PHP Grapes
php grapes is a powerful and light weight package to play with time and date , easy to use

## usage
```php
use Coswat\Grapes\Grape;

$time = 169268267; //unix timestamp

//returns 05:38:22
Grape::time($time)->toTime();

//returns 2023-02-27 05:39:09
Grape::time($time)->toRaw();

//returns 2023
Grape::time($time)->toYear();

//returns February
Grape::time($time)->toMonth();

//returns Sunday
Grape::time($time)->toDay();

//returns 5 minutes ago 
Grape::time($time)->timeAgo();

//returns nextday timestamp or unix
Grape::time($time)->nextDay();

//returns nextweek timestamp and unix
Grape::time($time)->nextWeek();

//returns nextmonth timestamp and unix
Grape::time($time)->nextMonth(); 

//returns timestamp of custom dates, for adding day
Grape::time($time)->addDays(3,true);

//returns timestamp of custom dates, for adding weeks
Grape::time($time)->addWeeks(1);

//returns timestamp of custom dates, for adding months
Grape::time($time)->addMonths(3);
```

## Additional feature

```php
$ip = '8.8.8.8'; //ip address 

Grape::getTimezone($ip); // returns Asia/Kolkata

$start_time = microtime(true);
 // code to run 
$end_time = microtime(true);

Grape::getMs($start_time,$end_time); //returns 0.42 ms
```
