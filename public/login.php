<?php
    include_once 'dbConnection.php';

?>
<HTML>
<head>
    <style>

    </style>
</head>

<body>
    <form action="login.php" method="post" enctype="multipart/form-data">
        <input name="username" type="text"><br/><br/>
        <input name="password" type="password"><br/>
        <input name="login" type="submit" value="Login">
    </form>
</body>

</HTML>
