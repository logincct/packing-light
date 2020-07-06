<?php

    session_start();

    session_destroy();
    
    echo "<script>javascript:window.location.replace('../../index.php');</script>";
?>
