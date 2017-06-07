<?php

class AlxAkcjaKategoriaProdukty extends AlxAkcja{
	
	public function wykonaj(){
		$kategoriaId=(int) $_GET['kategoria_id'];
		$kategoria = AlxDb::getInstance()->pobierzJeden("select * from kategorie where kategoria_id={$kategoriaId}");
		if(empty($kategoria)){
			header('Location: index.php');
			exit();
		}
		$produkty = new AlxTabelkaProdukty();
		$produkty->setSql("select * from towary where kategoria_id={$kategoriaId}");
		echo $this->twig->render('kategoria/produkty.html.twig',
		array(
			'kategoria' =>$kategoria,
			'produkty' =>$produkty,
		)
		);
	}
}