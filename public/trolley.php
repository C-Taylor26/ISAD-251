<?php
    include_once 'header.php';
    include_once 'dbConnection.php';

    if (!isset($_SESSION))
    {
        session_start();
    }

    if (isset($_POST['clearSession'])) {
        session_unset();
    }
?>
<html>
<head>
    <title>Your Trolley</title>
    <style>
            div.productCard {
                float: left;
                width: 100%;
                hight 300px;
                margin: 10px;
            }
            img {
                width: 200px;
                height: 200px;
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
?>
    <div>
        <div class="productCard" style="border: 1px solid;">
            <img src="../assets/img/Page-images/<?php echo $catagory ?>/<?php echo $name ?>.jpg">
            <p style="padding-left: 25px; float: left;"><?php echo $name?></p>
            <!-- Buttons for quanity and removal -->
        </div>

    </div>
    <form method="post">
        <input type="submit" name="clearSession" value="Clear Trolley Information"
    </form>
<?php }?>
</body>
</html>
