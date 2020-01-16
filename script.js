function mostraInformacoes(myString, idBotao) {  // Exibe as informações do pallet abaixo dele.
	var x = document.getElementById(myString);
	var txt = "";
	var i;
	for (i = 0; i < x.attributes.length; i++) {
		txt = txt + x.attributes[i].name + " = " + x.attributes[i].value + "<br>";
	}
	document.getElementById(idBotao).innerHTML = txt;
}