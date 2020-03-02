<?php
    session_start();
    $sistema = "";
    $nivel = "";

    if(isset($_POST["submit"])){

        if(isset($_POST["sistema"])){
        $sistema = $_POST["sistema"];
        }

        $session = $_SESSION["admin"];

        if (isset($session)) {
        
        $nivel = $_SESSION["admin"][6];

            if ($sistema == $nivel) {

                echo "<script>javascript:window.location.replace('../../../../rotalight/painel/pages/user/painel.php');</script>";
            }else{
                echo "<script>javascript:window.location.replace('../../painel/pages/admin/main_admin.php');</script>";
            }
        }
    }
    if(isset($_POST["submit_pack"])){

        if(isset($_POST["sistema"])){
        $sistema = $_POST["sistema"];
        }

        $session = $_SESSION["admin"];

        if (isset($session)) {
        
        $nivel = $_SESSION["admin"][6];

            if ($sistema == $nivel) {

                echo "<script>javascript:window.location.replace('../../../../Packing_Light/index.php');</script>";
            }else{
                echo "<script>javascript:window.location.replace('../../painel/pages/admin/main_admin.php');</script>";
            }
        }
    }

?>
