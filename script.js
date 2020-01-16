function mostraInformacoes(myString) {  // Printa o tamanho do pallet abaixo do PreviousCanvas
	var x = document.getElementById(myString);
	var txt = "";
	var i;
	for (i = 0; i < x.attributes.length; i++) {
		txt = txt + x.attributes[i].name + " = " + x.attributes[i].value + "<br>";
	}
	document.getElementById("demo").innerHTML = txt;
}