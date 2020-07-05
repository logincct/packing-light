<?php
// incluindo conexão com bd
//include_once("conexao.php");
include_once('../../login/lib/admin/mysql.php');

// Busca por codigo
$codigo = $_GET['codigo'];

// deletando usuario 
    $mysql = new MySQL();
    try{
    	$verifica2 = $mysql->where('codigo', $codigo)->get('clientes');
    	$resultado2 = mysqli_fetch_assoc($verifica2);
             $_SESSION["cliente"] = array($resultado2['codigo']);
            
             if ($resultado2 == ""){
                echo "<script>javascript:window.alert('Código não existe');</script>";
                
             }else{
             	$mysql->where('codigo', $_SESSION["cliente"][0])->delete('clientes');
             	header("Location:../pages/listar_clientes.php");
             	
             }
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
//$result = mysqli_query($mysqli, "DELETE FROM clientes WHERE codigo=$codigo");

// Redirecionando para alguma página, de preferencia a de edição/delete/ a que a gente vai usar pra editar o pessoal
?>