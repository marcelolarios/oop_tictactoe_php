<?php
class Humano extends Jogador {
	
    function joga($p){
		
		$posics = '0123456789';
		if(!$p == '') {
		
			if(strrpos($posics, $p)) {
				
				return (int) $p;
			}
		}
		return 0;
    }
}
?>
