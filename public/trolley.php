<?php
    include_once 'header.php';
    include_once 'dbConnection.php';

    if (!isset($_SESSION))
    {
        session_start();
    }
    //show products in session array
    var_dump($_SESSION);

    if (isset($_POST["clearSession"])){
        session_unset();
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction'])) {
        session_unset();
    }
?>
<html>
<head>
    <title>Your Trolley</title>
</head>
<body>
    <form method="post">
        <input type="submit" id="clearSession" value="Clear Trolley Information"
    </form>
</body>
</html>
