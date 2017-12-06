<?php

function parseUnixTimestamp($date) {
    preg_match('/\/Date\((-?\d+)([+-]\d{4})\)/', $date, $matches);
    $seconds = $matches[1] / 1000;
    $dateTime = date('d-m-Y', $seconds);

    return $dateTime;
}

function calcAverageTemp($temperatures) {
    $count = 0;
    $sum = 0;

    foreach ($temperatures as $temp) {
        $sum += $temp['Temperature'];
        $count++;
    }

    return round($sum / $count, 1);
}

?>