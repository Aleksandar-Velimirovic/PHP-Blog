<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";
    
    try {
        $databaseConnection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e){
        echo $e->getMessage();
    }
    
?>