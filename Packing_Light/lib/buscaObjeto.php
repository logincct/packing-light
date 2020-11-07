<?php
	session_start();
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$host = $url["host"];
	$user = $url["user"];
	$pass = $url["pass"];
	$db = substr($url["path"], 1);
	// $host = "localhost";
	// $user = "root";
	// $pass = "";
	// $db = "login";

	$connect = mysqli_connect($host, $user, $pass, $db);
  	$listar = mysqli_query($connect, "SELECT nome,largura,comprimento FROM busca_objetos");

	$nome = $_POST['nome_obj'];
	$_SESSION["nome_obj"] = $nome;
	$l_palt = $_POST['l_palt'];
	//$l_palt = ($larg_palt/0.026458333333333);
	$c_palt = $_POST['c_palt'];
	//$c_palt = ($comp_palt/0.026458333333333);
	$_POST['n_obj'] = 100;

	while ($row = mysqli_fetch_assoc($listar)) 
	{
		if($row['nome'] == $nome){
			$_POST['lag_obj'] = $row['largura'];
			$_POST['comp_obj'] = $row['comprimento'];
		}
	}
	
	require_once('back.php');

?>