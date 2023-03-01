## Docs for base version

toTime() function

```php
 Grape::time(time())->toTime();
 /*
 return current time like 06:36:09
 */
```
toRaw() function

```php
Grape::time(time())->toRaw();
/*
convert unix timestamp to timestamp
*/
```

toYear() - toMonth() - toDay() function

```php
Grape::time(time())->toYear();
/*
return the year, example : 2023
toMonth() will return the name of the Month , example : March
toDay will return the name of the Day, example : Sunday
*/
```
timeAgo() function

```php

Grape::time(173973737)->timeAgo();
/*
this will return time ago dynamically like
1 mins ago, 2 hour ago, 1 day ago, 1 week ago 
... like that!
*/
```
nextDay() - nextWeek() - nextMonth() function

```php

Grape::time(time())->nextDay();

/*
this will return next day of the timestamp, timestamp + 24 hour's, for nextWeek function timestamp + 7 days, and nextMonth function timestamp + 1 month( dynamically )
*/

```
addDays() - addWeeks() - addMonths() function

```php

Grape::time(time())->addDays(1);

/*
this wi returns a timestamp of custom added days / weeks /months as you provided

theres a option param available for these 3 function addDay(1,true) if you pass true it will give you unix timestamp else normal timestamp

*/

```
getTimezone() function 

```php
$ip = '8.8.8.8';
Grape::getTimezone($ip);

/*
returns the timezone of ip example, America/New_York

*/

```

getMs() function

```php

$start_time = microtime(true);

sleep(0.2);

$end_time = microtime(true);

Grape::getMs($start_time,$end_time);

/*

will return the millisecond , example 622 ms

*/

```