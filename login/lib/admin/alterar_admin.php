<?php

    session_start();
    //include_once("conexao.php");
    include_once('mysql.php');
    header('Content-Type: text/html; charset=utf-8');

    $codigo_usuario = "";
    $cpf = "";
    $nome = "";
    $email = "";
    $endereco = "";  
    $data_cadastro = "";
    $hora_cadastro = "";
    $cod_form2 = "";
    
    $cod_usu = "";
    $cpf1 = "";
    $nome1 = "";
    $email1 = "";
    $endereco1 = "";
    $data_cadastro1 = "";
    $hora_cadastro1 = "";

    $cpf = "";
    $nova_senha = "";
    $nova_senha_confirm = "";
    
    if(isset($_POST["codigo_usuario"])){
        $codigo_usuario = $_POST["codigo_usuario"];
    }
    if(isset($_POST["cod_form2"])){
        $cod_form2 = $_POST["cod_form2"];
    }
    if(isset($_POST["cpf"])){
        $cpf = $_POST["cpf"];
    }
    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
    }
    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
    if(isset($_POST["endereco"])){
        $endereco = $_POST["endereco"];
    }
    if(isset($_POST["data_cadastro"])){
        $data_cadastro = $_POST["data_cadastro"];
    }
    if(isset($_POST["hora_cadastro"])){
        $hora_cadastro = $_POST["hora_cadastro"];
    }
    
    if(isset($_POST["cod_usu"])){
        $cod_usu = $_POST["cod_usu"];
    }
    if(isset($_POST["cpf1"])){
        $cpf1 = $_POST["cpf1"];
    }
    if(isset($_POST["nome1"])){
        $nome1 = $_POST["nome1"];
    }
    if(isset($_POST["email1"])){
        $email1 = $_POST["email1"];
    }
    if(isset($_POST["endereco1"])){
        $endereco1 = $_POST["endereco1"];
    }
    if(isset($_POST["data_cadastro1"])){
        $data_cadastro1 = $_POST["data_cadastro1"];
    }
    if(isset($_POST["hora_cadastro1"])){
        $hora_cadastro1 = $_POST["hora_cadastro1"];
    }
    
    // if(isset($_POST["codigo_usuario_excluir"])){
    //     $codigo_usuario_excluir = $_POST["codigo_usuario_excluir"];
    // }
    
    // if(isset($_GET['codigo'])){
    //     $codigo_excluir = $_GET['codigo'];
    // }
    
    if(isset($_POST["cpf"])){
        $cpf = $_POST["cpf"];
    }
    if(isset($_POST["nova_senha"])){
        $nova_senha = md5($_POST["nova_senha"]);
    }
    if(isset($_POST["nova_senha_confirm"])){
        $nova_senha_confirm = md5($_POST["nova_senha_confirm"]);
    }
    
    
    if($codigo_usuario != ""){
        $mysql = new MySQL();
        
        try{
            $verifica = $mysql->where('codigo', $codigo_usuario)->get('usuarios');
                
            $resultado1 = mysqli_fetch_assoc($verifica);

            // mysqli_close($mysqli);
            if ($resultado1 == ""){
                echo "<script>javascript:window.alert('Código não existe');</script>";
            }
                
        }catch(Exception $e){
            echo 'Caught exception: ', $e->getMessage();
        }
    
    }
    
    if($cpf != "" && $nome != "" && $endereco != "" && $email != ""){
        
        $mysql = new MySQL();
        
        try{
                $mysql->where('codigo', $cod_form2)->update('usuario', array('cpf' => $cpf, 'nome' => $nome, 'email' => $email, 'endereco' => $endereco,'data_cadastro' => $data_cadastro,'hora_cadastro' => $hora_cadastro));

		echo "<script>javascript:window.alert('Alteração de usuário realizada com sucesso.');</script>";
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
        
    }
    if(isset($_POST["update1"])){
        if(empty($nome1) || empty($endereco1) || empty($email1)) {
            
            echo "<script>javascript:window.alert('Preencha todos os campos.');</script>";
        
        
        }else{
               $mysql = new MySQL();
               $mysql->where('codigo', $cod_usu)->update('usuario', array('cpf' => $cpf1,'nome' => $nome1, 'email' => $email1, 'endereco' => $endereco1));

            echo "<script>javascript:window.alert('Alteração de dados realizada com sucesso.\\nOs dados serão atualizados quando entrar com nova sessão.');</script>";
            echo "<script>window.location.replace('main_admin.php');</script>";
        
        }
    }
    
   
    if($cpf != "" && $nova_senha != "" && $nova_senha_confirm != ""){
        
        if($cpf != $_SESSION["admin"][5]){
            
            echo "<script>javascript:window.alert('Cpf inválido.');window.location='../../painel/pages/admin/alterar_senha.php';</script>";
        }else{
            if($nova_senha != $nova_senha_confirm){
                
                echo "<script>javascript:window.alert('Senhas diferentes.');window.location='../../painel/pages/admin/alterar_senha.php';</script>";
            }else{
                $mysql = new MySQL();
        
                try{

                    $mysql->where('cpf', $cpf)->update('usuario', array('password' => md5($nova_senha)));
                    
                    echo "<script>javascript:window.alert('Redefinição de senha realizada com sucesso.\\nNa proxima vez que iniciar sua sessão, já poderá usar sua nova senha.');window.location='../../pages/admin/alterar_senha_admin.php';</script>";

                }catch(Exception $e){
                    echo 'Caught exception: ', $e->getMessage();
                }
            }
        }
    }

?>

