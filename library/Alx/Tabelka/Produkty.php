<?php

class AlxTabelkaProdukty extends AlxTabelka{
	public function poczatekTabeli(){
		return "<table class = 'table table-striped'>";
	}
	public function rysujNaglowek($wiersze){
		return '';
	}
	public function rysujWiersz($wiersz){
		$out="<tr>";
		$out .="<td>{$wiersz['nazwa']}</td>";
		$out .="<td>". number_format($wiersz['cena'],2)."</td>";
		
		$out .="
			<td>
			<a href='index.php?akcja=koszyk-dodaj&towar_id={$wiersz['towar_id']}'>Dodaj do koszyka</a>
			</td>"
		;
		$out .="</tr>";
		return $out;
	}
}