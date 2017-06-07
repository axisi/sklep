<?php

class AlxAkcjaZamowienieRealizuj extends AlxAkcja{
	public function wykonaj(){
		$idkiTowarow=array_keys($_SESSION['koszyk']);
		//var_dump($idkiTowarow);
		
		// select * from towary  where towar_id in (1,3,7)
		$idkiTowarow = implode(',',$idkiTowarow);
		$produkty = AlxDb::getInstance()->pobierz("
			select * from towary where towar_id in ({$idkiTowarow})
		");
		
		$wartoscZamowienia =0.;
		foreach($produkty as &$produkt){
			$produkt['liczba_sztuk']= $_SESSION['koszyk'][$produkt['towar_id']];
			$produkt['wartosc']=$produkt['cena'] * $produkt['liczba_sztuk'];
			$wartoscZamowienia+=$produkt['wartosc'];
		}
		//echo "<pre>";
		//var_dump($produkty);
		echo $this->twig->render(
		'zamowienie/realizuj.html.twig', array(
			'produkty' =>$produkty,
			'wartosc_zamowienia'=>$wartoscZamowienia,
		));
		
	}
}