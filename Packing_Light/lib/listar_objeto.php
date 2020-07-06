<?php

    session_start();
    
    include_once('../../login/lib/admin/mysql.php');
    // include_once("conexao.php");    
    
    $valor = "";
    $cliente = "";
    
    $mysql = new MySQL();
    
        try{
            $listar = $mysql->order_by('nome','ASC')->get('busca_objetos');
		
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
    
     function filterTable($query){
         
        $connect = new MySQL();
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
        
    }
?>

