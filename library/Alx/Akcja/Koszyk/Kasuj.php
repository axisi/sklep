<?php

class AlxAkcjaKoszykKasuj extends AlxAkcja{
	public function wykonaj(){
		$_SESSION['koszyk']=array();
		header('Location:index.php');
		exit;
	}
}