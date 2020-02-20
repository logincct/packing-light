function mostraInformacoes(myString, idBotao) {  // Printa o tamanho da canva.
	var x = document.getElementById( myString );
	var txt = "";
	var i;
	for (i = 0; i < ( x.attributes.length - 1 ); i++) {
		txt = txt + x.attributes[i].name + " = " + x.attributes[i].value + "<br>";
	}
	document.getElementById( idBotao ).innerHTML = txt;
}