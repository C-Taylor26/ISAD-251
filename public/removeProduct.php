<?php
include_once 'dbConnection.php';

    if (!isset($_SESSION)){
        session_start();
        //header("Location: menus.php");
    }
    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] ==0)
    {
        header("Location: menus.php");
    }

    if(isset($_POST['item'])) {
        $item = trim(($_POST["item"]));
        $conn = getConnection();
        if (!$conn->query("CALL RemoveItem($item);")) {
            echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
        }
        else{
            echo "The item ID: '$item', has been removed.";
        }
    }
    echo "You will be redirected shortly...";
    header("Refresh: 3; menus.php");