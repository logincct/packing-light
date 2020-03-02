<?php

	session_start();

	include('FirstFit.php');
	include('classes.php');

	if ( isset( $_POST["calcula"] ) ) 
	{
		$_SESSION['alter'] = 1;
		$larguraPallet = $_POST["l_palt"];  //Largura do pallet
		$comprimentoPallet = $_POST["c_palt"]; //Compriemnto do pallet
		$numeroItens = $_POST["n_obj"]; //Número de objetos
		$larguraItem = $_POST["lag_obj"]; //Largura do objeto
		$comprimentoItem = $_POST["comp_obj"]; //Comprimento do objeto
		$espaco_rest = array(); // Array de espaços restantes em cada nível
		$comprimentoNivel = array(); // Array de comprimetos de nives
		
		//Os objetos e palets estão quadrados por enquanto
		$objetos = array();  //array de tamanho de objetos

		for( $i = 1; $i <= $numeroItens ; $i++) {

			$x = new Item( $larguraItem, $comprimentoItem ); //(largura, comprimento)
			$objetos[] = $x; // Array de Itens

		}

		// Primeira chamada da função -----------------------------------------------
			
		$primeiraChamada = firstFit( $espaco_rest ,$objetos, $numeroItens, $comprimentoNivel, $larguraPallet, $comprimentoPallet);

		// Gira o objeto ------------------------------------------------------------

		for( $i = 0; $i < sizeof($objetos) ; $i++ ){

			$objetos[$i]->giraObjeto();

		}

		// Segunda chamada da função --------------------------------------------------

		$segundaChamada = firstFit( $espaco_rest ,$objetos, $numeroItens, $comprimentoNivel, $larguraPallet, $comprimentoPallet );

		//----------------------------------------------------------------------------
		// Verifica a melhor

		if( $segundaChamada > $primeiraChamada ){

			$_SESSION['res'] = $segundaChamada;        //Resposta do FirstFit

	        $_SESSION['larguraItem'] = $objetos[0]->largura;
			$_SESSION['comprimentoItem'] = $objetos[0]->comprimento;
			$_SESSION['alter'] = 0;

		} else {  //Se não, retorna $primeiraChamada, mas gira os objetos de novo (para printar a canva certa)

			for( $i=0; $i < sizeof($objetos) ; $i++ ){

				$objetos[$i]->giraObjeto();

			}

	        $_SESSION['res'] = $primeiraChamada;

	        $_SESSION['larguraItem'] = $objetos[0]->largura;
			$_SESSION['comprimentoItem'] = $objetos[0]->comprimento;
			$_SESSION['alter'] = 1;  // Significa que a primeira chamada foi a melhor

		}

		// Atualizando $_SESSION e definindo novas variáveis-------------------

		$numeroNiveis = sizeof( $comprimentoNivel ); //Número de níveis

		$temp = 0;
		$quantidadeObjetos = 0;

		$_SESSION['larguraPallet'] = $larguraPallet; //Largura do Pallet
		$_SESSION['comprimentoPallet'] = $comprimentoPallet; //Comprimento do Pallet
		$_SESSION['numeroItens'] = $numeroItens;   //Quantidade de objetos
		$_SESSION['larguraRestantePallet'] = 0;     //Largura restante no pallet
		$_SESSION['comprimentoRestantePallet'] = 0;    //Comprimento restante no pallet
		
	    $_SESSION['larguraObjetoGirado'] = 0;
		$_SESSION['comprimentoObjetoGirado'] = 0;
		
	    $_SESSION['espaçoCaixaComprimento'] = 0;
		$_SESSION['espaçoCaixaLargura'] = 0;
		$_SESSION['espaçoRestante'] = 0;

		// ---------------------------------------------------------------------

		if( $_SESSION['alter'] == 0){
			$temp = $_SESSION['larguraItem'];
			$_SESSION['larguraItem'] =  $_SESSION['comprimentoItem']; ;  //xx é a largura do objeto
			$_SESSION['comprimentoItem'] =  $temp; ;  //yy é o comprimento do objeto
		}
		// Apartir daqui estou criando novas medidas p/ PreviousCanvas que será o canvas de espaço restante.

		$obj_Lnivel =intdiv($_SESSION['larguraPallet'], $_SESSION['larguraItem']); //Número de objetos por nível.

		$obj_Cnivel =intdiv($_SESSION['comprimentoPallet'], $_SESSION['comprimentoItem']); //Número de objetos por nível.
	   

	   	//echo $_SESSION['comp'];
		$larguraRestantePallet = $_SESSION['larguraPallet'] - ( $obj_Lnivel * $_SESSION['larguraItem'] ); // Largura restante no pallet.


		$comprimentoRestantePallet = $_SESSION['comprimentoPallet'] - ( $obj_Cnivel * $_SESSION['comprimentoItem'] ); // Largura restante no pallet.

		//Verificando se cabe alguma caixa girada na largura. (Ex: Se $larguraRestantePallet = 30, $larguraItem = 50 e $comprimentoItem = 30, o objeto cabe, mas girado)

		if( $larguraRestantePallet >= $comprimentoItem ){ // Se a largura restante for maior ou igual ao comprimento do objeto...

			for( $i = 0; $i < sizeof($objetos) ; $i++ ){

				$objetos[$i]->giraObjeto();

				$_SESSION['larguraObjetoGirado'] = $objetos[$i]->largura;
				$_SESSION['comprimentoObjetoGirado'] = $objetos[$i]->comprimento;

			}
	        
			$_SESSION['espaçoCaixaLargura'] = 1;// Então há espaço para alguma caixa.
			$_SESSION['espaçoRestante'] = 1;
			$_SESSION['larguraRestantePallet'] = $larguraRestantePallet; // Aramzeno na $_SESSION.
			$_SESSION['comprimentoRestantePallet'] = $_SESSION['comprimentoPallet'];// Comprimento é o comprimento do pallet.


			$quantidadeObjetos = intdiv( $_SESSION['comprimentoRestantePallet'] , $_SESSION['larguraItem'] );

		}
		elseif( $comprimentoRestantePallet >= $larguraItem ){ // Se o comprimento restante for maior ou igual à largura do objeto...

			for( $i = 0; $i < sizeof($objetos) ; $i++ ){

				$objetos[$i]->giraObjeto();

				$_SESSION['larguraObjetoGirado'] = $objetos[$i]->largura;
				$_SESSION['comprimentoObjetoGirado'] = $objetos[$i]->comprimento;

			}

			$_SESSION['espaçoCaixaComprimento'] = 1;  // Então há espaço para alguma caixa.
			$_SESSION['espaçoRestante'] = 1;
			$_SESSION['comprimentoRestantePallet'] = $comprimentoRestantePallet;  // Aramzeno na $_SESSION.
			$_SESSION['larguraRestantePallet'] = $_SESSION['larguraPallet'];  // Largura é a largura do pallet.

			$quantidadeObjetos = intdiv( $_SESSION['larguraRestantePallet'] , $_SESSION['comprimentoItem'] );

		}
		else{// Se nem uma for satisfeita...
			$_SESSION['espaçoRestante'] = 0;  // Então não há espaço para mais caixas no pallet.
		}
		
		$_SESSION['quantidadeObjetos'] = $quantidadeObjetos;

		header('Location: ../painel/pages/admin/canvas.php');  //Cria a Canvas	
	}

?>