<?php
    function getConnection(){
        $domain = 'proj-mysql.uopnet.plymouth.ac.uk';
        $db = 'ISAD_CTaylor';
        $user = 'CTaylor';
        $password = 'ISAD_22213529';
        $mySQLConnection = new PDO("mysql:host=$domain;dbname=$db, $user, $password");
        return $mySQLConnection;
    }
