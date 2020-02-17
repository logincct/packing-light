<?php

    session_start();
    
    include_once('mysql.php');
    //include_once("conexao.php");
    	
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
        				
        		$endereco = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
        				
        		if (($linha->getElementsByTagName("Data")->item(2)) == null) {
                        $telefone = "";
                }else{
                    $telefone = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                }
                if (($linha->getElementsByTagName("Data")->item(3)) == null) {
                        $email = "";
                }else{
                    $email = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                }
		
                $data_cad = $_POST["data_cadastro"];

                $hora_cad = $_POST["hora_cadastro"];
                
                $mysql = new MySQL();

                
                try{
                    $mysql->insert('clientes', array('nome' => $nome, 'endereco' => $endereco, 'telefone' => $telefone,'email' => $email,'data_cadastro' => $data_cad,'hora_cadastro' => $hora_cad));
                    //mysqli_close();
                    
                }catch(Exception $e){
                    echo 'Caught exception: ', $e->getMessage();
                }
            }
            $primeira_linha = false;
	}
	echo "<script>javascript:window.alert('Importação de dados realizado com sucesso.');</script>";
        
        }
?>

