<?php
    define("DB_HOST", 'localhost');
    define("DB_USER", 'dev');
    define("DB_PASS", '123');
    define("DB_NAME", 'cpsc471_dev_db');

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if($conn->connect_error){
        die("Connection Failed " . $conn->connect_error);
    }else{
        echo 'Connected DB! <br>';
    }
?>