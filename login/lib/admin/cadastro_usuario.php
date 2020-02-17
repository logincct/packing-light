<?php

    session_start();
    
    include_once('mysql.php');
    //include_once("conexao.php");
    
    $codigo = '';
    $cpf = "";
    $nome = "";
    $endereco = "";
    $email = "";
    $data_cadastro = "";
    $hora_cadastro = "";
    $senha = "";
    $senha_confirm = "";
    
    if(isset($_POST["cpf"])){
        $cpf = $_POST["cpf"];
    }
    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
    }
    if(isset($_POST["senha"])){
        $senha = $_POST["senha"];
    }
    if(isset($_POST["senha_confirm"])){
        $senha_confirm = $_POST["senha_confirm"];
    }
    if(isset($_POST["endereco"])){
        $endereco = $_POST["endereco"];
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
    
    if($cpf != "" && $nome != "" && $endereco != "" && $email != "" && $data_cadastro != "" && $hora_cadastro != "" && $senha != "" && $senha_confirm != ""){
        
        //$mysql = new MySQL();
        
        try{
        //$mysql->insert('usuario', array('codigo' => '','cpf' => cpf,'nome' => $nome, 'endereco' => $endereco, 'email' => $email,'data_cadastro' => $data_cadastro,'hora_cadastro' => $hora_cadastro));
        $mysql = new MySQL();
        $result = $mysql->where('email', $email)->get('usuario');
        //$result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE email='$email'");
        $results = mysqli_num_rows($result);
        //array para os dados serem exibidos
        if($results>0){

            echo "<script>javascript:window.alert('Usuário já existente.');window.location='../../pages/admin/cadastro_usuarios.php';</script>";
        }else{
            if($senha != $senha_confirm){
                echo "<script>javascript:window.alert('Senhas diferentes.');window.location='../../pages/admin/cadastro_usuarios.php';</script>";
            }else{
                $mysql = new MySQL();
                $mysql->insert('usuario', array('cpf' => $cpf,'password' => md5($senha),'nome' => $nome, 'endereco' => $endereco,'email' => $email,'data_cadastro' => $data_cadastro,'hora_cadastro' => $hora_cadastro,'nivel' => 1));
                //$mysql = mysqli_query($mysqli, "INSERT INTO usuario (codigo,cpf,password,nome,endereco,email,data_cadastro,hora_cadastro,nivel) VALUES ('$codigo','$cpf',md5('$senha'),'$nome','$endereco','$email','$data_cadastro','$hora_cadastro',1)");
                echo "<script>javascript:window.alert('Cadastro de usuário realizado com sucesso.');</script>";
            }
            
        }
        }catch(Exception $e){
                echo 'Caught exception: ', $e->getMessage();
        }
    }

?>

