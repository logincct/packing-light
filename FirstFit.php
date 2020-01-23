<?php

	function firstFit ( &$espaco_rest, &$objetos, $n_obj, &$c_niv, $l_palt, $c_palt) {

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
		return $frst_res;
	}
	?>