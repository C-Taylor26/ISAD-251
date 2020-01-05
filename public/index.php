<?php
include_once 'header.php';
include_once 'dbConnection.php';
if (!isset($_SESSION)){
    session_start();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="../assets/css/design.css">
</head>
<body>

    <h1>Welcome to the Happy Chappy</h1>
    <h2>View our great range of products!</h2>

</body>
</html>
