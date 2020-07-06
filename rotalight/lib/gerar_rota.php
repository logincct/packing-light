<?php
    
    session_start();
    include_once('../../login/lib/admin/mysql.php');
     
    global $Matriz_Distancias;
    global $Matriz_Tempos;
    
    $codigo = "";
    $Matriz_Distancias = array();
    $Matriz_Tempos = array();
    $menor_distancia = 1000000;
    $menor_tempo = 1000000;
    $vetor_enderecos_aux = array();
    $escolhas = array();
    $tamanho_vetor = "";
     
    if(isset($_POST["num_campos"])){
       $tamanho_vetor = $_POST["num_campos"];
    }
    
    
    $mysql = new MySQL();
    
    try{
        $listar = $mysql->get('clientes', 'nome');
        // or
        //$posts = $mysql->get('usuario', 'username,password');
         
        //echo $mysql->last_query(); // the raw query that was ran
    }catch(Exception $e){
        echo 'Caught exception: ', $e->getMessage();
    }   
     
    if($tamanho_vetor != ""){
    $tamanho_vetor++;
    /*for($i = 0; $i < $tamanho_vetor; $i++){
       $vetor_enderecos_aux[$i] = $_POST["campo".($i+1)];
        
    }*/
    $escolhas[0] = $_SESSION["usuario"][0];
        
    for($i = 1; $i < $tamanho_vetor; $i++){
        //$escolhas[$i] = "'".$_POST["campo".$i]."'";
        $escolhas[$i] = $_POST["campo".$i];
    }
    $mysql = new MySQL();

    try{
        $codigo = $_SESSION["usuario"][3];
        $result = $mysql->where('codigo', $codigo)->get('usuario');
            while($resultado = mysqli_fetch_array($result)){
            $end_user = $resultado['endereco'];
            $vetor_enderecos_aux[0] = $end_user;
            }
    }catch(Exception $e){
        echo 'Caught exception: ', $e->getMessage();
    }  
    //$vetor_enderecos_aux[0] = $_SESSION["usuario"][2];
    
    for($i = 1; $i < $tamanho_vetor; $i++){
        
        $query = "SELECT endereco FROM `clientes` WHERE nome = '".$escolhas[$i]."'";
        $listar2 = filterTable($query);
        $r = mysqli_fetch_assoc($listar2);
        $vetor_enderecos_aux[$i] = ($r['endereco']);

    }
    
    $vetor_enderecos = array();
     
    for($i = 0; $i < $tamanho_vetor; $i++){
       $vetor_enderecos[$i] = urlencode($vetor_enderecos_aux[$i]);
       //echo "<script>javascript:window.alert('".$vetor_enderecos[$i]."');</script>";
    }
    
    $string = implode($vetor_enderecos,"|");
     
    $url = "chave-Google";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $responseJson = curl_exec($ch);
    curl_close($ch);
    
    $response = json_decode($responseJson);
    
    if ($response->status == 'OK') {
        
        for($i = 0; $i < $tamanho_vetor; $i++){
            for($j = 0; $j < $tamanho_vetor; $j++){
                $Matriz_Distancias[$i][$j] = $response->rows[$i]->elements[$j]->distance->value/1000;
                $Matriz_Tempos[$i][$j] = $response->rows[$i]->elements[$j]->duration->value;
            }
        }
        //$distancia_total_valor = $response->rows[0]->elements[0]->distance->value;
        //$distancia_total_texto = $response->rows[0]->elements[0]->distance->text;
    
    } else {
        echo $response->status;
    }
    
    //Inicio da criação do vetor, e realização das permutações

    for($i = 0; $i < $tamanho_vetor;$i++){
        $vetor[$i] = $i;
    }
    
    //Chamada da função permutacao
    permutacao(1,$tamanho_vetor-1);//envia o indice seguinte ao primeiro elemento

    $string_array = implode("|",$vetor3);
    
    }
    
    function permutacao($indice,$tamvet){
        
        global $vetor_com_enderecos_reais,$vetor_enderecos_aux,$vetor3,$vetor4;
        global $vetor,$vetor_resultado_permutacoes,$vetor2,$vetor_clientes,$escolhas;
        ///*global $con;
        global $menor_distancia;//*/
        global $menor_tempo;//*/
                
        if($indice === $tamvet){
            $vetor_com_enderecos_reais[0] = $vetor_enderecos_aux[0];
            $vetor_com_enderecos_reais[$tamvet+1] = $vetor_enderecos_aux[0];
            $vetor_resultado_permutacoes[0] = 0;//insere no inicio do vetor 0
            $vetor_resultado_permutacoes[$tamvet+1] = 0;//insere no fim do vetor 0
            $vetor_clientes[0] = $escolhas[0];//insere no inicio do vetor 0
            $vetor_clientes[$tamvet+1] = $escolhas[0];//insere no fim do vetor 0
            //preenche o restante do vetor com as permutações
            for($a = 1; $a <= $tamvet; $a++){
                $vetor_resultado_permutacoes[$a] = $vetor[$a];
                $vetor_com_enderecos_reais[$a] = $vetor_enderecos_aux[$a];
                $vetor_clientes[$a] = $escolhas[$a];
            }
            
            global $aux,$var,$var2,$aux2,$var3,$var4;
            //$con = 0;$vetor_resultado_permutacoes[0] = 0;//insere no inicio do vetor 0
            //$vetor_resultado_permutacoes[$tamvet+1] = 0;//insere no fim do vetor 0
            $aux = 0;
            $aux2 = 0;
            
            //
            for($cont = 0; $cont < $tamvet; $cont++){
                $var = Calcula_Distancia($vetor_resultado_permutacoes[$cont],$vetor_resultado_permutacoes[$cont+1]);
                $aux += $var;
                $var3 = Calcula_Tempo($vetor_resultado_permutacoes[$cont],$vetor_resultado_permutacoes[$cont+1]);
                $aux2 += $var3;
            }
            //calcula a distancia do ultimo endereço de entrega de volta a origem
            $var2 = Calcula_Distancia($vetor_resultado_permutacoes[$tamvet],$vetor_resultado_permutacoes[0]);
            $aux += $var2;
            $var4 = Calcula_Tempo($vetor_resultado_permutacoes[$tamvet],$vetor_resultado_permutacoes[0]);
            $aux2 += $var4;
            
            if($aux < $menor_distancia ){
                $menor_distancia = $aux;
                    for($m = 0; $m <= $tamvet+1; $m++){
                        $vetor2[$m] = $vetor_resultado_permutacoes[$m];
                        $vetor3[$m] = $vetor_com_enderecos_reais[$m];
                        $vetor4[$m] = $vetor_clientes[$m];
                    } 
            }
            
            if($aux2 < $menor_tempo ){
                $menor_tempo = $aux2;
            }
                        
            //Até aqui o programa está gerando as permutaçoes intermediarias e armazenando em um novo vetor
            // a origem e o fim do percurso
            
        }else{
                      
           for($m = $indice; $m <= $tamvet; $m++){
               troca($indice,$m);//Chamada da função troca
               permutacao($indice + 1, $tamvet);//Recursividade da função permutacao
               troca($indice,$m);//Segunda chamada da função troca
           } 
        }
        
    }
    
    function troca($i,$j){
        
        global $vetor,$vetor_enderecos_aux,$escolhas;
        $aux2 = $vetor_enderecos_aux[$i];
        $vetor_enderecos_aux[$i] = $vetor_enderecos_aux[$j];
        $vetor_enderecos_aux[$j] = $aux2;
        
        $aux = $vetor[$i];
        $vetor[$i] = $vetor[$j];
        $vetor[$j] = $aux;
        
        $aux3 = $escolhas[$i];
        $escolhas[$i] = $escolhas[$j];
        $escolhas[$j] = $aux3;    
    }
    
    function Calcula_Distancia($var1,$var2){
        
        global $Matriz_Distancias;
        
        return $Matriz_Distancias[$var1][$var2];
    }
    
    function Calcula_Tempo($var1,$var2){
        
        global $Matriz_Tempos;
        
        return $Matriz_Tempos[$var1][$var2];
    }
    
    function filterTable($query){
         
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $host = $url["host"];
        $user = $url["user"];
        $pass = $url["pass"];
        $db = substr($url["path"], 1);

        $connect = mysqli_connect($host, $user, $pass, $db);
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
?>


