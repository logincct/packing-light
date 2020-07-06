<?php
	session_start();
    include_once('../../login/lib/admin/mysql.php');
    if( isset($_POST['cadastrar']) or isset($_POST['salva_objeto'])){


    	if( isset($_POST['salva_objeto']) ){
    		$nome = $_SESSION['reg_nome'];
    		$largura = $_SESSION['reg_largura'];
			$comprimento = $_SESSION['reg_comprimento'];
			$altura = $_SESSION['reg_altura'];
			$resultado = $_SESSION['reg_resultado']."  Pallet: ".$_SESSION['lag_palt']."x".$_SESSION['comp_palt']."x".$_SESSION['reg_altura'];
    	}
    	else{
    		$nome = $_POST['reg_nome'];
			$largura = $_POST['reg_largura'];
			$comprimento = $_POST['reg_comprimento'];
			$altura = $_POST['reg_altura'];
			$resultado = 'Não calculado';
    	}
		// if(!(isset($_POST['cadastrar']))){		
		// 	$largura = $_SESSION['reg_largura'];
		// 	$comprimento = $_SESSION['reg_comprimento'];
		// 	$altura = $_SESSION['reg_altura'];
		// 	$resultado = $_SESSION['reg_resultado'];
		// }
		//$nome = $largura."x".$comprimento."x".$altura;

  //   		$nome = $_POST['reg_nome'];
		// 	$largura = $_POST['reg_largura'];
		// 	$comprimento = $_POST['reg_comprimento'];
		// 	$altura = $_POST['reg_altura'];
		// 	$resultado = '';
		// if(!(isset($_POST['cadastrar']))){	

		// 	$nome = $_SESSION['reg_nome'];	
		// 	$largura = $_SESSION['reg_largura'];
		// 	$comprimento = $_SESSION['reg_comprimento'];
		// 	$altura = $_SESSION['reg_altura'];
		// 	$resultado = $_SESSION['reg_resultado'];
		// }
		//$nome = $largura."x".$comprimento."x".$altura;



	  if($largura == "" || $largura == null ){
	  	echo "<script>javascript:window.alert('O campo largura deve ser preenchido');</script>";
	    //echo"<script language='javascript' type='text/javascript'>
	    //alert('O campo largura deve ser preenchido');</script>";
	 
	    }else{
	    	$mysql = new MySQL();


	    	$insert = $mysql->insert('busca_objetos', array('nome' => $nome,'largura' => $largura, 'comprimento' => $comprimento, 'altura' => $altura ,'resultado' => $resultado));	     

		    echo "<script>javascript:window.alert('Usuário cadastrado com sucesso!');</script>";
		    if(isset($_POST['cadastrar'])){
		    	echo "<script>javascript:window.location.replace('../pages/cadastrar_objeto.php');</script>";
		    	//header('Location: ../painel/pages/user/cadastrar_objeto.php');
		    }
		    else if(isset($_POST['salva_objeto'])){
		    	echo "<script>javascript:window.location.replace('../pages/canvas.php');</script>";
		    	//header('Location: ../painel/pages/admin/canvas.php');
		    }
	    }
    }
    else{
		echo "<script>javascript:window.location.replace('../pages/canvas.php');</script>";    }

?>