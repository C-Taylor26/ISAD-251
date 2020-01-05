<?php
    include_once 'dbConnection.php';
    if(!isset($_SESSION)){
        session_start();
    }
    if (!isset($_SESSION["cartArray"]) or empty($_SESSION["cartArray"])){
        echo "NO ORDER HAS BEEN PACED as there are no items in your order, you will be redirected the memu page shortly...";
        header("Refresh: 3;  menus.php");
    }
    $orderEmail = $_POST["Email"];
    $orderEmail = urlencode($orderEmail);
    echo $orderEmail;
    $orderTable = $_POST["Table"];
    $orderTotal = $_SESSION["Total"];

    $conn = getConnection();
    //$conn ->query("CALL CreateOrder($orderEmail, $orderTable, $orderTotal)");
    if (!$conn->multi_query("CALL CreateOrder($orderEmail, $orderTable, $orderTotal)")) {
        echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
    }
    else{
        echo "You order has been placed. You will be redirected shortly";
    }
    //header("Refresh: 3; menus.php")
    ?>

