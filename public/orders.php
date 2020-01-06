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
            <label for="tableNo">Table Number</label>
            <input type="text" name="tableNo" placeholder="Table #">
            <input type="submit" name="findOrders" value="Search Orders">
        </form>
<?php   }

    if (isset($_POST["tableNo"]))
    {

        $tableNo = $_POST["tableNo"];

        $conn = getConnection();
        $orders = $conn->query("CALL displayOrders($tableNo);");
        while($row = $orders->fetch_assoc()) {
            //looping through each order that is against that table
            $id = $row["od_ID"];
            ?>
            <div class="orderCard">
                <h3><?php echo "Order ID: " . $id?></h3>
                <?php
                    // inner loop required to get each line of each order
                    $orderLines = $conn->query("CALL DisplayOrderLine($id);");
                    while($lineRow = $orderLines->fetch_assoc()) {
                        //get item info using
                        $itemID = $lineRow["it_ID"];
                        $item = $conn ->query("CALL findItem($itemID);");
                        //show price + qty + total
                        $total = $item["it_Price"] * $lineRow["it_Quantity"];
                        echo nl2br($item["it_Name"] ."\n£".$item["it_Price"] ." --- ".$lineRow["it_Quantity"] . " --- " . $total .
                        \n . $row["od_Total"]);

                    }

        }
        //create div card


        //show order information

        //show order line information
    }
    $conn ->close();

?>

</body>
</html>