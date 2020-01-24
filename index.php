<!DOCTYPE>
<html>

	<body>

		<form action="back.php" method="POST">

			<label for ="l_palt" >Largura do pallet</label>
			<input id = "l_palt" type = "number" name = "l_palt" value = "130" required ></br>

			<label for ="c_palt" >Comprimento do pallet</label>
			<input id = "c_palt" type = "number" name = "c_palt" value = "130" required></br>

 			<label for ="n_obj" >Número de objetos</label>
			<input id = "n_obj" type = "number" name = "n_obj" value = "15" required></br>

			<label for ="lag_obj" >Largura do objeto</label>
			<input id = "lag_obj" type = "number" name = "lag_obj"
			value = "50" required ><br>

			<label for ="comp_obj" >Comprimento do objeto</label>
			<input id = "comp_obj" type = "number" name = "comp_obj" value = "30" required><br>
			
			<input type = "submit" value = "Calcular">

		</form>

	</body>

</html>