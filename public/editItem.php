<?php
    include_once 'dbConnection.php';
    if (!isset($_SESSION)){
        session_start();
        header("Location: menus.php");
    }
    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] ==0)
    {
        header("Location: menus.php");
    }
    //capture POST for item name.

    if(isset($_POST['name'])){
        $name = ($_POST["name"]);
        $description = ($_POST["description"]);
        $price = trim($_POST["price"], " £$");
        $price = (float)$price;
        $category = trim($_POST["category"]);
        $item = $_POST["item"];
        $conn = getConnection();
        if (!$conn->query("CALL EditItem($item, '$name', '$description', $price, '$category');")) {
            echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
        }
        else{
            echo "The item '$name', has been changed!\n";
        }
    }
    echo "You will be redirected shortly...";
    header("Refresh: 3; menus.php");

    //edit product procedure using post values
