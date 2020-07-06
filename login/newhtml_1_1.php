<?php

    include_once("conexao.php");
	
    //$dados = $_FILES['arquivo'];
    //var_dump($dados);
	
    if(!empty($_FILES['arquivo']['tmp_name'])){
    	$arquivo = new DomDocument();
	$arquivo->load($_FILES['arquivo']['tmp_name']);
	//var_dump($arquivo);
	
	$linhas = $arquivo->getElementsByTagName("Row");
	//var_dump($linhas);
	
	$primeira_linha = true;
		
	foreach($linhas as $linha){
            if($primeira_linha == false){
		$nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
		echo "Nome: $nome <br>";
				
		$endereco = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
		echo "Endereco: $endereco <br>";
				
		$telefone = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
		echo "telefone: $telefone <br>";
		
                $email = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
		echo "email: $email <br>";
		
                $data_cad = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
		echo "data_cad: $data_cad <br>";
		
                $hora_cad = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
		echo "hora_cad: $hora_cad <br>";
		
		echo "<hr>";
				
		//Inserir o usuário no BD
		$result_usuario = "INSERT INTO clientes (nome, endereco, telefone, email, data_cadastro, hora_cadastro) VALUES ('$nome', '$endereco', '$telefone', '$email', '$data_cad', '$hora_cad')";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
            }
            $primeira_linha = false;
	}
	
        
        }
?>