<?php
class Computador extends Jogador {
	
    function joga($p){
					
			$p = mt_rand(1, 9);
			return $p;
    }
}
?>
