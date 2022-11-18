<?php
    require_once 'connection.php';
    //create connection
    
    $conn = @new mysqli($servername, $username, $password, $db);
    //check connection
    
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
//      echo "Connection Succesfully !! <br>";