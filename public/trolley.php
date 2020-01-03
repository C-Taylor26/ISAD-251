<?php
    include_once 'header.php';
    include_once 'dbConnection.php';

    if (!isset($_SESSION))
    {
        session_start();
    }
    if (!isset($cart))
    {
        $cart = array();
    }
    if (!isset($_SESSION["cartArray"]))
    {
        $_SESSION["cartArray"] = $cart;
    }
    if (isset($_POST['clearSession'])) {
        session_unset();
    }
    var_dump($_SESSION["cartArray"]);


?>
<html>
<head>
    <title>Your Trolley</title>
    <style>
            div.productCard {
                float: left;
                width: 90%;
                hight 300px;
                margin: 10px;
            }
            img {
                width: 200px;
                height: 200px;
                float: left;
            }
            p{
                padding-left: 25px;
            }
    </style>
</head>
<body>
<?php
    $table = "items";
    $result = getTable($table);

    while($row = $result->fetch_assoc()) {

    $catagory = $row["it_Catagory"];
    $name = $row["it_Name"];
    //check what variables exist within the session array.
    $cart = $_SESSION["cartArray"];
    if(isset($cart[$row["it_ID"]]))
    {
        $qty = $cart[$row["it_ID"]];
        $total = $qty * $row["it_Price"];
        ?>
        <div>
            <div class="productCard" style="border: 1px solid;">
                <div style="width: 50%; float: left" >
                    <img src="../assets/img/Page-images/<?php echo $catagory ?>/<?php echo $name ?>.jpg">
                    <p><?php echo $name?></p>
                    <p> <br><?php echo $row["it_Description"]?></p>
                </div>
                <div style="float: left; padding-right: 25px">
                    <p><?php echo "Cost - £" .$row["it_Price"]?></p>
                    <p><br><?php echo "Quantity - " .$qty?></p>
                    <p><br><?php echo "Total - £" .$total?></p>
                </div>
                <!-- Buttons for quanity and removal -->
            </div>

        </div>

    <?php }}?>


    <form action="sessionUnset.php"method="post">
        <input type="submit" name="clearSession" value="Clear Trolley Information">
    </form>
</body>
</html>
