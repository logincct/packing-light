package main

import (
	"bufio"
	"fmt"

	"os"
)
func lerTexto(caminhoDoArquivo string) ([]string) {
	// Abre o arquivo
	arquivo, err := os.Open(caminhoDoArquivo)
	// Caso tenha encontrado algum erro ao tentar abrir o arquivo retorne o erro encontrado
	if err != nil {
		
	}
	// Garante que o arquivo sera fechado apos o uso
	defer arquivo.Close()

	// Cria um scanner que le cada linha do arquivo
	var linhas []string
	scanner := bufio.NewScanner(arquivo)
	for scanner.Scan() {
		linhas = append(linhas, scanner.Text())
	}

	// Retorna as linhas lidas e um erro se ocorrer algum erro no scanner
	return linhas
}

func main() {
	var conteudo []string

	conteudo = nil
	conteudo = lerTexto("../../Packing_Light/lib/texto.txt")


	for indice, linha := range conteudo {
		fmt.Println(indice, linha)
	}
}
<?php
	session_start();
	// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	// $host = $url["host"];
	// $user = $url["user"];
	// $pass = $url["pass"];
	// $db = substr($url["path"], 1);
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "login";
	$_SESSION['cod_obj'][] = "";
	$_SESSION['nome_obj'][] = "";
	$_SESSION['larg_obj'][] = "";
	$_SESSION['comp_obj'][] = "";
	$_SESSION['alt_obj'][] = "";
	$_SESSION['peso_obj'][] = "";
	$connect = mysqli_connect($host, $user, $pass, $db);
  	$listar = mysqli_query($connect, "SELECT codigo,nome,largura,comprimento,altura,peso FROM busca_objetos");

  	
  	if (isset($_POST["adiciona"])) {
  		$_SESSION['nome'][] = $_POST['nome_obj'];
		$_SESSION['l_palt'][]  = $_POST['l_palt'];
		$_SESSION['c_palt'][] = $_POST['c_palt'];
		$_SESSION['h_palt'][] = $_POST['h_palt'];
		$_SESSION['carga'][] = $_POST['carga'];
		$lista1 = array();
		$lista2 = array();
		$lista3 = array();
		//$_SESSION['lista2'] = array();


		while ($row = mysqli_fetch_assoc($listar)) 
	{
		if($row['nome'] == $_SESSION['nome']){
			$_SESSION['cod_obj'][] = $row['codigo'];
			$_SESSION['nome_obj'][] = $row['nome'];
			$_SESSION['larg_obj'][] = $row['largura'];
			$_SESSION['comp_obj'][] = $row['comprimento'];
			$_SESSION['alt_obj'][] = $row['altura'];
			$_SESSION['peso_obj'][] = $row['peso'];
			array_push($lista3, $_SESSION['cod_obj'], $_SESSION['nome_obj'], $_SESSION['larg_obj'], $_SESSION['comp_obj'], $_SESSION['alt_obj'], $_SESSION['peso_obj']);
			$lista2 .= $lista3 . "";
		}
	}

		//$lista1 é a lista para array de pallet
		//$lista2 é a lista para array de produtos/objetos
		array_push($lista1, $_SESSION['l_palt'], $_SESSION['c_palt'], $_SESSION['h_palt'] , $_SESSION['carga']);
		
		
		$arquivo = 'texto.json';
		$json = json_encode("Inicio");
		$conteudo = "Inicio";
		$fp = fopen($arquivo, 'w');
		fwrite($fp, $conteudo);
		fclose($fp);
		var_dump($lista2);
		for ($i=0; $i < count($_SESSION['nome']) ; $i++) { 
			$arquivo1 = 'texto.json';
			$conteudo1 = json_encode($lista1);
			$conteudo2 = json_encode($lista2);

			//$conteudo1 = $lista2;
			

			$fp1 = fopen($arquivo1, '+a');
			//var_dump($fp1);
			fwrite($fp1, json_encode($conteudo1));
			fwrite($fp1, print_r($conteudo2, true));
			fclose($fp1);
			//session_destroy();
			//echo "<script>javascript:window.location.replace('../pages/buscar_objeto_3d.php');</script>";
			break;
		}

  	}
  	
	if (isset($_POST['calculo'])) {	
		$return = array();
		$arr = "";
  		$comando = "go run ../../bp3d-master/example/testando.go";
		$saida = exec($comando, $return, $arr);
		print_r($saida);
	}

