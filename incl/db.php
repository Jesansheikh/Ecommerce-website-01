<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ecommerce_website';

    $conn = new mysqli($hostname, $username, $password, $dbname);


    if ($conn->connect_errno) {
        die("Connection failed.");
    }
    //  echo "Connection Successsful";
?>