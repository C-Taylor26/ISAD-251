<?php
if(!isset($_SESSION)){
    session_start();
}
//capture POST for item name.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
}