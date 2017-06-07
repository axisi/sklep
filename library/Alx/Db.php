<?php
class AlxDb{
	static private $instance;
	private function __construct(){
		pg_connect("dbname=gmacala host=localhost user=gmacala password=uo1Huisa");
	}
	static public function getInstance(){
		if (empty(self::$instance)){
			self::$instance = new AlxDB();
		}
		return self::$instance;
	} 
	public function pobierz($sql){
		$r = pg_query($sql);
		$wynik = pg_fetch_all($r);
		if(empty($wynik)){
			$wynik = array();
		}
		return $wynik;
	}
	public function pobierzJeden($sql){
		$wyniki = $this->pobierz($sql);
		
		if(empty($wyniki)){
			return null;
		}else{
			return $wyniki[0];
		}
	}
	public function query($sql){
		pg_query($sql);
	}
}
