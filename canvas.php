<?php session_start(); ?>

	<script src="script.js"></script>

	<canvas id="Pallet" width=" <?php echo $_SESSION['l_palt']; ?> " height=" <?php echo $_SESSION['c_palt']; ?> " style="border:1px solid #000000;"></canvas>

		<script>
			colors = ["#023ff7", "#f70202", "#f7f302", "#0af702"]

			var myCanvas = document.getElementById("Pallet");  //Select canvas element in the page
			var ctx1 = myCanvas.getContext("2d");  //Built-in object

			var num_obj = <?php echo $_SESSION['n_obj']?>;
			var x = 0;
			var y = 0;
			var xx = 0;
			var yy = 0;
			var cont = 1; //Contador para quantidade de caixas colocadas do pallet
			var temp;
			var contador = 1;

				xx = <?php echo $_SESSION['lag']; ?>;  //xx é a largura do objeto
				yy = <?php echo $_SESSION['comp']; ?>;  //yy é o comprimento do objeto


			//Enquanto o número de caixas colocadas for menor que o número de objetos
			while ( cont <= <?php echo $_SESSION['res']; ?> && cont <= <?php echo $_SESSION['n_obj']; ?> ) {

				//Desenhar as caixas
				ctx1.fillStyle = colors[  Math.floor( (Math.random() * 3) + 1) ];  //Fill the color 
				ctx1.fillRect(x, y, xx , yy);  //Create box
				ctx1.beginPath();
				ctx1.lineWidth = "1";
				ctx1.rect(x, y, xx , yy);
				ctx1.stroke();

				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
				if ( ((x + xx) <= myCanvas.attributes[1].value) && (y + yy <= myCanvas.attributes[2].value )) {
					x += xx;
				}

				if ( (x + xx) > myCanvas.attributes[1].value && (y + yy) <= myCanvas.attributes[2].value ) {
					x = 0;
					y += yy;				
				}
				if( (y + yy) > myCanvas.attributes[2].value ){
					break;
				}


				cont = cont + 1;
				num_obj -= 1;

			}

			//document.write(cont);
			if(<?php echo $_SESSION['spaceL_left'];?> == 1){

				x = <?php echo $_SESSION['l_palt'] - $_SESSION['lag_rest']; ?>;
				y = 0;
				//document.write("AA");
			}else if(<?php echo $_SESSION['spaceC_left'];?> == 1){
				//document.write("AA");
				x = 0;
				y = <?php echo $_SESSION['c_palt'] - $_SESSION['comp_rest']; ?>;

			}

			temp = yy;
			yy = xx;
			xx = temp;
			
			
				//document.write(cont);
			while (((cont+1) <= (contador + <?php echo $_SESSION['res']; ?>) && ((cont+1) <= <?php echo $_SESSION['n_obj']; ?>))) {
				//while(){
				//document.write(contador);
				//Desenhar as caixas
				ctx1.fillStyle = colors[  Math.floor((Math.random() * 3) + 1) ];  //Fill the color 
				ctx1.fillRect(x, y, xx , yy);  //Create box
				ctx1.beginPath();
				ctx1.lineWidth = "1";
				ctx1.rect(x, y, xx , yy);
				ctx1.stroke();

				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
				if ( ((x + xx) <= myCanvas.attributes[1].value) && (y + yy <= myCanvas.attributes[2].value )) {
					x += xx;
				}

				if ( (x + xx) > myCanvas.attributes[1].value && (y + yy) <= myCanvas.attributes[2].value ) {
					x = <?php echo $_SESSION['l_palt'] - $_SESSION['lag_rest'] ?>;
					y += yy;				
				}
				if( (y + yy) > myCanvas.attributes[2].value ){
					break;
				}
				cont = cont + 1;
				contador = contador + 1;

			//}
			//cont = cont + 1;
		}
		
		</script>

	<div>
		<button onclick="mostraInformacoes('Pallet', 'info-pallet')">Dimensões</button>
		<p id="info-pallet"></p>
	</div>