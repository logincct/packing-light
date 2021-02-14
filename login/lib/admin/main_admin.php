<?php
    session_start();
    $sistema = "";
    $nivel = "";
    $_SESSION["check"] = 1;
     $retorno = "0rebeca";
    if(isset($_POST["submit"])){

        if(isset($_POST["sistema"])){
        $sistema = $_POST["sistema"];
        }

        $session = $_SESSION["admin"];

        if (isset($session)) {

            echo "<script>javascript:window.location.replace('../../../rotalight/index.php');</script>";

        }
    }
    if(isset($_POST["submit_pack"])){

        if(isset($_POST["sistema"])){
            $sistema = $_POST["sistema"];
        }

        $session = $_SESSION["admin"];

        if (isset($session)) {

            echo "<script>javascript:window.location.replace('../../../Packing_Light/index.php');</script>";

        }
    }

?>
