<?php
    include_once 'header.php';
    include_once 'footer.php';
    include_once 'dbConnection.php';
?>
<HTML>
<head>
    <title>Menus</title>
</head>

<body>
    <?php
    $table = "items";

    //echo getall($table)
    $items = getAll($table);
    var_dump($items);
    ?>
</body>

</HTML>


