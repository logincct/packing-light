<?php

    session_start();
    //include_once("conexao.php");
    include_once('mysql.php');
    header('Content-Type: text/html; charset=utf-8');

    $codigo_cliente = "";
    $nome = "";
    $endereco = "";
    $telefone = "";
    $email = "";
    $data_cadastro = "";
    $hora_cadastro = "";
    
    if(isset($_GET['codigo'])){
        $codigo_cliente = $_GET['codigo'];
    }
    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
    }
    if(isset($_POST["endereco"])){
        $endereco = $_POST["endereco"];
    }
    if(isset($_POST["telefone"])){
        $telefone = $_POST["telefone"];
    }
    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
    if(isset($_POST["data_cadastro"])){
        $data_cadastro = $_POST["data_cadastro"];
    }
    if(isset($_POST["hora_cadastro"])){
        $hora_cadastro = $_POST["hora_cadastro"];
    }
    
    if($codigo_cliente != ""){
        $mysql = new MySQL();
        
        try{
            $verifica = $mysql->where('codigo', $codigo_cliente)->get('clientes');
            //$verifica = mysqli_query($mysqli, "SELECT codigo,nome,endereco,telefone,email FROM clientes where codigo like '%$codigo_cliente%'");

                
            $resultado1 = mysqli_fetch_assoc($verifica);

            
            if ($resultado1 == ""){
                echo "<script>javascript:window.alert('Código não existe');</script>";
            }
                
        }catch(Exception $e){
            echo 'Caught exception: ', $e->getMessage();
        }
    
    }
    if(isset($_POST['update'])){

        if(empty($nome) || empty($endereco) || empty($telefone) || empty($email)) {
            
            $mysql = new MySQL();
            echo "<script>javascript:window.alert('Preencha todos os campos.');</script>";
            
            }else{
                    $mysql->where('codigo', $codigo_cliente)->update('clientes', array('nome' => $nome,'endereco' => $endereco,'telefone' => $telefone,'email' => $email));
                    //$query = mysqli_query($mysqli, "UPDATE clientes SET nome='$nome',endereco='$endereco', telefone='$telefone',email='$email' WHERE codigo='$codigo_cliente'");
                   // echo "<script>window.location='../pages/listar_clientes_admin.php';</script>";
            
    		echo "<script>javascript:window.alert('Alteração de cliente realizada com sucesso.');window.location='../../pages/user/listar_clientes.php';</script>";
    	}  
    }
    
?>

