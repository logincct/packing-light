<?php
	session_start();
    include_once('mysql.php');
    if( isset($_POST['cadastrar']) or isset($_POST['salva_objeto'])){

<<<<<<< HEAD
    	if( isset($_POST['salva_objeto']) ){
    		$largura = $_SESSION['reg_largura'];
			$comprimento = $_SESSION['reg_comprimento'];
			$altura = $_SESSION['reg_altura'];
			$resultado = $_SESSION['reg_resultado']."<br> Pallet: ".$_SESSION['lag_palt']."x".$_SESSION['comp_palt']."x0";
    	}
    	else{
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
		$nome = $largura."x".$comprimento."x".$altura;
=======
    		$nome = $_POST['reg_nome'];
			$largura = $_POST['reg_largura'];
			$comprimento = $_POST['reg_comprimento'];
			$altura = $_POST['reg_altura'];
			$resultado = '';
		if(!(isset($_POST['cadastrar']))){	

			$nome = $_SESSION['reg_nome'];	
			$largura = $_SESSION['reg_largura'];
			$comprimento = $_SESSION['reg_comprimento'];
			$altura = $_SESSION['reg_altura'];
			$resultado = $_SESSION['reg_resultado'];
		}
		//$nome = $largura."x".$comprimento."x".$altura;
>>>>>>> temp_rebeca


	  if($largura == "" || $largura == null ){
	  	echo "<script>javascript:window.alert('O campo largura deve ser preenchido');</script>";
	    //echo"<script language='javascript' type='text/javascript'>
	    //alert('O campo largura deve ser preenchido');</script>";
	 
	    }else{
	    	$mysql = new MySQL();

<<<<<<< HEAD
	    	$insert = $mysql->insert('busca_objetos', array('nome' => $nome,'largura' => $largura, 'comprimento' => $comprimento, 'altura' => $altura ,'resultado' => $resultado));	     

		    echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
		    if(isset($_POST['cadastrar'])){
		    	header('Location: ../painel/pages/user/cadastrar_objeto.php');
		    }
		    else if(isset($_POST['salva_objeto'])){
		    	header('Location: ../painel/pages/admin/canvas.php');
		    }
=======
	    	$insert = $mysql->insert('busca_objetos', array('nome' => $nome,'largura' => $largura, 'comprimento' => $comprimento, 'altura' => $altura,'resultado' => $resultado));	     
	    	echo "<script>javascript:window.alert('Usuário cadastrado com sucesso!');</script>";
	    	echo "<script>javascript:window.location.replace('../painel/pages/user/cadastrar_objeto.php');</script>";
		    //echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
		    //header('Location: ../painel/pages/user/cadastrar_objeto.php');
>>>>>>> temp_rebeca

	    }
    }
    else{
    	header('Location: ../painel/pages/admin/canvas.php');
    }

?>