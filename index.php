<?php
include "bootstrap.php";

if(isset($_REQUEST ['akcja'])){
	$nazwaAkcji= $_REQUEST ['akcja'];
}else{
	$nazwaAkcji= 'kategoria-index';
}
$nazwaAkcji = str_replace('-',' ',$nazwaAkcji);
$nazwaAkcji = ucwords($nazwaAkcji);
$nazwaAkcji = str_replace(' ','',$nazwaAkcji);
$nazwaAkcji = "AlxAkcja{$nazwaAkcji}";



$akcja = new $nazwaAkcji($twig);


if ($akcja instanceof AlxAkcja){
	$akcja->wykonaj();
}




