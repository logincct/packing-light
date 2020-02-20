<?php session_start(); ?>

	<script src="../script.js"></script>

	<canvas id="Pallet" width=" <?php echo $_SESSION['larguraPallet']; ?> " height=" <?php echo $_SESSION['comprimentoPallet']; ?> " style="border:1px solid #000000;"></canvas>

		<script>
			colors = ["#023ff7", "#f70202", "#f7f302", "#0af702"]

			var myCanvas = document.getElementById("Pallet");  //Select canvas element in the page
			var ctx1 = myCanvas.getContext("2d");  //Built-in object

			var num_obj = <?php echo $_SESSION['numeroItens']?>;
			var x = 0;
			var y = 0;
			var lag_obj = 0;
			var comp_obj = 0;
			var cont = 1; //Contador para quantidade de caixas colocadas do pallet
			var temp;
			var contador = 1;

				lag_obj = <?php echo $_SESSION['larguraItem']; ?>;  //lag_obj é a largura do objeto
				comp_obj = <?php echo $_SESSION['comprimentoItem']; ?>;  //comp_obj é o comprimento do objeto


			//Enquanto o número de caixas colocadas for menor que o número de objetos
			while ( cont <= <?php echo $_SESSION['res']; ?> && cont <= <?php echo $_SESSION['numeroItens']; ?> ) {

				//Desenhar as caixas
				ctx1.fillStyle = colors[  Math.floor( (Math.random() * 3) + 1) ];  //Fill the color 
				ctx1.fillRect(x, y, lag_obj , comp_obj);  //Create box
				ctx1.beginPath();
				ctx1.lineWidth = "1";
				ctx1.rect(x, y, lag_obj , comp_obj);
				ctx1.stroke();

				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
				if ( ((x + lag_obj) <= myCanvas.attributes[1].value) && (y + comp_obj <= myCanvas.attributes[2].value )) {
					x += lag_obj;
				}

				if ( (x + lag_obj) > myCanvas.attributes[1].value && (y + comp_obj) <= myCanvas.attributes[2].value ) {
					x = 0;
					y += comp_obj;				
				}
				if( (y + comp_obj) > myCanvas.attributes[2].value ){
					break;
				}


				cont = cont + 1;
				num_obj -= 1;

			}

			//document.write(cont);
			if(<?php echo $_SESSION['espaçoCaixaLargura'];?> == 1){

				x = <?php echo $_SESSION['larguraPallet'] - $_SESSION['larguraRestantePallet']; ?>;
				y = 0;
				//document.write("AA");
			}else if(<?php echo $_SESSION['espaçoCaixaComprimento'];?> == 1){
				//document.write("AA");
				x = 0;
				y = <?php echo $_SESSION['comprimentoPallet'] - $_SESSION['comprimentoRestantePallet']; ?>;

			}else{

			}

			temp = comp_obj;
			comp_obj = lag_obj;
			lag_obj = temp;
			
			
				//document.write(cont);
			while (<?php echo $_SESSION['espaçoRestante']; ?> ==1 && ((cont+1) <= (contador + <?php echo $_SESSION['res']; ?>) && ((cont+1) <= <?php echo $_SESSION['numeroItens']; ?>))) {
				//while(){
				//document.write(contador);
				//Desenhar as caixas
				ctx1.fillStyle = colors[  Math.floor((Math.random() * 3) + 1) ];  //Fill the color 
				ctx1.fillRect(x, y, lag_obj , comp_obj);  //Create box
				ctx1.beginPath();
				ctx1.lineWidth = "1";
				ctx1.rect(x, y, lag_obj , comp_obj);
				ctx1.stroke();

				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
				if ( ((x + lag_obj) <= myCanvas.attributes[1].value) && (y + comp_obj <= myCanvas.attributes[2].value )) {
					x += lag_obj;
				}

				if ( (x + lag_obj) > myCanvas.attributes[1].value && (y + comp_obj) <= myCanvas.attributes[2].value ) {
					x = <?php echo $_SESSION['larguraPallet'] - $_SESSION['larguraRestantePallet'] ?>;
					y += comp_obj;				
				}
				if( (y + comp_obj) > myCanvas.attributes[2].value ){
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