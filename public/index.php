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
    <style>
        h1 {
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Welcome to the Happy Chappy</h1>
    <h2>View our great range of products!</h2>
    <br><p>Space for pub information</p>
</body>
</html>
