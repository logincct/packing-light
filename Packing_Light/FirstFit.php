<?php

	function firstFit ( &$espaco_rest, &$objetos, $numeroItens, &$comprimentoNivel, $larguraPallet, $comprimentoPallet) {

		$comprimentoNivel = array(); // Array com o comprimento dos niveis respectivamente

		$cont_c_niv = 0; //Variável para contar em que comprimento o for chegou para não ultrapassar a largura do pallet (soma de todos os itens em $comprimentoNivel[]);

		$itensEncaixados = 0; 

		//Array armazenando a quantidade restante de espaço em cada compartimento
		$espaco_rest = array();

		//Colocar item por item
		for ( $i = 0; $i < $numeroItens; $i++ ) { // i é o objeto que to colocando

			//Encontrar o primeiro nível que caiba
			for ( $j = 0; $j < $itensEncaixados; $j++ ) { //j é o nível que eu to

				//Por objetos caso largura do nível ( $espaco_rest[ $j ] ) seja maior ou igual a largura do objeto
				if ( isset($espaco_rest[ $j ]) && $espaco_rest[ $j ] >= $objetos[ $i ]-> largura && $comprimentoNivel >= $objetos[ $i ]-> comprimento ) {

					$espaco_rest[ $j ] -= $objetos[ $i ]-> largura;

					//echo "Espaço restante no nível $j: $espaco_rest[$i]</br>";

					if( $comprimentoNivel <= $objetos[ $i ]-> comprimento ){
						$comprimentoNivel[ $j ] = $objetos[ $i ]-> comprimento;

					}
					$itensEncaixados++;
					break;

				}

			} // Verifiquei todos os níveis já criados

			//Se há espaço para um novo nível, Criar novo nivel
			if ( $j == $itensEncaixados && $comprimentoPallet >= $cont_c_niv + $objetos[ $i ]->comprimento ) {
				
                if( $larguraPallet >= $objetos[ $i ]->largura ) {

				    $espaco_rest[] = $larguraPallet - $objetos[ $i ]->largura;
					$comprimentoNivel[] = $objetos[ $i ]-> comprimento;
					$cont_c_niv += $objetos[ $i ]-> comprimento;
					$itensEncaixados++;

				}
			}
		}
		return $itensEncaixados;
	}
	?>