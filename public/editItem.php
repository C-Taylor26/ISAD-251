<?php
if(!isset($_SESSION)){
    session_start();
}
//capture POST for item name.

if(isset($_POST['name'])){
    echo $_POST[1];
    var_dump($_POST);
}