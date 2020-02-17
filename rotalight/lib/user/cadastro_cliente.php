<?php

    session_start();
    
    include_once('mysql.php');
    //include_once("conexao.php");
    
    $nome = "";
    $endereco = "";
    $telefone = "";
    $email = "";
    $data_cadastro = "";
    $hora_cadastro = "";
    
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
    
    if($nome != "" && $endereco != "" && $telefone != "" && $email != "" && $data_cadastro != "" && $hora_cadastro != ""){
        
        
        try{
        //$var = '';
        $mysql = new MySQL();
        $result = $mysql->where('email', $email)->get('usuario');
        //$result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE email='$email'");
        $results = mysqli_num_rows($result);
        //array para os dados serem exibidos
        if($results>0){

            echo "<script>javascript:window.alert('Usuário já existente.');window.location='../../pages/user/cadastro_cliente.php';</script>";
        }else{
            $mysql = new MySQL();
            $mysql->insert('clientes', array('codigo' => '','nome' => $nome, 'endereco' => $endereco, 'telefone' => $telefone,'email' => $email,'data_cadastro' => $data_cadastro,'hora_cadastro' => $hora_cadastro));

            //$mysql = mysqli_query($mysqli, "INSERT INTO clientes (codigo,nome,endereco,telefone,email,data_cadastro,hora_cadastro) VALUES ('$var','$nome','$endereco','$telefone','$email','$data_cadastro','$hora_cadastro')");
    		echo "<script>javascript:window.alert('Cadastro de cliente realizado com sucesso.');</script>";
    	}
            
        }catch(Exception $e){
            echo 'Caught exception: ', $e->getMessage();
        }
    }
?>

