<?php
    session_start();
    unset($_SESSION["admin"]);
    unset($_SESSION["cartArray"]);
    header("Location: index.php");
