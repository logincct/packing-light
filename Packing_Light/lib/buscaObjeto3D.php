<?php
	
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$host = $url["host"];
	$user = $url["user"];
	$pass = $url["pass"];
	$db = substr($url["path"], 1);

	$connect = mysqli_connect($host, $user, $pass, $db);
  	$listar = mysqli_query($connect, "SELECT nome,largura,comprimento,peso FROM busca_objetos");

	$nome = $_POST['nome_obj'];
	$l_palt = $_POST['l_palt'];
	$c_palt = $_POST['c_palt'];
	$h_palt = $_POST['h_palt'];
	$qtd_obj = $_POST['qtd_obj'];
	$carga = $_POST['carga'];
	$_POST['n_obj'] = 100;

	while ($row = mysqli_fetch_assoc($listar)) 
	{
		if($row['nome'] == $nome){
			$_POST['lag_obj'] = $row['largura'];
			$_POST['comp_obj'] = $row['comprimento'];
			$_POST['alt_obj'] = $row['altura'];
			$_POST['peso_obj'] = $row['carga'];
		}
	}
	
	// require_once('back.php');

?>