<?php

$uri = "http://dmiprivateservices.azurewebsites.net/dmiservice.svc/temperatures/live";

$jsondata = file_get_contents($uri);

$livetemp = json_decode($jsondata, true);

$var = "";
if($livetemp <= 20 && ($livetemp >= 0)){
    $var = "<img src='pictures/skyet.png' class='custom-image-size'>";
}
else if($livetemp < 0 ){
    $var = "<img src='pictures/isslag.png' class='custom-image-size'>";
}
else{
    $var = "<img src='pictures/solrig.png' class='custom-image-size'>";
}

echo $livetemp . " °C " . $var;

?>