<?php
include_once 'header.php';
include_once 'dbConnection.php';

    if (!isset($_SESSION)){
        session_start();
    }
?>
<html>
<head>
    <title>Orders</title>
    <style>
        div.orderCard {
            border-style: solid;
            border: #111111;
            float: left;
            width: 300px;
            padding 0px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_SESSION["admin"]) and $_SESSION["admin"] ==1)
    {
        echo "admin";
    }
    else{
    //normal users -> request table number to display those orders
    ?>
        <form action="orders.php" method="post" style="margin: 10px">
            <label for="orderNo">Order Number</label>
            <input type="text" name="orderNo" placeholder="Order #">
            <input type="submit" name="findOrders" value="Search Orders">
        </form>
<?php   }

    if (isset($_POST["orderNo"]))
    {

        $orderNo = $_POST["orderNo"];

        $conn = getConnection();
        $conn2 = getConnection();

        $orders = $conn->query("CALL ordersView($orderNo);");
        $orderTotal = $conn2 ->query("GetOrderTotal($orderNo);");

        $total = $orderTotal ->fetch_assoc();
        var_dump($total);
        echo "Order Number: " . $orderNo;

        while($row = $orders->fetch_assoc()) {
            echo "Item ID: ". $row["it_ID"]." --- "."Qty: " .$row["ol_Quantity"];
        }
        echo "Order total: £" . $orderTotal;
        //create div card


        //show order information

        //show order line information
        $conn ->close();
        $conn2 ->close();
    }


?>

</body>
</html>