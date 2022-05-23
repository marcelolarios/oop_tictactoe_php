<?php
/*************************************************** 
  Project
  - tic tac toe oop
  - jogo da velha poo

  Written by Marcelo Larios 2022MAR
  
  AGLP-3.0 license, all text above must be included in any redistribution
****************************************************/
spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});

$pos = 0;
$pro = '';

$sto = new Storage;
$tb = new Tabuleiro;

if(isset($_POST['pos'])){

	$d = unserialize(base64_decode($_POST['sto']));		//***
	$sto->u($d);
	$pos = $_POST['pos'];
	$sto->setPos($pos);
} else {

	$sto->zera();	//alterna quem começa
}

$tb->rodada($sto);
echo "*** Jogo da velha ***<br /><br />";
$tb->mostra($sto); //aviso proximo a jogar
$string_data = base64_encode(serialize($sto));			//***
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Jogo da Velha</title>
        <style>
			*, input {
			font-family:Courier;
			font-size:16px;
			}
			 input[type=text] {
			width:20px; 
			}
			*:focus {
			outline: none;
			}
        </style>
    </head>
    <body>
    <form action='' method='POST'>
    <input type='hidden' name='sto' value='<?php echo $string_data; ?>'> <!--tinha faltado o echo -->
    digite o nr: <input type='text' maxlength="1" name='pos' value='<?php echo $pro; ?>' autofocus>
    <input type='submit' name='submit' value='Envia'>
    </form>
    </body>
</html>