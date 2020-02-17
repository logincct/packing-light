<?php

    $nivel = "";
    $session = $_SESSION["usuario"];
    if (isset($session)) {
    
    $nivel = $_SESSION["usuario"][6];

	    if ($nivel != 0) {
	    	session_destroy();
	    	echo "<script>javascript:window.location.replace('../../index.php');</script>";
	    }
   	}

?>
