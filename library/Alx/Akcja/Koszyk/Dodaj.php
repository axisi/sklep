<?php

class AlxAkcjaKoszykDodaj extends AlxAkcja{
	public function wykonaj(){
		$towarId = (int)$_GET['towar_id'];
		
		$towar= AlxDb::getInstance()->pobierzJeden("
			select * from towary where towar_id = {$towarId}
		");
		if($towar){
			if(isset($_SESSION['koszyk'][$towarId])){
				$_SESSION['koszyk'][$towarId]++;
			}else
				$_SESSION['koszyk'][$towarId]=1;
		}
		header('Location: index.php');
		exit;
	}
}