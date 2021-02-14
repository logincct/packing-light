<?php
    
    session_start();
    
    include_once('admin/mysql.php');
    //include_once("conexao.php");  
    //require_once("mysql/Repositorio.php");  
        
    $email = "";
    $senha_md5 = "";
    $senha = "";
    $nivel = "";

    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
    if(isset($_POST["senha"])){
        $senha_md5 = $_POST["senha"];
        $senha = md5($senha_md5);
    }    
        
    exec("alo.php", $retorno);
    var_dump($retorno);
    echo $retorno;
    /*if($email != ""){
        echo "<script>javascript:window.alert('{$email}');</script>";
    }*/
    
    if($email != "" && $senha != ""){

        $mysql = new MySQL();
                
    try{
        $login = $mysql->where('email', $email)->get('usuario');
        //$login = mysqli_query($mysqli, "SELECT * FROM usuario where email='$email' and nivel='$nivel'");
                
                $resultado = mysqli_fetch_assoc($login);
                
                if ($resultado != "")
                {
                    if($resultado['password'] == $senha){
                        $nivel = $resultado['nivel'];
                        if(($nivel == 0) || ($nivel == 10) || ($nivel == 11) || ($nivel == 12)){
                            $_SESSION["usuario"] = array($resultado['nome'],
                                                     $resultado['email'],
                                                     $resultado['endereco'],
                                                     $resultado['codigo'],
                                                     $resultado['password'],
                                                     $resultado['cpf'],
                                                     $resultado['nivel']);
                            echo "<script>javascript:window.location.replace('login/painel/pages/admin/main.php');</script>";
                        }
                        
                        else if($nivel == 1){
                            $_SESSION["admin"] = array($resultado['nome'],
                                                     $resultado['email'],
                                                     $resultado['endereco'],
                                                     $resultado['codigo'],
                                                     $resultado['password'],
                                                     $resultado['cpf'],
                                                     $resultado['nivel']);
                            echo "<script>javascript:window.location.replace('login/painel/pages/admin/main_admin.php');</script>";
                        }
                        
                    }else{
                        echo "<script>javascript:window.alert('Senha incorreta.');</script>";
                        
                    }
                
                }
                else {echo "<script>javascript:window.alert('Usuário não existe');</script>";}
    }catch(Exception $e){
        echo 'Caught exception: ', $e->getMessage();
    }
    }
    //mysqli_close($mysqli);
?>