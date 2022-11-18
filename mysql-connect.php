<?php
    require_once 'connection.php';
    //create connection
    $conn = @new mysqli($servername, $username, $password, $db);
    //check connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
        echo "Connection Succesfully !!";
    
    
    $sql = "SELECT * FROM f_people";
    $result = $conn-> query($sql);

    if($result) {
        if($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<br>Song id: " . $row["s_id"] .  
                     "<br>Name: " . $row["s_name"];
            }
        }
        else {
            echo "Nothing to find ! oopsss";
        }
    }
    else {
        echo "<br>Check your code pls !!";
    }

    $conn->close();


?>