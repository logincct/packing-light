
<?php


//  ____________
// |            |
// |            | < comprimento
// |____________|
//       /\
//     largura


	include('function_2.php');

	function firstFit ( &$espaco_rest, &$objetos, $n_obj, &$c_niv, $l_palt, $c_palt) {

		// 1ª chamada da função

		$c_niv = array(); // Array com o comprimento dos nives respectivamente

		$cont_c_niv = 0; //Variável para contar em que comprimento o for chegou para não ultrapassar a largura do pallet (soma de todos os itens em $c_niv[]);

		$frst_res = 0; 

		//Array armazenando a quantidade restante de espaço em cada compartimento
		$espaco_rest = array();

		//Colocar item por item
		for ( $i = 0; $i < $n_obj; $i++ ) {

			//Encontrar o primeiro nível que caiba
			for ( $j = 0; $j < $frst_res; $j++ ) {

				//Por objetos caso largura do nível ( $espaco_rest[ $j ] ) seja maior ou igual a largura do objeto
				if ( isset($espaco_rest[ $j ]) && $espaco_rest[ $j ] >= $objetos[ $i ]-> largura && $c_niv >= $objetos[ $i ]-> comprimento ) {

					$espaco_rest[ $j ] -= $objetos[ $i ]-> largura;

					//echo "Espaço restante no nível $j: $espaco_rest[$i]</br>";

					if( $c_niv <= $objetos[ $i ]-> comprimento ){
						$c_niv[ $j ] = $objetos[ $i ]-> comprimento;

					}
					$frst_res++;
					break;

				}

			}
			//Criar novos niveis
			if ( $j == $frst_res && $c_palt >= $cont_c_niv + $objetos[ $i ]->comprimento ) {
				if( $l_palt >= $objetos[ $i ]->largura ) {
					$espaco_rest[] = $l_palt - $objetos[ $i ]->largura;
					$c_niv[] = $objetos[ $i ]-> comprimento;
					$cont_c_niv += $objetos[ $i ]-> comprimento;
					$frst_res++;
				}
			}
		}

		// 2ª chamada da função

		//Gira o objeto
		$scnd_res  = 0;// Segunda resposta
		for( $i = 0; $i < sizeof($objetos) ; $i++ ){

			$objetos[$i]->giraObjeto();

			$_SESSION['lag'] = $objetos[$i]->largura;
			$_SESSION['comp'] = $objetos[$i]->comprimento;
			$_SESSION['alter'] = 0;

		}

		// Segunda resposta vai receber o resultado da função em function_2.php
		$scnd_res = scndFit( $espaco_rest, $objetos, $n_obj, $c_niv, $l_palt, $c_palt );

		//Se a quantidade de caixas colocadas depois de girar for maior que a de antes de girar, retorna $scnd_res
		if( $scnd_res > $frst_res ){

			return $scnd_res;

		}else{//Se não, retorna $frst_res, mas gira os objetos de novo (para printar a canva certa)

			for( $i=0; $i < sizeof($objetos) ; $i++ ){

				$objetos[$i]->giraObjeto();
				$_SESSION['lag'] = $objetos[$i]->largura;
				$_SESSION['comp'] = $objetos[$i]->comprimento;
				$_SESSION['alter'] = 1;
			}

			return $frst_res;
		}

	}
?>