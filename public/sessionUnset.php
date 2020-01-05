<?php
    session_start();
    session_unset();
    echo "Your request has been fulfilled, you will be redirected shorty...";
    header("Location: trolley.php")
?>

<
