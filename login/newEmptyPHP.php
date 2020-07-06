<?php

   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Fortaleza');
echo strftime('%A, %d de %B de %Y', strtotime('today'));
$codigo_excluir = 1;
    echo "<script>javascript:window.alert('".$codigo_excluir."');</script>";                
?>
<html>
    
 <head>
    <script>
$(function() {
    /* caixa-confirmacao representa a id onde o caixa de confirmação deve ser criada no html */
    $( "#caixa-confirmacao" ).dialog({
      resizable: false,
      height:140,

      /* 
       * Modal desativa os demais itens da tela, impossibilitando interação com eles,
       * forçando usuário a responder à pergunta da caixa de confirmação
       */ 
      modal: true,

      /* Os botões que você quer criar */
      buttons: {
        "Sim": function() {
          $( this ).dialog( "close" );
          alert("Você clicou em Sim!");
        },
        "Não": function() {
          $( this ).dialog( "close" );
          alert("Você clicou em Não");
        }
      }
      });
  });
    </script>
</head>    <body>
       <div  id="caixa-confirmacao" title="Quer testar isso?">
        
  <p>Uma mensagem qualquer para ilustrar.</p>
</div></body>
  
    </html>

