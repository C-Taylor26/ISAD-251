<?php
    session_start();
    unset($_SESSION["cartArray"]);
    echo "Your request has been fulfilled, you will be redirected shorty...";
    header("Location: trolley.php")
?>


