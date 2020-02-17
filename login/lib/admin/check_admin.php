<?php

    $nivel = "";
    $session = $_SESSION["admin"];
    if (isset($session)) {
    
    $nivel = $_SESSION["admin"][6];

	    if ($nivel == 0) {
	    	session_destroy();
	    	echo "<script>javascript:window.location.replace('../../../index.php');</script>";
	    }
   	}

?>
