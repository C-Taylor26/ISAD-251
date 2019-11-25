<?php
    function getConnection(){
        $domain = 'proj-mysql.uopnet.plymouth.ac.uk';
        $db = 'ISAD_CTaylor';
        $user = 'ISAD251_CTaylor';
        $password = 'ISAD251_22213529';
        $mySQLConnection = new PDO("mysql:host=$domain;dbname=$db, $user, $password");
        return $mySQLConnection;
    }
    function getAll($tablename){$sql = "SELECT * FROM".$tablename;
        $con = getConnection();
        $run = $con->prepare($sql);
        $run->execute();
        $results = $run->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
