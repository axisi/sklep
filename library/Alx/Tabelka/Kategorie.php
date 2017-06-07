<?php

class AlxTabelkaKategorie extends AlxTabelka{
	
	protected $sql = 'select * from kategorie order by kategoria';
	
	protected function poczatekTabeli(){
		return "<table class='table table-striped'>";
	}
	protected function rysujNaglowek($wiersze){
		return"";
	}
	protected function rysujWiersz($wiersze){
		$out="<tr>";
		$out .='<td>';
		
		$out .="<a href='index.php?akcja=kategoria-produkty&kategoria_id={$wiersze['kategoria_id']}'>{$wiersze['kategoria']}</a>";
		
		$out .='</td>';
		$out .="</tr>";
		return $out;
	}
}