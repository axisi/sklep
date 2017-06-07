<?php

abstract class AlxAkcja{
	
	protected $twig;
	
	abstract public function wykonaj();
	
	public function __construct($twig){
		
		$this->twig = $twig; 
	}
}