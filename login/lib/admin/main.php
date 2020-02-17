<?php
    session_start();
    $sistema = "";
    $nivel = "";

    if(isset($_POST["submit"])){

        if(isset($_POST["sistema"])){
        $sistema = $_POST["sistema"];
        }

        $session = $_SESSION["usuario"];

        if (isset($session)) {
        
        $nivel = $_SESSION["usuario"][6];

            if ($sistema == $nivel) {

                echo "<script>javascript:window.location.replace('../../../../rotalight/painel/pages/user/painel.php');</script>";
            }else{
                echo "<script>javascript:window.location.replace('#');</script>";
            }
        }
    }

?>
