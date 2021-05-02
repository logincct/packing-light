<?php
	session_start();
  	
  	if (isset($_POST["adiciona"])) {
  		$nome = $_POST['nome_obj'];
		$l_palt  = $_POST['l_palt'];
		$c_palt = $_POST['c_palt'];
		$h_palt = $_POST['h_palt'];
		$carga = $_POST['carga'];


		$arquivo = 'pallet.json';
		$texto = "";
		$fp = fopen($arquivo, 'w');
		fwrite($fp, $texto);
		fclose($fp);

		$arquivo1 = 'produto.json';
		$texto2 = "";
		$fp1 = fopen($arquivo1, 'w');
		fwrite($fp1, $texto2);
		fclose($fp1);

			$_SESSION["lista1"] = array('l_palt'=>$l_palt, 'c_palt'=>$c_palt, 'h_palt'=>$h_palt, 'carga'=>$carga);
			$_SESSION["lista2"][] = $nome;
			session_destroy();
			$conteudo = json_encode($_SESSION["lista1"]);
			$conteudo1 = json_encode($_SESSION["lista2"]);

			$fp3 = fopen($arquivo, 'a+');
			fwrite($fp3, print_r($conteudo, true));
			fclose($fp3);

			$fp4 = fopen($arquivo1, 'a+');
			fwrite($fp4, print_r($conteudo1, true));
			fclose($fp4);

		echo "<script>javascript:window.location.replace('../pages/buscar_objeto_3d.php');</script>";

  	}
  	
	if (isset($_POST['calculo'])) {	
		$return = array();
  		$comando = "go run ../../bp3d-master/example/testando.go";
		$saida = exec($comando, $return);
		print_r($saida);

	}

