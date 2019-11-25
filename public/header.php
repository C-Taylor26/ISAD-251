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
            position: sticky;
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
            color: black;
            background-color: white;
        }

        .bannerImage{
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
        }

    </style>
</head>
<body>

    <img class="bannerImage" src="../assets/img/Page-images/bar3.jpg" alt="Banner image of a bar">

    <ul>
        <?php
            $filename = basename($_SERVER['PHP_SELF']);
            if ($filename == 'index.php')
            {
                ?><li><a class= 'active' href="index.php">Home</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <?php
            }
            elseif ($filename == 'menus.php')
            {
                ?><li><a href="index.php">Home</a></li>
                <li><a class = 'active' href="menus.php">Menus</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <?php
            }
            elseif ($filename == 'aboutUs.php')
            {
                ?><li><a href="index.php">Home</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li><a class = 'active' href="aboutUs.php">About Us</a></li>
                <?php
            }
            ?>
    </ul>




</body>
</HTML>