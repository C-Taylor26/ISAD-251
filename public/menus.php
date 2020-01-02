<?php
    include_once 'header.php';
    include_once 'dbConnection.php';

    if(!isset($cartItems)){
        $cartItems = array();
    }

    if (!isset($_SESSION)){
        session_start();
    }

    $uri = $_SERVER['REQUEST_URI'];
    $ID = substr($uri, 27, 1);
    $ID = (int)$ID;
    if ($ID != 0)
    {
        $cartItems = $_SESSION["cartArray"];
        array_push($cartItems, $ID);
        $_SESSION["cartArray"] = $cartItems;
        /*
        $inCart = false;
        foreach ($cartItems as $item){
            if ($item == $ID){
                //break as it is already in the array. Just qty tht needs updating
                $inCart = true;
                break;
            }
        }
        if ($inCart == false){
            array_push($cartItems, $ID);
            $_SESSION["cartItems"] = $cartItems;
        }
        */
        /*
        else{
            $count = 0;
            foreach ($cartItems as $item){
                if ($item == $ID){
                    if ($cartQuantities[$count] == null){
                        $cartQuantities[$count] = 1;
                    }
                    else{
                        $cartQuantities[$count] = $cartQuantities[$count] + 1;
                    }
                }
                $count++;
            }
        }
        var_dump($cartQuantities);
        */
    }


    function addToCart($item){
        //check if item is already in array
        if ($_SESSION[$item] == 0){
            $_SESSION[$item] = 1;
        }
        else {
        }
    }
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
                <?php //$_SESSION[$row["it_ID"]] = 0?>

                <form>
                    <input type="submit" name="<?php echo $row["it_ID"] ?>" class="addButton" value="Add">
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</body>

</HTML>
