<?php

    $servername = "localhost";
    $username = "root";
    $password = "pass";
    $db = "societalIssue";
    // Create connection
    $conn = mysql_connect($servername, $username, $password,$db);
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysql_connect_error());
    }
    echo "Connected successfully";

?>