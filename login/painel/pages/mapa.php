<?php require_once("../../lib/gerar_rota.php"); ?>
<html>
    <script>
        var map;
        var directionsDisplay; // Instanciaremos ele mais tarde, que será o nosso google.maps.DirectionsRenderer
        var directionsService = new google.maps.DirectionsService();
 
    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer(); // Instanciando...
        var latlng = new google.maps.LatLng(-3.71839,  -38.5434);
 
        var options = {
            zoom: 5,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
    directionsDisplay.setMap(map); // Relacionamos o directionsDisplay com o mapa desejado
    directionsDisplay.setPanel(document.getElementById("trajeto-texto")); // Aqui faço a definição

    /*if (navigator.geolocation) { // Se o navegador do usuário tem suporte ao Geolocation
    navigator.geolocation.getCurrentPosition(function (position) {
 
    pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); // Com a latitude e longitude que retornam do Geolocation, criamos um LatLng
    map.setCenter(pontoPadrao);
   
    var geocoder = new google.maps.Geocoder();
   
    geocoder.geocode({ // Usando nosso velho amigo geocoder, passamos a latitude e longitude do geolocation, para pegarmos o endereço em formato de string
        "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
    },
      function(results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
            $("#txtEnderecoPartida").val(results[0].formatted_address);
         }
      });
   });
}*/

}
 
initialize();


      
    var i, vetor_melhor_rota, string_array,tamanho_vetor_mel_rota;
    //recebe a string com elementos separados, vindos do PHP
    string_array = "<?php echo $string_array; ?>";
    //transforma esta string em um array próprio do Javascript
    vetor_melhor_rota = string_array.split("|");

    tamanho_vetor_mel_rota = vetor_melhor_rota.length; 
    //varre o array só pra mostrar que tá tudo ok
    /*for (i in array_produtos)
    alert(array_produtos[i]);
    */
    //var enderecoPartida = "R. Érico Mota, 381 - Parquelândia, Fortaleza - CE, 60450-175";
    var enderecoPartida = vetor_melhor_rota[0];
    //var enderecoChegada = "R. Érico Mota, 381 - Parquelândia, Fortaleza - CE, 60450-175";
    var enderecoChegada = vetor_melhor_rota[tamanho_vetor_mel_rota - 1];
    //inserindo waypoints dinamicos
    //inicio a partir daqui --> 
    var waypts = [];//vetor waypoint
    var checkboxArray = [];//vetor auxiliar recebe enderecos
    //checkboxArray[0] = "Universidade Federal do Ceará-Campus do pici, Fortaleza";//atribuindo de forma bruta
   
    for(var i = 0; i < tamanho_vetor_mel_rota - 2; i++){
        checkboxArray[i] = vetor_melhor_rota[i+1];
    }
    //checkboxArray[0] = array_produtos[1];//atribuindo de forma bruta
    //checkboxArray[1] = "Unifor, Fortaleza";//aqui tbm
    //checkboxArray[1] = array_produtos[2];//aqui tbm
    //var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < tamanho_vetor_mel_rota - 2; i++) {
            //coloca no padrao p/ waypoint
            waypts.push({
              location: checkboxArray[i],
              stopover: true
            });
        }
    //ate aqui <--      
   
   var request = { // Novo objeto google.maps.DirectionsRequest, contendo:
      origin: enderecoPartida, // origem
      destination: enderecoChegada, // destino
      waypoints: waypts,//[{location: 'Universidade Federal do Ceará-Campus do pici, Fortaleza'},{location: 'Unifor, Fortaleza'}],
      travelMode: google.maps.TravelMode.DRIVING // meio de transporte, nesse caso, de carro
   };
 
   directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) { // Se deu tudo certo
         directionsDisplay.setDirections(result); // Renderizamos no mapa o resultado
      }
   });
</script>
</html>>