<?php
include_once 'header.php';
include_once 'footer.php';
include_once 'dbConnection.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="../assets/css/layout.css">
</head>
<body>
    <h1>Welcome to the Happy Chappy</h1>
    <?php
        $table = "items";

        //echo getall($table)
		$items = getAll($table);
		var_dump($items);
    ?>

</body>
</html>
