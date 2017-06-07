<?php

class AlxAkcjaKategoriaIndex extends AlxAkcja{
	
	public function wykonaj(){
		$kategorie = new AlxTabelkaKategorie();
		echo $this->twig->render('kategoria/index.html.twig', array(
			'kategorie' => $kategorie,
		));
	}
}

