<?php
    function getConnection(){
        $domain = 'proj-mysql.uopnet.plymouth.ac.uk';
        $db = 'ISAD251_CTaylor';
        $user = 'ISAD251_CTaylor';
        $password = 'ISAD251_22213529';
        $mySQLConnection = new PDO("mysql:host=".$domain .";dbname=".$db, $user, $password);
        return $mySQLConnection;
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
        $servername = "proj-mysql.uopnet.plymouth.ac.uk";
        $username = "ISAD251_CTaylor";
        $password = "ISAD251_22213529";
        $dbname = "ISAD251_CTaylor";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM ".$table;
        $result = $conn->query($sql);
        return $result;
        $conn->close();
    }