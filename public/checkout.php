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
    $orderEmail = trim($orderEmail, " ");
    $orderEmail = urlencode($orderEmail);

    $orderTable = $_POST["Table"];
    $orderTable = trim($orderTable, " ");

    $orderTotal = $_SESSION["Total"];
    /*

    $statement = connect()->prepare("CALL CreateOrder(:Email, :TableNo, :Total);");
    $statement->bindValue(':Email', $orderEmail, PDO::PARAM_IMT);
    $statement->bindValue(':TableNo', $orderTable, PDO::PARAM_INT);
    $statement->bindValue(':Total', $orderTotal, PDO::PARAM_NUM);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    */


    //$result = runProcedure("CALL CreateOrder($orderEmail, $orderTable, $orderTotal)");
    //$row = $result->fetch_assoc();
    //$name = $row["it_Name"];
    //echo $name;

//$conn ->query("CALL CreateOrder($orderEmail, $orderTable, $orderTotal)");
    $conn = getConnection();
    if (!$conn->query("CALL CreateOrder($orderTable, $orderTotal);")) {
        echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
    }
    else{
        //add specific data into orderline.
        //find order using table and total.
        $result = runProcedure("CALL findOrder($orderTotal, $orderTable)");
        $row = $result->fetch_assoc();
        $id = $row["od_ID"];
        //for each in cart array


        for ($i = 0; $i < count($_SESSION["itemIDs"]); $i++)
        {
            $item = $_SESSION["itemIDs"][$i];
            $qty = $_SESSION["quantities"][$i];
            if(!$conn->query("CALL OrderLine($id, $item, $qty);")){
                echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
            }

        }

            //take index
            //take index = value
            //call orderLine procedure(index, value)
        echo "Your order number is: $id. You will be redirected shortly";
        unset($_SESSION["cartArray"]);

    }
    $conn -> close();
    header("Refresh: 3; menus.php")
    ?>


