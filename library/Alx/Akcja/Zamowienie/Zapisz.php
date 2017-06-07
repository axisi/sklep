<?php


class AlxAkcjaZamowienieZapisz extends AlxAkcja{
	public function wykonaj(){
		$email = pg_escape_string($_POST['email']);
		$adres = pg_escape_string($_POST['adres']);
		
		AlxDb::getInstance()->query('begin');
		AlxDb::getInstance()->query("
			insert into zamowienia (status_id,email,adres,data) 
			values 
			(1,'{$email}','{$adres}' , current_timestamp)
		");
		
		foreach($_SESSION['koszyk'] as $towarId => $liczbaSztuk){
			AlxDb::getInstance()->query("
				insert into pozycje (towar_id, zamowienie_id, sztuk)
				values
				({$towarId}, currval('zamowienia_zamowienie_id_seq'), {$liczbaSztuk})
			");
		}
		// rollback jesli chcemy anulowac 
		AlxDb::getInstance()->query('commit');
		$_SESSION['koszyk']= array();
		header("Location: index.php");
		exit;
	}
}