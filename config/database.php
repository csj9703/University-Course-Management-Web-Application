<?php
    define("DB_HOST", 'cpsc471-projectdb.c8s4n5ifh9ly.us-east-1.rds.amazonaws.com');
    define("DB_USER", 'admin');
    define("DB_PASS", 'cpsc471gp48');
    define("DB_NAME", 'mysql');

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if($conn->connect_error){
        die("Connection Failed " . $conn->connect_error);
    }else{
        echo 'Connected DB! <br>';
    }
?>