<?php
abstract class Jogador {

	private $tipo = '';			// var de instãncia
	
	function __construct($tipo) {	//construtor
		$this->tipo = $tipo;
	}
    
    abstract protected function joga($p); // Força a classe que estende definir esse método
    
    function getTipo() {
        return $this->tipo;
    }
}
?>
