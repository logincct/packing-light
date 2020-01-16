<?php session_start(); ?>

	<script src="script.js"></script>  <!-- Chama função de script.js -->

	<canvas id="OriginalCanvas" width=" <?php echo $_SESSION['l_palt']; ?> " height=" <?php echo $_SESSION['c_palt']; ?> " style="border:1px solid #000000;"></canvas>

		<script type="text/javascript">
			colors = ["#502d89", "#2d897e", "#71892d", "#892d42", "#89392d", "#61892d"]

			var canvasOriginal = document.getElementById("OriginalCanvas");  //Select canvas element in the page
			var ctx1 = canvasOriginal.getContext("2d");  //Built-in object

			var x = 0;
			var y = 0;
			var xx = 0;
			var yy = 0;
			var cont = 0; // Contador para quantidade de caixas colocadas do pallet
			var temp;

			
			if(<?php echo $_SESSION['alter'] ?> == 1){
				xx = <?php echo $_SESSION['lag']; ?>; //xx é a largura do objeto
				yy = <?php echo $_SESSION['comp']; ?>;//yy é o comprimento do objeto
			}else{ //Gira objeto
				xx = <?php echo $_SESSION['comp']; ?>;
				yy = <?php echo $_SESSION['lag']; ?>;
			}

			//Enquanto o número de caixas colocadas for menor que o número de objetos
			while ( cont < <?php echo $_SESSION['res']; ?>) {

				//Desenhar as caixas
				ctx1.fillStyle = colors[  Math.floor((Math.random() * 6) + 1) ];  //Fill the color 
				ctx1.fillRect(x, y, xx , yy);  //Create box
				ctx1.beginPath();
				ctx1.lineWidth = "1";
				ctx1.rect(x, y, xx , yy);
				ctx1.stroke();

				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
				if ( ((x + xx) <= canvasOriginal.attributes[1].value) && (y + yy <= canvasOriginal.attributes[2].value )) {
					x += xx;
				}

				if ( (x + xx) > canvasOriginal.attributes[1].value && (y + yy) <= canvasOriginal.attributes[2].value ) {
					x = 0;
					y += yy;				
				}
				if( (y + yy) > canvasOriginal.attributes[2].value ){
					break;
				}


				cont = cont + 1;

			}

<<<<<<< HEAD
			x = <?php echo $_SESSION['l_palt'] - $_SESSION['lag_rest']; ?>;
			y = <?php echo $_SESSION['c_palt'] - $_SESSION['comp_rest']; ?>;

			cont = 0;

			temp = yy;
			yy = xx;
			xx = temp;

=======
		</script>

		<div>
			<button onclick="mostraInformacoes('OriginalCanvas', 'info-original')">Original</button>
			<p id="info-original"></p>
		</div>

		<canvas id="PreviousCanvas" width=" <?php echo $_SESSION['lag_rest']; ?> " height=" <?php echo $_SESSION['comp_rest']; ?> " style="border:1px solid #000000;"></canvas>
>>>>>>> 1f29509b77efd2c41260c3ff6f4568a4a67f38a8


			while ( cont < <?php echo $_SESSION['qtd_obj']; ?>  ) {

				//Desenhar as caixas
				ctx1.fillStyle = colors[  Math.floor((Math.random() * 6) + 1) ];  //Fill the color 
				ctx1.fillRect(x, y, xx , yy);  //Create box
				ctx1.beginPath();
				ctx1.lineWidth = "1";
				ctx1.rect(x, y, xx , yy);
				ctx1.stroke();

				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
				if ( ((x + xx) <= canvasOriginal.attributes[1].value) && (y + yy <= canvasOriginal.attributes[2].value )) {
					x += xx;
				}

				if ( (x + xx) > canvasOriginal.attributes[1].value && (y + yy) <= canvasOriginal.attributes[2].value ) {
					x = <?php echo $_SESSION['l_palt'] - $_SESSION['lag_rest'] ?>;
					y += yy;				
				}
				if( (y + yy) > canvasOriginal.attributes[2].value ){
					break;
				}


				cont = cont + 1;

			}

		</script>

		<div>  <!-- Puxa informações do canvas menor. -->
			<button onclick="mostraInformacoes('PreviousCanvas', 'info-previous')">Partição</button>
			<p id="info-previous"></p>
		</div>

<<<<<<< HEAD
			<script>

		// Printa o tamanho do pallet abaixo do OriginalCanvas
		function myFunction() {
			var x = document.getElementById("OriginalCanvas");
			var txt = "";
			var i;
			for (i = 0; i < x.attributes.length; i++) {
				txt = txt + x.attributes[i].name + " = " + x.attributes[i].value + "<br>";
			}
			document.getElementById("demo").innerHTML = txt;
		}
		</script>
=======
		<script type="text/javascript">
			ctx1.drawImage(canvasDiv, <?php echo $_SESSION['l_palt'] - $_SESSION['lag_rest'] ?>, 0);
		</script>


>>>>>>> 1f29509b77efd2c41260c3ff6f4568a4a67f38a8
