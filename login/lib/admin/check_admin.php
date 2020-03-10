<?php

    $nivel = "";
    $session = $_SESSION["admin"];
    $_SESSION["check"] == 1;

    if (isset($session)) {
    
    $nivel = $_SESSION["admin"][6];

	if(isset($nivel)){
		    if (($nivel != 1) && ($nivel == 0) && ($nivel == 10) && ($nivel == 11) && ($nivel == 12)) {
		    	session_destroy();
		    	echo "<script>javascript:window.location.replace('../../../../index.php');</script>";
		    }
		}else{
				session_destroy();
		    	echo "<script>javascript:window.location.replace('../../../../index.php');</script>";

		}   
   	}

?>
