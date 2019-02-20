<?php

$is_auth = rand(0, 1);

$user_name = 'Дмитрий Золотов'; // укажите здесь ваше имя

date_default_timezone_set("Europe/Helsinki");
$ts_midnight = strtotime("tomorrow");
$sec_to_midnight = $ts_midnight - time();
$hm_tomidnight = date('H:i', $sec_to_midnight);