<?php

    $nivel = "";
    $session = $_SESSION["usuario"];
    $_SESSION["check"] == 0;
    if (isset($session)) {
    
    $nivel = $_SESSION["usuario"][6];
	    if(isset($nivel)){
		    if (($nivel == 1) && ($nivel != 0) && ($nivel != 10) && ($nivel != 11) && ($nivel != 12)) {
		    	session_destroy();
		    	echo "<script>javascript:window.location.replace('../../../../index.php');</script>";
		    }
		}else{
				session_destroy();
		    	echo "<script>javascript:window.location.replace('../../../../index.php');</script>";

		}   
   	}

?>
