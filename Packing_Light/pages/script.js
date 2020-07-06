function mostraInformacoes(myString, idBotao) {  // Printa o tamanho da canva.
	var x = document.getElementById( myString );
	var txt = "";
	txt = txt + "Largura do pallet: " + x.attributes[1].value + "<br>";
	txt = txt + "Comprimento do pallet: " + x.attributes[2].value + "<br>";
	document.getElementById( idBotao ).innerHTML = txt;
}