<?php
    include_once 'header.php';
    include_once 'dbConnection.php';

    if(!isset($cartItems)){
        $cartItems = array();
    }

    if (!isset($_SESSION)){
        session_start();
    }
    if (!isset($_SESSION["cartArray"])){
        $_SESSION["cartArray"] = $cartItems;
    }

    $uri = $_SERVER['REQUEST_URI'];
    $ID = substr($uri, 27, 1);
    $ID = (int)$ID;
    if ($ID != 0)
    {
        $cartItems = $_SESSION["cartArray"];
        if (isset($cartItems[$ID]))
        {
            $cartItems[$ID] = $cartItems[$ID] + 1;
        }
        else
        {
            $cartItems[$ID] = 1;
        }
        $_SESSION["cartArray"] = $cartItems;
    }
    var_dump($_SESSION["cartArray"]);
?>
<HTML>
<head>
    <title>Menus</title>
    <style>
        div.productCard {
            border-style: solid;
            border: #111111;
            float: left;
            width: 250px;
            height: 400px;
            padding 0px;
            margin: 10px;
        }
        img {
            width: 250px;
            height: 250px;
        }
        p {
            font-size: 15px;
        }
        .addButton {
            float: right;
            padding-right: 25px;
        }

    </style>
</head>

<body>
    <div class ="optionsBar">
        <select name="filter" style="margin: 10px">
            <option>All</option>
            <option>Soft Drinks</option>
            <option>On Tap</option>
            <option>Hot Drinks</option>
        </select>
    </div>
    <?php
    $table = "items";
    $result = getTable($table);
    while($row = $result->fetch_assoc()) {


        $catagory = $row["it_Catagory"];
        $name = $row["it_Name"];
        ?>
        <div style="padding: 10px; float: left;">
            <div class="productCard" style="border: 1px solid;">
                <img src="../assets/img/Page-images/<?php echo $catagory ?>/<?php echo $name ?>.jpg">
                <p style="padding-left: 25px; float: left;"><?php echo $name?></p>
                <p style="padding: 0px 25px 0px 25px; float: right;">£<?php echo $row["it_Price"] ?></p>
                <div style="padding-top: 50px;">
                    <form>
                        <input type="submit" name="<?php echo $row["it_ID"] ?>" class="addButton" value="Add">
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</body>

</HTML>
