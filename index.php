<?php session_start();
include_once ('php_helpers/utils.php');
include_once ('php_helpers/thirdpartyapi.php');

if(isset($_SESSION['SpecificData'])) {
    $specifictemperatures = $_SESSION['SpecificData'];
    $tempavg = calcAverageTemp($specifictemperatures);
}

require_once 'vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader,array('auto_reload'=> true, 'debug'=> true));

$twig->addExtension(new Twig_Extension_Debug());

$template = $twig->loadTemplate('index.html.twig');

$parametersToTwig = array("specifictemperatures"=>$specifictemperatures, "average"=>$tempavg, "thirdpartytemp"=>$thirdpartytemp);

echo $template->render($parametersToTwig);

?>