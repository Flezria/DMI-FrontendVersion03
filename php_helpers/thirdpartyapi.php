<?php

$uri = "http://api.openweathermap.org/data/2.5/weather?q=Roskilde,dk&appid=6824ec33fd4d57d820832ce36285ed44&units=metric";

$jsondata = file_get_contents($uri);

$convertToAssociativeArray = true;

$baseCall = json_decode($jsondata,$convertToAssociativeArray);

$temperatureFromThirdPartyApi = $baseCall['main'];

$thirdpartytemp = $temperatureFromThirdPartyApi['temp'];

?>