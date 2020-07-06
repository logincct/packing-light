<?php

    session_start();
    //include_once("conexao.php");
    include_once('../../login/lib/admin/mysql.php');
    header('Content-Type: text/html; charset=utf-8');

    $codigo_objeto = "";
    $nome = "";
    $largura = "";
    $comprimento = "";
    $altura = "";
    $cod_form2 = "";
    
    if(isset($_GET['codigo'])){
        $codigo_objeto = $_GET['codigo'];
    }
    if(isset($_POST["cod_form2"])){
        $cod_form2 = $_POST["cod_form2"];
    }
    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
    }
    if(isset($_POST["largura"])){
        $largura = $_POST["largura"];
    }
    if(isset($_POST["comprimento"])){
        $comprimento = $_POST["comprimento"];
    }
    if(isset($_POST["altura"])){
        $altura = $_POST["altura"];
    }
     
    if($codigo_objeto != ""){
        $mysql = new MySQL();
        
        try{
            $verifica = $mysql->where('codigo', $codigo_objeto)->get('busca_objetos');
            //$verifica = mysqli_query($mysqli, "SELECT codigo,nome,endereco,telefone,email FROM objetos where codigo like '%$codigo_objeto%'");

                
            $resultado1 = mysqli_fetch_assoc($verifica);

            
            if ($resultado1 == ""){
                echo "<script>javascript:window.alert('Código não existe');</script>";
            }
                
        }catch(Exception $e){
            echo 'Caught exception: ', $e->getMessage();
        }
    
    }
    if(isset($_POST['update'])){

        if(empty($nome) || empty($largura) || empty($comprimento) || empty($altura)) {
            
            $mysql = new MySQL();
            echo "<script>javascript:window.alert('Preencha todos os campos.');</script>";
            
            }else{
                    $mysql->where('codigo', $codigo_objeto)->update('busca_objetos', array('nome' => $nome,'largura' => $largura,'comprimento' => $comprimento,'altura' => $altura));
            
    		echo "<script>javascript:window.alert('Alteração de objeto realizada com sucesso.');</script>";
    	}  
    }
    
    
?>

