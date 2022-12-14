<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbName='hw';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqlUser = "CREATE TABLE IF NOT EXISTS users (
    ID int(11) AUTO_INCREMENT,
    firstName varchar(255) NOT NULL,
    lastName varchar(255) NOT NULL,
    userName varchar(255) NOT NULL,
    phone varchar(15) NOT NULL,
    EMAIL varchar(255) NOT NULL,
    PASSWORD varchar(255) NOT NULL,
    city varchar(50) NOT NULL,
    address varchar(255) NOT NULL,
    gender varchar(50) NOT NULL,
    occupation varchar(100) NOT NULL,
    Date date NOT NULL,
    invoice int NOT NULL,    
    PRIMARY KEY  (ID))";
    if($conn->query($sqlUser)){
        echo 'good';
    }

?>