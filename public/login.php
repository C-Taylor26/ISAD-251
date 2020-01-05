<?php
    include_once 'dbConnection.php';
    include_once 'header.php';
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_POST["username"])){
        $username = $_POST["username"];
    }
    if(isset($_POST["password"])){
        $password = $_POST["password"];
    }

    if (isset($username) and $username == "admin"){
        if(isset($password) and $password == "pass"){
            //$blank = array();
            //$_SESSION["cartArray"] = $blank;
            unset($_SESSION["cartArray"]);
            $_SESSION["admin"] = true;
            header("Location: index.php");
        }
    }
?>
<HTML>
<head>
    <style>

    </style>
</head>

<body>
    <div style="text-align: center; vertical-align: middle"><br><br>
        <form action="login.php" method="post" enctype="multipart/form-data" >
            <input name="username" type="text" placeholder="username" required><br/><br/>
            <input name="password" type="password" placeholder="password" required><br/><br>
            <input name="login" type="submit" value="Login">
        </form>
    </div>
</body>

</HTML>
