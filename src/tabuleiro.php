<?php
class Tabuleiro {

	private $quem = '';
    
    function rodada($sto){ // acum score futuro
    	
		while(true) {
											
			if(!$this->partida($sto)) {
			
				$pro = $this->aviso(3); //interrup
				break;
			} 
			$pro = $this->aviso(4); //Nova partida
			break;
		}
    }
    
	 function partida($sto) { //1 completa
        
        if($sto->getResultado() > 0) $sto->zera();
		while (true){ 
			
			$jv = ($sto->getVez())? new Computador('o'):new Humano('x');//●
			$this->quem = $jv->getTipo(); 				
			if(!$this->lance($sto, $jv)) return false;
			if($this->compara($sto,$jv->getTipo())) break;
			$sto->setVez();
		}
		return true;
	}
	
	 function lance($sto, $jv) {
		$v = $sto->getJogo();
		while(true) {
			
			$casa = $jv->joga($sto->getPos());
			if($casa == 0) return false;
			if($v[$casa] == ' ') {

				$sto->setJogo($casa, $jv->getTipo());
				break;
			} else {
				if(get_class($jv)=='Humano') return false;
			}
		}
		return true;
    }

	function compara($sto, $t) {	// Método comum
		
		$v = $sto->getJogo();
    
		$possibs = array(
			array(1, 2, 3),
			array(4, 5, 6),
			array(7, 8, 9),
			array(7, 4, 1),
			array(8, 5, 2),
			array(9, 6, 3),
			array(1, 5, 9),
			array(7, 5, 3)
		);

		for ($i=0; $i<8; $i++) {
			$p = $possibs[$i];
			if($v[$p[0]] == $v[$p[1]] &&
			   $v[$p[1]] == $v[$p[2]] && 
			   $v[$p[2]] != ' '){	
			   
				$sto->setResultado(1);
				return true;
			}
		}
		for ($i=1; $i<10; $i++) {  //começa do 1 senão é loop infinito

			if($v[$i] == ' ')  return false;
		}
		$sto->setResultado(2);
		return true; // empatou
	}	
    
     function mostra($sto) {	
    	$v = $sto->getJogo();
    	
		echo '7|8|9'."&nbsp;&nbsp;&nbsp;&nbsp;".'|' . $v[7] . '|' . $v[8] . '|' . $v[9] . '|   ' .  $this->aviso($sto->getResultado()) . '<br />';
		echo '4|5|6'."&nbsp;&nbsp;&nbsp;&nbsp;".'|' . $v[4] . '|' . $v[5] . '|' . $v[6] . '|<br />';
		echo '1|2|3'."&nbsp;&nbsp;&nbsp;&nbsp;".'|' . $v[1] . '|' . $v[2] . '|' . $v[3] . '|<br /><br />';
    }

	 function aviso($i){
		
		switch($i) {
			case 1: return "jogador \"" . $this->quem . "\" venceu!";
			case 2: return "Empatou!";
			case 3: return "\n*** Jogo Interrompido ***\n";
			case 4: return "\n\n*** Nova partida ***";
			default:  return "jogador \"" . $this->quem . "\", sua vez";
		}
	}
	
}
?>
