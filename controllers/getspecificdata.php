<?php session_start();
include_once ('../php_helpers/datetimeparse.php');

$StartDate = $_GET['StartDate'];
$EndDate = $_GET['EndDate'];

$uri = "http://dmiprivateservices.azurewebsites.net/dmiservice.svc/temperatures/?datestart=" . $StartDate . "&dateend=" . $EndDate;

$jsondata = file_get_contents($uri);

$convertToAssociativeArray = true;

$temperatures = json_decode($jsondata,$convertToAssociativeArray);

if(!empty($temperatures)) {
    foreach ($temperatures as &$temp) {
        $temp['CaptureTime'] = parseUnixTimestamp($temp['CaptureTime']);
    }

    $_SESSION['SpecificData'] = $temperatures;
    header("Location: http://micfisolutions.dk/dmi/");
} else {
    unset($_SESSION['SpecificData']);
    header("Location: http://micfisolutions.dk/dmi/");
}

?>