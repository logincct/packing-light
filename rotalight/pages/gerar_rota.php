<?php require_once("../lib/gerar_rota.php");?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RotaLight | Gerar rota</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../login/painel/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../login/painel/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../login/painel/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../login/painel/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../login/painel/dist/css/skins/_all-skins.min.css">
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" async=""></script>
  
  <link rel="stylesheet" href="../../login/painel/bower_components/bootstrap/dist/js/bootstrap.min.js">
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
      <a href="<?php if($_SESSION["check"] == 0) {echo '../../login/painel/pages/admin/main.php';}else{echo '../../login/painel/pages/admin/main_admin.php'; }?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>IN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LOGIN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Menu do usuário -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              <span class="hidden-xs"><?php if($_SESSION["check"] == 0) {echo $_SESSION["usuario"][0]; }else{echo $_SESSION["admin"][0]; }?></span>           
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../login/painel/dist/img/logo01.png" class="img-square" alt="User Image">
                
                <p>
                    <?php
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Fortaleza');
                        echo strftime('%A, %d de %B de %Y', strtotime('today'));
                    ?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu funcionalidades-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php if($_SESSION["check"] == 0) {echo '../../login/painel/pages/admin/alterar_usuario.php';}else{echo '../../login/painel/pages/admin/alterar_admin.php'; }?>" class="btn btn-default btn-flat">Editar dados</a>
                </div>
                <div class="pull-right">
                    <a href="../../login/lib/logout.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Painel usuario - superior esquerdo -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../login/painel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><span class="hidden-xs"><?php if($_SESSION["check"] == 0) {echo $_SESSION["usuario"][0]; }else{echo $_SESSION["admin"][0]; }?></span></p>
                    
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- MENU DE NAVEGAÇÃO PRINCIPAL -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGAÇÃO PRINCIPAL</li>
        
        <!--FUNCIONALIDADES DO USUÁRIO-->        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Menu do usuário</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="cadastro_clientes.php"><i class="fa fa-plus-square-o"></i> Cadastrar cliente</a></li>
              <li><a href="listar_clientes.php"><i class="fa fa-search"></i> Listar clientes</a></li>
              <li><a href="importar_dados.php"><i class="fa fa-upload"></i> Importar dados</a></li>
          </ul>
        </li>
        <!--GERAR ROTAS-->
        <li class="active">
            <a href="gerar_rota.php">
            <i class="fa fa-map-marker"></i> <span>Gerar rota</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gerar rota de entregas
        <small>Painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Gerar rota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <div class="row">
        <div class="container-fluid">
        
            
        <form id="formulario"  method="post" class="form-group"> 
            <div class="box-body">
            <label for="exampleInputFile">Informe o número de entregas desejadas:</label>
            </div>
            <div class="box-body">
            
            <input type="text" name="num_campos" id="campo" size="1" maxlength="2" style="width: 5%;height: 33px;padding-bottom: 3.5px" required/>

            <input type="button" id="button" class="btn btn-primary" value="Adicionar entregas" onclick="addCampos()" style="width: 15%">
            <input type="button" class="btn btn-primary" value="Remover entregas" onclick="removeCampos()" style="width: 15%">
            </div>
            
            <div id="selecao"></div>
            
            <br>
            <div class="box-body">
            <div id="hide">
            <!-- <input type="submit" id="submit" class="btn btn-block btn-success" value="Gerar rota" style="width: 10%"> -->
            </div>
            </div>
        
        </form>
        </div>
          
        <div class="col-xs-12">
          <!-- interactive chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">Mapa</h3>
              
            </div>
            <div class="box-body">
                
                <div id="site">
                <div id="mapa" style="height: 500px; width: 100%"></div>
                <!-- Elemento para exibição!-->
                </div>
                
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
          
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-info-circle"></i>

              <h3 class="box-title">Descrição da rota</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <dl>  
            <?php
                $tempo = 0;
                $horas = 0;
                $minutos = 0;
                if($tamanho_vetor != ""){
            
                    $tempo = $menor_tempo;
                    $horas = floor($tempo/3600);
                    $minutos = floor(($tempo - ($horas * 3600)) / 60);
                    echo "<dt>Distância total do percurso</dt>";
                    echo "<dd>".$menor_distancia." Km</dd>";
                    echo "<dt>Tempo estimado do percurso (SEM CONSIDERAR TEMPO DE PARADA)</dt>";
                    echo $horas." h:".$minutos." min";
                    echo "<dt>Endereço de partida</dt>";
                    echo $vetor3[0]." (Cliente: ".$vetor4[0].")";
                    for($i = 1; $i < $tamanho_vetor; $i++){
                        echo "<dt>Entrega ".$i."</dt>";
                        echo "<dd>".$vetor3[$i]." (Cliente: ".$vetor4[$i].")</dd>";
                    }
                    echo "<dt>Endereço de chegada</dt>";
                    echo $vetor3[$tamanho_vetor]." (Cliente: ".$vetor4[$tamanho_vetor].")";
                }
            ?>
             </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
        
    <script type="text/javascript"> 
        document.getElementById("button").addEventListener("click", displayDate);

        function displayDate() {
          var campo = document.getElementById("campo").value;
          if (campo != ''){
          document.getElementById("hide").innerHTML = "<input type='submit' class='btn btn-block btn-success' value='Gerar rota' style='width: 10%'>";
          }else{
            window.alert("Digite o nº de entregas desejadas");
          }
        }
        function addCampos(){
        contador=0;
        var qtdeCampos = document.getElementById("campo").value;
        contador++;
		
            for(i=0; i<qtdeCampos; i++){
                    
                var objPai = document.getElementById("selecao");
                    //Criando o elemento DIV;
                var objFilho = document.createElement("div");
                    //Definindo atributos ao objFilho1:
                objFilho.setAttribute("id","campo"+(i+1));
                    //Inserindo o elemento no pai:
                objPai.appendChild(objFilho);
                    //Escrevendo algo no filho recém-criado:
                document.getElementById("campo"+(i+1)).innerHTML = "<div class = 'box-body'><select required class='form-control select2' style = 'width:25%' name='campo"+(i+1)+"' id='campo"+(i+1)+"'><option value=''></option><?php while ($row = mysqli_fetch_assoc($listar)) { ?><option value='<?php echo $row['nome'];?>'><?php echo $row['nome']."    ";?></option><?php } ?></select></div><br>";
            }
	
        }
        
          
        

        function removeCampos(){
    
            document.getElementById('selecao').innerHTML = '';
            document.getElementById('campo').value = '';
        }
    </script>
        
    <script src="../../login/painel/pages/jquery.min.js"></script>
  
    <!-- Maps API Javascript -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB_5m8j9wmVLFhL-qjT71zJ6II-4DZ4T7s&amp;sensor=false"></script>
 
    <!--Inicia o mapa -->
   
    <script>
        var map;
        var lat;
        var directionsDisplay; // Instanciaremos ele mais tarde, que será o nosso google.maps.DirectionsRenderer
        var directionsService = new google.maps.DirectionsService();
//         function initMap(){
//           directionsDisplay = new google.maps.DirectionsRenderer(); // Instanciando...
//             var latlng = new google.maps.LatLng(-3.71839,  -38.5434);
//             var options = {
//                 zoom: 5,
//                 center: latlng,
//                 mapTypeId: google.maps.MapTypeId.ROADMAP
//             };
//         var image = 'http://rotalight.000webhostapp.com/painel/pages/image/map.png';
//         map = new google.maps.Map(document.getElementById("mapa"), options);
//         directionsDisplay.setMap(map); 
//                   if (navigator.geolocation) { // Se o navegador do usuário tem suporte ao Geolocation
//             navigator.geolocation.getCurrentPosition(function(){
//               var pega = document.getElementById("pega");
//               var form = document.getElementById("formulario");
//               form.addEventListener('submit', function() {

//     var pegas = pega.value;
//     var lat=pegas.coords.latitude;
//   var lon=pegas.coords.longitude;
//   var latlon= new google.maps.LatLng(lat, lon);
//       var marker = new google.maps.Marker({
//         position: latlon,
//         map: map,
//         icon: image
//       });
// });
              
//     });
//       }
//     }
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
        //directionsDisplay.setPanel(document.getElementById("trajeto-texto")); // Aqui faço a definição
        
        if (navigator.geolocation) { // Se o navegador do usuário tem suporte ao Geolocation
            navigator.geolocation.getCurrentPosition(function (position) {
                
                pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); // Com a latitude e longitude que retornam do Geolocation, criamos um LatLng
                
   
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
        }

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
                directionsDisplay.setDirections(result); 
              var leg = result.routes[0].legs[0];
                // makeMarker(leg.start_location, 'AQUI', map);
              //   directionsDisplay.setOptions({ 
              //   suppressMarkers: true
              // });
                
                makeMarker(leg.start_location,'Você está aqui', icons.start, map);// Renderizamos no mapa o resultado
            }
        });
        
         function makeMarker(position, label, icon, map) {
         new google.maps.Marker({
             position: position,
             label: {text:label,
             color: "#ea4335",
             fontSize: "16px",
             fontWeight: "bold"
             },
             icon: icon,
             map: map
             
           });              
         }

    var icons = {
        start: new google.maps.MarkerImage(
        // URL
        'https://young-reaches-96950.herokuapp.com/login/painel/pages/image/map.png',
        // (width,height)
        new google.maps.Size(44, 32),
        // The origin point (x,y)
        new google.maps.Point(40, 40),
        // The anchor point (x,y)
        new google.maps.Point(20, 70)),
        end: new google.maps.MarkerImage(
        // URL
        'https://young-reaches-96950.herokuapp.com/login/painel/pages/image/map1.png',
        // (width,height)
        new google.maps.Size(44, 32),
        // The origin point (x,y)
        new google.maps.Point(0, 0),
        // The anchor point (x,y)
        new google.maps.Point(22, 32))
    };
    

    </script>    
    
    </div>
</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?>.</strong> Todos Os Direitos Reservados
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../login/painel/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../login/painel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../login/painel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../login/painel/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../login/painel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../login/painel/dist/js/demo.js"></script>
</body>
</html>
