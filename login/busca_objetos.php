
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php

	$query="SELECT largura FROM obejtos_calculados";
	$listar = filterTable($query);

	function filterTable($query){
	         
	        $connect = mysqli_connect("localhost", "root", '', 'packing_light');
	        $filter_Result = mysqli_query($connect, $query);
	        return $filter_Result;
	    }

?>

<script type="text/javascript"> 
 

function addOjetosCalculados() 
{
        contador=0;
        var qtdeCampos = document.getElementById("campo").value;
		contador++;
		
		for(i=0; i<qtdeCampos; i++)
		{
			var objPai = document.getElementById("selecao");
			//Criando o elemento DIV;
			var objFilho = document.createElement("div");
			//Definindo atributos ao objFilho1:
			objFilho.setAttribute("id","campo"+i);
			//Inserindo o elemento no pai:
			objPai.appendChild(objFilho);
			//Escrevendo algo no filho recém-criado:
			document.getElementById("campo"+i).innerHTML = "<div><select name='campo"+i+"' id='campo"+i+"'><option value=''></option><?php while ($row = mysqli_fetch_assoc($listar)) { ?><option value='<?php echo $row['largura'];?>'><?php echo $row['largura']."    ";?></option><?php } ?></select></div>";
		}
                 
                
	
}
function removeOjetosCalculados(() 
{
        document.getElementById('selecao').innerHTML = '';
        document.getElementById('campo').value = '';
}
</script>
</head>
 
<body>
    <form action ="newEmptyPHP.php" method="post">    
<input type="text" name="num_campos" id="campo" size="1" maxlength="2" />
<input type="button" value="Adicionar campos" onclick="addOjetosCalculados()">
<br><br>
<input type="button" value="Remover Campos" onclick="removeOjetosCalculados()"> 
<!--<table border="0" cellpadding="1" cellspacing="0" class="inputs">
	<tr>
		<td>
			<select name="socio">
				<option value=""></option>
				<option value='1'> Alexandre </option>			</select>
		</td>
		<td><input type="text" name="capital" /></td>
		<td>
			<select name="cargo" id="cargo">
				<option value=""></option>
			</select>
		</td>
	</tr>
</table>-->
<div id="selecao"></div>

<input type="submit" value="Enviar">
</form>
</body>
</html>