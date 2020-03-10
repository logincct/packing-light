<?php

    $nivel = "";
    $session = $_SESSION["check"];
    if (isset($session)) {
    
    $nivel = $_SESSION["admin"][6];

	    if ($nivel != 1) {
	    	session_destroy();
	    	echo "<script>javascript:window.location.replace('../../index.php');</script>";
	    }
   	}

?>
