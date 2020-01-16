<?php

class Item {  //Itens 2D

	//Atributos
	public $largura;
	public $comprimento;

	//Construtor
	function __construct( $largura, $comprimento ) {

		$this -> largura = $largura;
		$this -> comprimento = $comprimento;

	}

	//Método para girar o objeto
	function giraObjeto() {

		$temp;  //Variável temporaria

		$temp = $this->largura;
		$this-> largura = $this-> comprimento;
		$this-> comprimento = $temp;

	}

	//Método que retorna a área do objeto
	function calculaArea() {

		return ( $this->largura * $this->comprimento );

	}

	function confereItem() {

		$a = $this->largura;
		$b = $this->comprimento;

		echo "A largura do item é: $a<br>";
		echo "O comprimento do item é: $b<br>";

	}

}

?>