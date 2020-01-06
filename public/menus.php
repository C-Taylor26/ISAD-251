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
    $admin = false;
    if (isset($_SESSION["admin"]) and $_SESSION["admin"] == 1){
        $admin = true;
    }
    if(isset($_SESSION["cartArray"][0]))
    {
        unset($_SESSION["cartArray"][0]);
    }




    $uri = $_SERVER['REQUEST_URI'];
    $ID = substr($uri, 27, 1);
    $ID2 = substr($uri, 28, 1);

    if($ID2 != "=")
    {
        $ID = $ID . $ID2;
    }

    $ID = (int)$ID;
    if ($ID != 0)
    {
        $cartItems = $_SESSION["cartArray"];
    }

    if (isset($cartItems[$ID]))
    {
        $cartItems[$ID] = $cartItems[$ID] + 1;
    }

    else{
        $cartItems[$ID] = 1;
    }
    $_SESSION["cartArray"] = $cartItems;

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
        .productCard img {
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
<!--
    <div class ="optionsBar">
        <select name="filter" style="margin: 10px">
            <option>All</option>
            <option>Soft Drinks</option>
            <option>On Tap</option>
            <option>Hot Drinks</option>
            <option>Cocktails</option>
        </select>
    </div>
    -->
<?php
    if ($admin == 1)
    {
        ?>
        <form action="addProduct.php" style="float: left; margin-left: 10px; width: 40%">
            <input type="submit" value="Add Product" name="addProduct" style="margin-top: 10px">
        </form>
        <form action="removeProduct.php" method="post" style="margin-right: 10px; float: right; width: 40%">
            <input type="text" placeholder="#" name="item" style="width: 20px">
            <input type="submit" value="Remove Product" name="removedProduct" style="margin-top: 10px">
        </form>
        <?php
    }
    $table = "items";
    $result = getTable($table);

    while($row = $result->fetch_assoc()) {
        $catagory = $row["it_Catagory"];
        $name = $row["it_Name"];
         if ($admin == 1){?>
             <div style="padding: 10px; float: left;">
                <div class="productCard" style="border: 1px solid;">
                    <img src="../assets/img/Page-images/<?php echo $catagory ?>/<?php echo $name ?>.jpg">
                    <div>
                        <form action="editItem.php" method="post">
                            <input type="text" name="name" value="<?php echo $name?>" style="margin-left: 10px; width: 100px">
                            <input type="text" name="price" value="£<?php echo $row["it_Price"] ?>" style=" float: right; margin-right: 10px; width: 100px">
                            <input style="float:left; margin-left: 10px; margin-top: 10px; width: 92%" type="text" name="description" value="<?php echo $row["it_Description"]?>">
                            <input style="float:left; margin-left: 10px; margin-top: 10px; width: 92%" type="text" name="category" value="<?php echo $row["it_Catagory"]?>">
                            <input style="float:left; margin-left: 10px; margin-top: 10px; width: 10%" type="text" name="item" value="<?php echo $row["it_ID"]?>" readonly>
                            <input style="float: right; margin: 10px" type="submit" name="<?php echo $row["it_ID"] ?>" class="addButton"
                                   value="Save Changes">
                        </form>
                    </div>
                </div>
            </div><?php
         }
         else{?>
             <div style="padding: 10px; float: left;">
                <div class="productCard" style="border: 1px solid;">
                    <img src="../assets/img/Page-images/<?php echo $catagory ?>/<?php echo $name ?>.jpg">
                    <p style="padding-left: 25px; float: left;"><?php echo $name?></p>
                    <p style="padding: 0px 25px 0px 25px; float: right;">£<?php echo $row["it_Price"] ?></p>
                    <div style="margin-top: 50px; margin-right: 25px">
                        <div style="">
                            <form>
                                <p style="padding-left: 25px; width: 95%"><?php echo $row["it_Description"]?></p>
                                <input type="submit" name="<?php echo $row["it_ID"] ?>" class="addButton"
                                       value="Add" style="float: left; margin-left: 25px">
                            </form>
                        </div>
                    </div>
                </div>
             </div><?php
         }
    }

?>

</body>

</HTML>
