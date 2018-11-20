<?php
    include 'db_connection.php';
   // $conn = OpenCon();
    echo "Connected Successfullyn";
    //CloseCon($conn);
    mysql_close($conn);
?>