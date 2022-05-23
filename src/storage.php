<?php
class Storage {

	private  $jogo = 0; // var de instãncia
	private  $vez = true;
	private  $resultado = 0;
	private  $posic;
	
	function __construct() {	//construtor
		$this->jogo = array_fill(0, 10, ' '); 
		$this->vez = mt_rand(0, 1);
	}
	function u($m) {
		//echo '<br />';
		//var_dump($m);
        $this->jogo = $m->jogo;
        $this->vez = $m->vez;
        $this->resultado = $m->resultado;
        $this->posic = $m->posic;
    }
	function zera(){
		$this->jogo = array_fill(0, 10, ' '); 
		$this->resultado = 0; 
		$this->vez = mt_rand(0, 1);
	}
    function getJogo() {
        return $this->jogo;
    }
	function setJogo($casa, $tipo) {
		$this->jogo[$casa] = $tipo;
    }
	function setVez() {
		$this->vez = !$this->vez;
    }
    function getVez() {
        return $this->vez;
    }
    function setResultado($resultado) {
        $this->resultado = $resultado;
    }
    function getResultado() {
        return $this->resultado;
    }
    function setPos($posic) {
        $this->posic = $posic;
    }
    function getPos() {
        return $this->posic;
    }
}
?>
