<?php 

  if(!isset($_SESSION)){
    session_start();  
  }

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PackingLight</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../login/painel/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../../login/painel/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../../login/painel/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../../../login/painel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="../script.js"></script>
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
      <a href="<?php if($_SESSION["check"] == 0) {echo '../../../../login/painel/pages/admin/main.php';}else{echo '../../../../login/painel/pages/admin/main_admin.php'; }?>" class="logo">
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
                <img src="../../../../login/painel/dist/img/logo01.png" class="img-square" alt="User Image">
                
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
                  <?php if($_SESSION["check"] == 0) { ?>
                  <a href="../../../../login/painel/pages/admin/alterar_usuario.php" class="btn btn-default btn-flat">Editar dados</a>
                  <?php }else{ ?>
                  <a href="../../../../login/painel/pages/admin/alterar_admin.php" class="btn btn-default btn-flat">Editar dados</a>
                  <?php } ?>                  
                </div>
                <div class="pull-right">
                    <a href="../../../../login/lib/logout.php" class="btn btn-default btn-flat">Sair</a>
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
              <li class="active"><a href="../user/cadastrar_objeto.php"><i class="fa fa-plus-square-o"></i> Cadastrar objeto</a></li>
              <li class="active"><a href="../user/listar_objeto.php"><i class="fa fa-search"></i> Listar objeto</a></li>
          </ul>
        </li>
        <li class="active">
          <a href="../user/buscar_objeto.php">
          <i class="fa fa-dropbox"></i> <span>Gerar objeto</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- PARTE CENTRAL DO SITE -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="display: inline-block;"><a href="../../../index.php">PackingLight -</a></h1>
      <h1 style="display: inline-block;"><a href="../user/2D.php">2D</a></h1>
    </section>

    <!-- Painel para COLOCAR O MAPA QUANDO ESTIVER PRONTO -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="register-box" style="width: 700px">
        <div class="register-box-body" style="text-align: center;">

          <div id="canvas-field">
            <h2>Apresentando resultado dos cálculos:</h2>
            <canvas id="Pallet" width=" <?php echo $_SESSION['larguraPallet']; ?> " height=" <?php echo $_SESSION['comprimentoPallet']; ?> " style="border:1px solid #000000; margin: 2%;"></canvas>
          </div>

          <div align="center" class="canvas-info" style=" padding-top: 4%; padding-bottom: 4% ;padding-left: 13%; padding-right: 13% ;text-align: left; ">
            <p>Podem ser colocadas <?php echo $_SESSION['res']; ?> caixas.</p>
            <p>As caixas ocupam aproximadamente <?php echo $_SESSION['reg_resultado'] ?>% da área do pallet.</p>
          </div>

          <form method="POST" action="../../../lib/cadastra_objetos.php">
            <div  style=" position: relative; text-align: right;  /* margin-left: 1% ;margin-right: 1% ;*/ ">
                
                
                <button class="btn btn-primary btn-flat" type="submit" name="salva_objeto" >Salvar objeto</button>

                <a class="btn btn-primary btn-flat" href="../user/buscar_objeto.php" >Voltar</a>


<!--                </div>
            </div>

            <div class="col-xs-4" style="width: 20%;float:right">
              <a href="../../../lib/cadastra_objetos.php" class="btn btn-primary btn-block btn-flat">Salvar objeto</a>
              <a href="../user/buscar_objeto.php"><button type="submit" class="btn btn-primary btn-block btn-flat">Voltar</button></a>
            </div> -->

            </div>
          </form>

        </div> 
        </div>
    </section>
  </div>

  		<script>
  			color = "#3c8dbc";

  			var myCanvas = document.getElementById("Pallet");  //Select canvas element in the page
  			var ctx1 = myCanvas.getContext("2d");  //Built-in object

  			var numeroItens = <?php echo $_SESSION['numeroItens']?>;
        var larguraPallet = <?php echo $_SESSION['larguraPallet']; ?>;
        var comprimentoPallet = <?php echo $_SESSION['comprimentoPallet']; ?>;
  			var larguraItem = <?php echo $_SESSION['larguraItem']; ?>;  //larguraItem é a largura do objeto
  			var comprimentoItem = <?php echo $_SESSION['comprimentoItem']; ?>;  //comprimentoItem é o comprimento do objeto

        var x = 0;
  			var y = 0;
  			
        var cont = 1; //Contador para quantidade de caixas colocadas do pallet
  			var temp;
  			var contador = 1;

  			//Enquanto o número de caixas colocadas for menor que o número de objetos
  			while ( cont <= <?php echo $_SESSION['res']; ?> && cont <= <?php echo $_SESSION['numeroItens']; ?> ) {

  				//Desenhar as caixas
  				ctx1.fillStyle = color;  //Fill the color 
  				ctx1.fillRect(x, y, larguraItem , comprimentoItem);  //Create box
  				ctx1.beginPath();
  				ctx1.lineWidth = "1";
  				ctx1.rect(x, y, larguraItem , comprimentoItem);
  				ctx1.stroke();

  				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
  				if ( ((x + larguraItem) <= larguraPallet) && (y + comprimentoItem <= comprimentoPallet )) {
  					x += larguraItem;
  				}

  				if ( (x + larguraItem) > larguraPallet && (y + comprimentoItem) <= comprimentoPallet ) {
  					x = 0;
  					y += comprimentoItem;				
  				}
  				if( (y + comprimentoItem) > comprimentoPallet ){
  					break;
  				}


  				cont = cont + 1;
  				numeroItens -= 1;

  			}

  			if(<?php echo $_SESSION['espaçoCaixaLargura'];?> == 1){

  				x = <?php echo $_SESSION['larguraPallet'] - $_SESSION['larguraRestantePallet']; ?>;
  				y = 0;
  			}else if(<?php echo $_SESSION['espaçoCaixaComprimento'];?> == 1){
  				x = 0;
  				y = <?php echo $_SESSION['comprimentoPallet'] - $_SESSION['comprimentoRestantePallet']; ?>;

  			}else{

  			}

  			temp = comprimentoItem;
  			comprimentoItem = larguraItem;
  			larguraItem = temp;
  			
  			
  			while (<?php echo $_SESSION['espaçoRestante']; ?> ==1 && ((cont+1) <= (contador + <?php echo $_SESSION['res']; ?>) && ((cont+1) <= <?php echo $_SESSION['numeroItens']; ?>))) {
  				//Desenhar as caixas
  				ctx1.fillStyle = color;  //Fill the color 
  				ctx1.fillRect(x, y, larguraItem , comprimentoItem);  //Create box
  				ctx1.beginPath();
  				ctx1.lineWidth = "1";
  				ctx1.rect(x, y, larguraItem , comprimentoItem);
  				ctx1.stroke();

  				//Verifica se a caixa cabe e muda o X e o Y que não as coordenadas para as próximas caixas
  				if ( ((x + larguraItem) <= larguraPallet) && (y + comprimentoItem <= comprimentoPallet )) {
  					x += larguraItem;
  				}

  				if ( (x + larguraItem) > larguraPallet && (y + comprimentoItem) <= comprimentoPallet ) {
  					x = <?php echo $_SESSION['larguraPallet'] - $_SESSION['larguraRestantePallet'] ?>;
  					y += comprimentoItem;				
  				}
  				if( (y + comprimentoItem) > comprimentoPallet ){
  					break;
  				}
  				cont = cont + 1;
  				contador = contador + 1;
  		  }
  		
  		</script>

    </section>
    <!-- /.content -->
  </div>
  <!-- Rodapé -->
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
<script src="../../../../login/painel/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../../login/painel/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../../login/painel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../../../login/painel/bower_components/raphael/raphael.min.js"></script>
<script src="../../../../login/painel/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../../../login/painel/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../../../login/painel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../../../login/painel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../../login/painel/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../../login/painel/bower_components/moment/min/moment.min.js"></script>
<script src="../../../../login/painel/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../../../login/painel/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../../../login/painel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../../../login/painel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../../login/painel/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../../login/painel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../../login/painel/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../../login/painel/dist/js/demo.js"></script>
</body>
</html>

