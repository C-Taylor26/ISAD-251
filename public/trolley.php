<?php
    include_once 'header.php';
    include_once 'footer.php';
    include_once 'dbConnection.php';

    session_start();
    //show products in session array
    for($i =0; $i < $_SESSION["Length"]; $i++ ){

    }
    echo $_SESSION["Length"];
?>


