<?php
define("DB_HOST", 'aws_host');
define("DB_USER", 'db_username');
define("DB_PASS", 'db_pwd');
define("DB_NAME", 'project_db');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}
