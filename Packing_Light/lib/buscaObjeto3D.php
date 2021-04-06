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

	$connect = mysqli_connect($host, $user, $pass, $db);
  	$listar = mysqli_query($connect, "SELECT codigo,nome,largura,comprimento,altura,peso FROM busca_objetos");

  	
  	if (isset($_POST["adiciona"])) {
  		$_SESSION['nome'] = $_POST['nome_obj'];
		$_SESSION['l_palt']  = $_POST['l_palt'];
		$_SESSION['c_palt'] = $_POST['c_palt'];
		$_SESSION['h_palt'] = $_POST['h_palt'];
		$_SESSION['carga'] = $_POST['carga'];
		//$array[]=$_SESSION['nome'];
		$lista1 = array();
		$lista2 = array();
		$lista3 = array();
		//$_SESSION['lista2'] = array();


		while ($row = mysqli_fetch_assoc($listar)){
			if($row['nome'] == $_SESSION['nome']){
				$_SESSION['cod_obj'] = $row['codigo'];
				$_SESSION['nome_obj'] = $row['nome'];
				$_SESSION['larg_obj'] = $row['largura'];
				$_SESSION['comp_obj'] = $row['comprimento'];
				$_SESSION['alt_obj'] = $row['altura'];
				$_SESSION['peso_obj'] = $row['peso'];
				array_push($lista3, $_SESSION['cod_obj'], $_SESSION['nome_obj'], $_SESSION['larg_obj'], $_SESSION['comp_obj'], $_SESSION['alt_obj'], $_SESSION['peso_obj']);
			//$lista2 .= $lista3 . "";
			}
		}
	//echo $lista3[0];
		//$lista1 é a lista para array de pallet
		//$lista2 é a lista para array de produtos/objetos

		$lista2["nome"][] = $_SESSION['nome'];
		
		$arquivo = 'texto.json';
		$conteudo = "Inicio";
		$fp = fopen($arquivo, 'w');
		fwrite($fp, $conteudo);
		fclose($fp);

		for ($i=0; $i < count($lista2["nome"]); $i++) { 
		
			// $lista1["l_palt"] = $_SESSION['l_palt'];
			// $lista1["c_palt"] = $_SESSION['c_palt'];
			// $lista1["h_palt"] = $_SESSION['h_palt'];
			// $lista1["carga"] = $_SESSION['carga'];
			//$_SESSION["lista1"] = array('Pallets' => array("l_palt" => $_SESSION["l_palt"]), array("c_palt" => $_SESSION["c_palt"]), array("h_palt" => $_SESSION["h_palt"]), array("carga" => $_SESSION["carga"]));
		$_SESSION["lista1"][] = [["l_palt"=>$_SESSION["l_palt"], "c_palt"=>$_SESSION["c_palt"]]];
			$conteudo1 = json_encode($_SESSION["lista1"]);

			//$conteudo2 = json_encode($lista2);

			//$conteudo1 = $lista2;
			
			//var_dump($string);
			$fp1 = fopen($arquivo, 'a+');
			//var_dump($fp1);
			fwrite($fp1, print_r($conteudo1, true));
			//fwrite($fp1, print_r($conteudo2, true));
			fclose($fp1);
			$string = file_get_contents("texto.json");
			break;
		}
		//session_destroy();
		//echo "<script>javascript:window.location.replace('../pages/buscar_objeto_3d.php');</script>";


  	}
  	
	if (isset($_POST['calculo'])) {	
		$return = array();
		$arr = "";
  		$comando = "go run ../../bp3d-master/example/testando.go";
		$saida = exec($comando, $return, $arr);
		print_r($saida);
	}

