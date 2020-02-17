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
    $cod_form2 = "";
    
    $cod_usu = "";
    $nome1 = "";
    $endereco1 = "";
    $email1 = "";
    $data_cadastro1 = "";
    $hora_cadastro1 = "";
    
    $cpf = "";
    $nova_senha = "";
    $nova_senha_confirm = "";
    if(isset($_GET['codigo'])){
        $codigo_cliente = $_GET['codigo'];
    }
    if(isset($_POST["cod_form2"])){
        $cod_form2 = $_POST["cod_form2"];
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
    
    if(isset($_POST["cod_usu"])){
        $cod_usu = $_POST["cod_usu"];
    }
    if(isset($_POST["nome1"])){
        $nome1 = $_POST["nome1"];
    }
    if(isset($_POST["endereco1"])){
        $endereco1 = $_POST["endereco1"];
    }
    if(isset($_POST["email1"])){
        $email1 = $_POST["email1"];
    }
    if(isset($_POST["data_cadastro1"])){
        $data_cadastro1 = $_POST["data_cadastro1"];
    }
    if(isset($_POST["hora_cadastro1"])){
        $hora_cadastro1 = $_POST["hora_cadastro1"];
    }
    
    // if(isset($_GET['codigo'])){
    //     $codigo_cliente_excluir = $_GET['codigo'];
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
            
    		echo "<script>javascript:window.alert('Alteração de cliente realizada com sucesso.');</script>";
    	}  
    }
    
     if(isset($_POST["update1"])){
         if(empty($nome1) || empty($endereco1) || empty($email1)) {
         //if($nome1 != "" && $endereco1 != "" && $email1 != "" && $data_cadastro1 != "" && $hora_cadastro1 != ""){
             echo "<script>javascript:window.alert('Preencha todos os campos.');</script>";

             
            
             }else{
                    $mysql = new MySQL();
                    $mysql->where('codigo', $cod_usu)->update('usuario', array('nome' => $nome1, 'email' => $email1, 'endereco' => $endereco1, 'email' => $email1));
                    //$mysql = mysqli_query($mysqli, "UPDATE usuario SET nome='$nome1', endereco='$endereco1', email='$email1' WHERE codigo=$cod_usu");
                     
     		echo "<script>javascript:window.alert('Alteração de dados realizada com sucesso.\\nOs dados serão atualizados quando entrar com nova sessão.');</script>";
              
     	 // }catch(Exception $e){
     	 // 	echo 'Caught exception: ', $e->getMessage();
     	 // }
        
         }
     }
    
    // if($codigo_cliente_excluir != ""){
    //     // $mysql = new MySQL();
        
    //     try{
    //         //$verifica2 = $mysql->where('codigo', $codigo_cliente_excluir)->get('clientes');
    //         $verifica2 = mysqli_query($mysqli, "SELECT codigo,nome,endereco,telefone,email,data_cadastro,hora_cadastro  FROM clientes where codigo like '%$codigo_cliente_excluir%'");

                
    //         $resultado2 = mysqli_fetch_assoc($verifica2);
    //         $_SESSION["cliente"] = array($resultado2['codigo']);
            
    //         if ($resultado2 == ""){
    //             echo "<script>javascript:window.alert('Código não existe');</script>";
                
    //         }
                
    //     }catch(Exception $e){
    //         echo 'Caught exception: ', $e->getMessage();
    //     }
        
        
    
    // }
 //    if($codigo_excluir != ""){
        
 //        // $mysql = new MySQL();
        
 //        try{
 //            //$mysql->where('codigo', $_SESSION["cliente"][0])->delete('clientes');
 //            $codigo = $_SESSION["usuario"][0];
 //            $mysql = mysqli_query($mysqli, "DELETE FROM clientes WHERE codigo=$codigo");
 //            echo "<script>javascript:window.alert('Exclusão de cliente realizada com sucesso.');</script>";
 //            echo "<script>javascript:location.href = document.referrer;</script>";

 //            //header("Location:../painel/pages/listar_clientes.php");

 //            unset($_SESSION["cliente"]);
            
	// }catch(Exception $e){
 //            echo 'Caught exception: ', $e->getMessage();
	// }
        
 //    }
    
    if($cpf != "" && $nova_senha != "" && $nova_senha_confirm != ""){
        
        if($cpf != $_SESSION["usuario"][5]){
            echo "<script>javascript:window.alert('Cpf inválido.');window.location='../../pages/user/alterar_senha.php';</script>";
        }else{
            if($nova_senha != $nova_senha_confirm){
                echo "<script>javascript:window.alert('Senhas diferentes.');window.location='../../pages/user/alterar_senha.php';</script>";
            }else{
                $mysql = new MySQL();
        
                try{
                    $mysql->where('cpf', $cpf)->update('usuario', array('password' => md5($nova_senha)));
                    //$mysql = mysqli_query($mysqli, "UPDATE usuario SET password=md5('$nova_senha') WHERE cpf='$cpf'");
                    
                    echo "<script>javascript:window.alert('Redefinição de senha realizada com sucesso.\\nNa proxima vez que iniciar sua sessão, já poderá usar sua nova senha.');window.location='../../pages/user/alterar_senha.php';</script>";
                    // header('location: ../painel/pages/alterar_senha.php');
                }catch(Exception $e){
                    echo 'Caught exception: ', $e->getMessage();
                }
            }
        }
    }
?>

