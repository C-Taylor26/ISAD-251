<?php
?>
<HTML>
<head>
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
        .account {
            float: right;

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
            session_start();
            $filename = basename($_SERVER['PHP_SELF']);
            if(isset($_SESSION["admin"]) and $_SESSION["admin"] == 1)
            {
                $adminString = "Log Out";
                $redirect = "logout.php";
            }
            else{
                $adminString = "Sign In";
                $redirect = "login.php";

            }
            if ($filename == 'index.php')
            {
                ?><li><a class= 'active' href="index.php">Home</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li class='account'"><a href=<?php echo $redirect?>><?php echo $adminString?></a></li>
                <li><a href ="trolley.php">Trolley</a></li>
                <?php
            }
            elseif ($filename == 'menus.php')
            {
                ?><li><a href="index.php">Home</a></li>
                <li><a class = 'active' href="menus.php">Menus</a></li>
                <li class='account'"><a href=<?php echo $redirect?>><?php echo $adminString?></a></li>
                <li><a href ="trolley.php">Trolley</a></li>
                <?php
            }
            elseif ($filename == 'trolley.php')
            {
                ?><li><a href="index.php">Home</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li class='account'"><a href=<?php echo $redirect?>><?php echo $adminString?></a></li>
                <li><a class = 'active' href="trolley.php">Trolley</a></li>
                <?php

            }
            else{
                ?><li><a href="index.php">Home</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li class='account'"><a href=<?php echo $redirect?>><?php echo $adminString?></a></li>
                <li><a href="trolley.php">Trolley</a></li>
                <?php
            }
            ?>
    </ul>




</body>
</HTML>