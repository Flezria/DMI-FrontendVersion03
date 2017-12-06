<?php session_start();

if(isset($_SESSION['SpecificData'])) {
    $specifictemperatures = $_SESSION['SpecificData'];
}

// include('php_helpers/getlivedata.php');

require_once 'vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader,array('auto_reload'=> true, 'debug'=> true));

$twig->addExtension(new Twig_Extension_Debug());

$template = $twig->loadTemplate('index.html.twig');

//$parametersToTwig = array("liveData"=>$livetemp);
$parametersToTwig = array("specifictemperatures"=>$specifictemperatures);

echo $template->render($parametersToTwig);

?>