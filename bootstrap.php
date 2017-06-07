<?php
include "vendor/autoload.php";
// $klasa= AlxTabelkaKategorie
// library/Alx/Tabelka/Kategorie.php
function moj_autoload($klasa){
	$sciezka = preg_replace('/[A-Z]/','/$0',$klasa);
	$finalnaSciezka= "library{$sciezka}.php";
	include($finalnaSciezka);
}

spl_autoload_register('moj_autoload');

session_start();
if(!isset($_SESSION['koszyk'])){
	$_SESSION['koszyk']= array();
}
$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader,array(
	'debug'=>true,
));
$twig->addExtension(new Twig_Extension_Debug() );
$twig->addGlobal('session', $_SESSION);












