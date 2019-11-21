<?php
?>
<HTML>
<head>
    <!--<link rel="stylesheet" href="../assets/css/navBar.css">-->
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <ul>
        <li><a id = 'Home' href="index.php">Home</a></li>
        <li><a id = 'Menus'href="menus.php">Menus</a></li>
        <li><a id = 'About Us' href="#about">About Us</a></li>


        <?php
            $filename = basename($_SERVER['PHP_SELF']);
            if ($filename == 'index.php')
            {
                ?>
                <?php
            }
            elseif ($filename == 'menus.php')
            {

            }
            ?>



</ul>
</body>
</HTML>