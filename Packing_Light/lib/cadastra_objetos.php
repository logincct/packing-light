<?php
	session_start();
    include_once('mysql.php');
    if( isset($_POST['cadastrar']) ){

			$largura = $_POST['reg_largura'];
			$comprimento = $_POST['reg_comprimento'];
			$resultado = '';
		if(!(isset($_POST['cadastrar']))){		
			$largura = $_SESSION['reg_largura'];
			$comprimento = $_SESSION['reg_comprimento'];
			$resultado = $_SESSION['reg_resultado'];
		}
		$altura = 0;
		$nome = $largura."x".$comprimento."x".$altura;


	  if($largura == "" || $largura == null){
	    echo"<script language='javascript' type='text/javascript'>
	    alert('O campo largura deve ser preenchido');</script>";
	 
	    }else{
	    	$mysql = new MySQL();

	    	$insert = $mysql->insert('busca_objetos', array('nome' => $nome,'largura' => $largura, 'comprimento' => $comprimento,'resultado' => $resultado));	     

		    echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
		    header('Location: ../painel/pages/user/cadastrar_objeto.php');

	    }
    }
    else{
    	header('Location: ../painel/pages/admin/canvas.php');
    }

?>