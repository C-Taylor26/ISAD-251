<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if (!isset($_SESSION["cartArray"]) or empty($_SESSION["cartArray"])){
        echo "NO ORDER HAS BEEN PACED as there are no items in your order, you will be redirected the memu page shortly...";
        header("Refresh: 3;  menus.php");
    }
    $orderEmail = $_POST["Email"];
    $orderTable = $_POST["Table"];

    $conn = getConnection();
    $conn ->query("CALL CreateOrder()")
    ?>

