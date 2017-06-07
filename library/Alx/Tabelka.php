<?php

/**
 * Klasa do wyswietlania danych w formie tabelki.
 * http://bit.ly/alx-kphp-phpdoc
 *
 * @author Piotr Grabski-Gradzinski <p.gradzinski@alx.pl>
 */
class AlxTabelka {
	
	/**
	 * Zapytanie do bazy danych.
	 * 
	 * @var string 
	 */
	protected $sql;
	
	/**
	 * Zwraca zawartosc atrybutu sql
	 * @return string
	 */
	public function getSql(){
		return $this->sql;
	}
	
	/**
	 * Ustawia atrybut sql
	 * @param string $sql
	 */
	public function setSql($sql){
		$this->sql = $sql;
	}
	
	/**
	 * Rysuje kod html tabelki na podstawie sql.
	 * @return string
	 */
	public function rysuj(){
		$wiersze = $this->pobierzDane();
		
		$out = "";

		$out .= $this->poczatekTabeli();
		
		$out .= $this->rysujNaglowek($wiersze);
		
		$out .= $this->rysujCialo($wiersze);
		
		$out .= $this->koniecTabeli();
		
		return $out;
	}
	
	protected function rysujCialo($wiersze){
		$out = "<tbody>";
		foreach($wiersze as $wiersz){
			$out .= $this->rysujWiersz($wiersz);
		}
		$out .= "</tbody>";
		
		return $out;
	}
	
	protected function rysujWiersz($wiersz){
		$out = "<tr>";
			foreach($wiersz as $komorka){
				$out .= "<td>";
				$out .= $komorka;
				$out .= "</td>";
			}
			$out .= "</tr>";
			return $out;
	}
	
	protected function rysujNaglowek($wiersze){
		$out = "<thead>";
		$out .= "<tr>";
		//foreach($wiersze[0] as $kolumna => $wartosc){
				
		$kolumny = array_keys($wiersze[0]);
		foreach ($kolumny as $kolumna){
			$out .= "<th>";
			$out .= $kolumna;
			$out .= "</th>";
		}
		$out .= "</tr>";
		$out .= "</thead>";
		
		return $out;
	}
	
	protected function koniecTabeli(){
		return "</table>";
	}
	
	protected function poczatekTabeli(){
		return "<table>";
	}
	
	protected function pobierzDane(){
		$wiersze = AlxDb::getInstance()
						->pobierz( $this->getSql() );
		return $wiersze;				
	}
	
	/**
	 * @return string
	 */
	public function __toString(){
		return $this->rysuj();
	}
	
}



