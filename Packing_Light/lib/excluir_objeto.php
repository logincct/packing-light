<?php
// incluindo conexão com bd
//include_once("conexao.php");
include_once('mysql.php');

// Busca por codigo
$codigo = $_GET['codigo'];

// deletando usuario 
    $mysql = new MySQL();
    try{
    	$verifica2 = $mysql->where('codigo', $codigo)->get('busca_objetos');
    	$resultado2 = mysqli_fetch_assoc($verifica2);
             $_SESSION["objeto"] = array($resultado2['codigo']);
            
             if ($resultado2 == ""){
                echo "<script>javascript:window.alert('Código não existe');</script>";
                
             }else{
             	$mysql->where('codigo', $_SESSION["objeto"][0])->delete('busca_objetos');
             	header("Location:../painel/pages/user/listar_objeto.php");
             	
             }
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
//$result = mysqli_query($mysqli, "DELETE FROM objetos WHERE codigo=$codigo");

// Redirecionando para alguma página, de preferencia a de edição/delete/ a que a gente vai usar pra editar o pessoal
?>