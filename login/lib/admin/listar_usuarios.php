<?php

    session_start();
    
    include_once('mysql.php');
    // include_once("conexao.php");    
    
    $valor = "";
    $usuario = "";
    
    $mysql = new MySQL();
    
        try{
            $listar = $mysql->order_by('nome','ASC')->get('usuario');
		
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
    
     function filterTable($query){
         
        //$connect = mysqli_connect("localhost", "root", '', 'rotalight');
        $connect = new MySQL();
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
?>

