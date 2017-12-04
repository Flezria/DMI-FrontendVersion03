<?php

$uri = "http://dmiprivateservices.azurewebsites.net/dmiservice.svc/temperatures/live";

$jsondata = file_get_contents($uri);

$livetemp = json_decode($jsondata, true);

echo $livetemp . " °C";

?>