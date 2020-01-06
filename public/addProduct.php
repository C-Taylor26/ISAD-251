<?php
    include_once 'header.php';
    include_once 'dbConnection.php';
    if (!isset($_SESSION)){
        session_start();
        header("Location: menus.php");
    }
    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] ==0)
    {
        header("Location: menus.php");
    }

    if(isset($_POST["name"])){
        $name = ($_POST["name"]);
        $description = ($_POST["description"]);
        $price = trim($_POST["price"], " £$");
        $price = (float)$price;
        $category = trim($_POST["category"]);
        $conn = getConnection();
        if (!$conn->query("CALL AddProduct('$name', '$description', $price, '$category');")) {
            echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
        }
        else{
            echo "The new item '$name', has been added!\n";
        }

    }
?>

<html>
<head>

</head>

<body>
<div>
    <form action="addProduct.php" method="post" style="margin-top: 20px; text-align: center">
        <input type="text" placeholder="Name" name="name" required>
        <input type="text" placeholder="Description" name="description" required>
        <input type="text" placeholder="Price" name="price" required>
        <input type="text" placeholder="Category" name="category" required>
        <input type="submit" value="Add" style="float: right; width: 20%; margin-right: 10px">
    </form>
</div>
</body>
</html>
