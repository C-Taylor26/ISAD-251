<?php
    include_once 'header.php';
    include_once 'dbConnection.php';

?>



<HTML>
<head>

    <style>
        form {
            text-align: center;
            float: none;
        }
        h2 {
            text-align: center;
        }
    </style>

</head>

<body>
    <h2>Please enter your username and password</h2>
    <form action="login.php" method="post" enctype="multipart/form-data">
        <input name="username" type="text"><br/><br/>
        <input name="password" type="password"><br/><br/>
        <input name="login" type="submit" value="Login">
    </form>
</body>

</HTML>
