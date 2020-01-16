<?php

	session_start();

	include('functions_1.php');
	include('classes.php');

	$l_palt = $_POST["l_palt"];
	$c_palt = $_POST["c_palt"];
	$n_obj = $_POST["n_obj"];
	$lag = $_POST["lag_obj"];
	$comp = $_POST["comp_obj"];

	//Os objetos e palets estão quadrados por enquanto
	$objetos = array(); //array de tamanho de objetos

	for( $i = 1; $i <= $n_obj ; $i++) {

		$x = new Item( $lag, $comp ); //(largura, comprimento)
		$objetos[] = $x;

	}

	$espaco_rest = array();

	$c_niv = array(); // Array de comprimetos de nives
	
	$n = sizeof( $objetos );  //Numero de objetos
		
	$ff = firstFit( $espaco_rest ,$objetos, $n, $c_niv, $l_palt, $c_palt);

	$n_niv = sizeof($c_niv); //Número de níveis

	$_SESSION['res'] = $ff;        //Resposta do FirstFit
	$_SESSION['l_palt'] = $l_palt; //Largura do Pallet
	$_SESSION['c_palt'] = $c_palt; //Comprimento do Pallet
	$_SESSION['n_obj'] = $n_obj;   //Quantidade de objetos
	$_SESSION['lag'] = $lag;       //Largura do Objeto
	$_SESSION['comp'] = $comp;     //Comprimento do objeto
	$_SESSION['lag_rest'] = 0;     //Largura restante no pallet
	$_SESSION['comp_rest'] = 0;    //Comprimento restante no pallet
	$_SESSION['obj_L2'] = 0;
	$_SESSION['obj_C2'] = 0;

	// Apartir daqui estou criando novas medidas p/ PreviousCanvas que será o canvas de espaço restante.

	$obj_Lnivel =intdiv($_SESSION['l_palt'], $_SESSION['lag']); //Número de objetos por nível.

	$obj_Cnivel =intdiv($_SESSION['c_palt'], $_SESSION['comp']); //Número de objetos por nível.

	$lag_rest = $_SESSION['l_palt'] - ( $obj_Lnivel * $_SESSION['lag'] ); // Largura restante no pallet.

	//echo $lag_rest;

	$comp_rest = $_SESSION['c_palt'] - ( $obj_Cnivel * $_SESSION['comp'] ); // Largura restante no pallet.

	//Verificando se cabe alguma caixa girada na largura. (Ex: Se $lag_rest = 30, $lag = 50 e $comp = 30, o objeto cabe, mas girado)
	if( $lag_rest >= $comp ){ // Se a largura restante for maior ou igual ao comprimento do objeto...7

		for( $i = 0; $i < sizeof($objetos) ; $i++ ){

			$objetos[$i]->giraObjeto();

			$_SESSION['obj_L2'] = $objetos[$i]->largura;
			$_SESSION['obj_C2'] = $objetos[$i]->comprimento;

		}



		$_SESSION['spaceL_left'] = True;// Então há espaço para alguma caixa.
		$_SESSION['lag_rest'] = $lag_rest; // Aramzeno na $_SESSION.
		$_SESSION['comp_rest'] = $_SESSION['c_palt'];// Comprimento é o comprimento do pallet.

		$qtd_obj;

		$qtd_obj = intdiv( $_SESSION['comp_rest'] , $_SESSION['lag'] );

	}
	elseif( $comp_rest >= $lag ){ // Se o comprimento restante for maior ou igual à largura do objeto...

		for( $i = 0; $i < sizeof($objetos) ; $i++ ){

			$objetos[$i]->giraObjeto();

			$_SESSION['obj_L2'] = $objetos[$i]->largura;
			$_SESSION['obj_C2'] = $objetos[$i]->comprimento;

		}

		$_SESSION['spaceC_left'] = True;// Então há espaço para alguma caixa.
		$_SESSION['comp_rest'] = $comp_rest; // Aramzeno na $_SESSION.
		$_SESSION['lag_rest'] = $_SESSION['l_palt'];// Largura é a largura do pallet.

		$qtd_obj = intdiv( $_SESSION['lag_rest'] , $_SESSION['comp'] );

	}
	else{// Se nem uma for satisfeita...
		$_SESSION['space_left'] = False;// Então não há espaço para mais caixas no pallet.
	}

	$_SESSION['qtd_obj'];
	$_SESSION['qtd_obj'] = $qtd_obj;

	header('Location: canvas.php');//Cria a Canvas

?>