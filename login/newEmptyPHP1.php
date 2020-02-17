<?php
    
    $query = "SELECT endereco FROM `clientes` WHERE nome = 'jose'";
    $listar = filterTable($query);
    
    function filterTable($query){
         
        $connect = mysqli_connect("localhost", "root", '', 'rotalight');
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
    
    $var = mysqli_fetch_assoc($listar);
    echo $var['endereco'];
?>
