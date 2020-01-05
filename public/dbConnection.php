<?php
    function getConnection(){
        $domain = 'proj-mysql.uopnet.plymouth.ac.uk';
        $db = 'ISAD251_CTaylor';
        $user = 'ISAD251_CTaylor';
        $password = 'ISAD251_22213529';
        $conn = new mysqli($domain, $user, $password, $db);
        return $conn;
    }
    function getAll($tablename){
        $sql = "SELECT * FROM ".$tablename;
        $con = getConnection();
        $run = $con->prepare($sql);
        $run->execute();
        $results = $run->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    function getTable($table){
        $conn = getConnection();
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM ".$table;
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    function order($cartArray){
        
    }