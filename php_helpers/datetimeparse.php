<?php

function parseUnixTimestamp($date)
{
    preg_match('/\/Date\((-?\d+)([+-]\d{4})\)/', $date, $matches);
    $seconds = $matches[1] / 1000;
    $dateTime = date('d-m-Y', $seconds);

    return $dateTime;
}

?>