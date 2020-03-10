<?php

    session_start();
    //include_once("conexao.php");
    include_once('mysql.php');
    header('Content-Type: text/html; charset=utf-8');

    $codigo = "";
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
    
    if(isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
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
        $nova_senha = $_POST["nova_senha"];
    }
    if(isset($_POST["nova_senha_confirm"])){
        $nova_senha_confirm = $_POST["nova_senha_confirm"];
    }
    
    
    // if($cod_usu != ""){
    //     // $mysql = new MySQL();
        
    //     try{
    //         //$verifica = $mysql->where('codigo', $codigo_usuario)->get('usuarios');
    //         $verifica = mysqli_query($mysqli, "SELECT codigo,cpf,nome,email,endereco,data_cadastro,hora_cadastro FROM usuario where codigo like '%$codigo_usuario%'");

                
    //         $resultado1 = mysqli_fetch_assoc($verifica);

    //         if ($resultado1 == ""){
    //             echo "<script>javascript:window.alert('Código não existe');</script>";
    //         }
                
    //     }catch(Exception $e){
    //         echo 'Caught exception: ', $e->getMessage();
    //     }
    
    // }
    
    if ($codigo != "") {
        $mysql = new MySQL();
        $result = $mysql->where('codigo', $codigo)->get('usuario');
        while($resultado = mysqli_fetch_array($result)){
        $_SESSION["usuario_admin"] = array($resultado['nome'],
            $resultado['email'],
            $resultado['endereco'],
            $resultado['codigo'],
            $resultado['cpf']);
        }
    }

        
        // if($codigo == $_SESSION["admin"][3]){
        // $mysql = new MySQL();
        // session_destroy();
        // $result = $mysql->where('codigo', $codigo)->get('usuario');
        //     while($resultado = mysqli_fetch_array($result)){
        //     $_SESSION["admin"] = array($resultado['nome'],
        //         $resultado['email'],
        //         $resultado['endereco'],
        //         $resultado['codigo'],
        //         $resultado['password'],
        //         $resultado['cpf'],
        //         $resultado['nivel']);
        //     }
        // }
    
        

    if($cpf != "" && $nome != "" && $endereco != "" && $email != ""){
        
        $mysql = new MySQL();
        
        try{
                $mysql->where('codigo', $cod_form2)->update('usuario', array('cpf' => $cpf, 'nome' => $nome, 'email' => $email, 'endereco' => $endereco));
                //$mysql = mysqli_query($mysqli, "UPDATE usuario SET cpf='$cpf, 'nome='$nome', email='$email', endereco='$endereco', data_cadastro='$data_cadastro', hora_cadastro='$hora_cadastro' WHERE codigo=$cod_form2");
        // mysqli_close($mysqli);
		echo "<script>javascript:window.alert('Alteração de usuário realizada com sucesso.');</script>";
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
        
    }
    if(isset($_POST["update1"])){
        if(empty($nome1) || empty($endereco1) || empty($email1)) {
            
            // $mysql = new MySQL();
            echo "<script>javascript:window.alert('Preencha todos os campos.');</script>";
        // if($cpf1 != "" && $nome1 != "" && $email1 != "" && $endereco1 != "" && $data_cadastro1 != "" && $hora_cadastro1 != ""){
        
        }else{
            $mysql = new MySQL();

            $mysql->where('codigo', $cod_usu)->update('usuario', array('cpf' => $cpf1,'nome' => $nome1, 'email' => $email1, 'endereco' => $endereco1));
            //$query = mysqli_query($mysqli, "UPDATE usuario SET cpf='$cpf1', nome='$nome1', email='$email1', endereco='$endereco1', data_cadastro='$data_cadastro1', hora_cadastro='$hora_cadastro1' WHERE codigo=$cod_usu");
               // mysqli_close($mysqli);
            echo "<script>javascript:window.alert('Alteração de usuário realizada com sucesso.');</script>";
            echo "<script>window.location.replace('listar_usuarios.php');</script>";
        // mysqli_close($mysqli);
        // }catch(Exception $e){
        //     echo 'Caught exception: ', $e->getMessage();
        // }
        
        }
    }
    
    
    // if($codigo_usuario_excluir != ""){
    //       $mysql = new MySQL();
        
    //     try{
    //         //$verifica2 = $mysql->where('codigo', $codigo_cliente_excluir)->get('clientes');
    //         $verifica2 = mysqli_query($mysqli, "SELECT codigo,cpf,nome,email,endereco,data_cadastro,hora_cadastro  FROM usuario where codigo like '%$codigo_usuario_excluir%'");

                
    //         $resultado2 = mysqli_fetch_assoc($verifica2);
    //         $_SESSION["usuario"] = array($resultado2['codigo']);
    //         // mysqli_close($mysqli);
    //         if ($resultado2 == ""){
    //             echo "<script>javascript:window.alert('Código não existe');</script>";
    //             // mysqli_close($mysqli);
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
 //            $mysql = mysqli_query($mysqli, "DELETE FROM usuario WHERE codigo=$codigo");
 //            echo "<script>javascript:window.alert('Exclusão de usuário realizada com sucesso.');</script>";
 //            header("Location:../painel/pages/listar_usuarios.php");
 //            unset($_SESSION["cliente"]);
 //            // mysqli_close($mysqli);
	// }catch(Exception $e){
 //            echo 'Caught exception: ', $e->getMessage();
	// }
        
 //    }
    
    if($cpf != "" && $nova_senha != "" && $nova_senha_confirm != ""){
        
        if($cpf != $_SESSION["admin"][5]){
            echo "<script>javascript:window.alert('Cpf inválido.');window.location='../../pages/admin/alterar_senha.php';</script>";
        }else{
            if($nova_senha != $nova_senha_confirm){
                echo "<script>javascript:window.alert('Senhas diferentes.');window.location='../../pages/admin/alterar_senha.php';</script>";
            }else{
                $mysql = new MySQL();
        
                try{
                    $mysql->where('cpf', $cpf)->update('usuario', array('password' => md5($nova_senha)));
                    //$mysql = mysqli_query($mysqli, "UPDATE usuario SET password=md5('$nova_senha') WHERE cpf='$cpf'");
                    
                    echo "<script>javascript:window.alert('Redefinição de senha realizada com sucesso.\\nNa proxima vez que iniciar sua sessão, já poderá usar sua nova senha.');window.location='../../pages/admin/alterar_senha.php';</script>";
                    // header('location: ../painel/pages/alterar_senha.php');
                }catch(Exception $e){
                    echo 'Caught exception: ', $e->getMessage();
                }
            }
        }
    }
?>

