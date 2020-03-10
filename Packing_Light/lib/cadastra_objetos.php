<?php

	if ( !isset( $_SESSION ) ){
		session_start();
	}

	$largura = $_SESSION['reg_largura'];
	$comprimento = $_SESSION['reg_comprimento'];
	$altura = 0;
	$resultado = $_SESSION['reg_resultado'];
	$nome = $largura."x".$comprimento."x".$altura;

	$connect = mysqli_connect('localhost','root','','objetos');

	$select = mysqli_query($connect, "SELECT nome,largura,comprimento,resultado FROM busca_objetos");
	// $array = mysqli_fetch_array($select);
	// $logarray = $array['largura'];
 
  if($largura == "" || $largura == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo largura deve ser preenchido');</script>";
 
    }else{

	    $insert = mysqli_query($connect, "INSERT INTO busca_objetos (nome,largura,comprimento,resultado) VALUES ('$nome','$largura','$comprimento','$resultado')");
	     
	    if($insert){
	      echo"<script language='javascript' type='text/javascript'>
	      alert('Usuário cadastrado com sucesso!');</script>";
	    }else{
	      echo"<script language='javascript' type='text/javascript'>
	      alert('Não foi possível cadastrar esse usuário');</script>";
	  	}
    }

    header('Location: ../painel/pages/admin/canvas.php');;

?>