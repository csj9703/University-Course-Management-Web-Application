<?php
define("DB_HOST", 'cpsc471-project-db.c3dvoz4qikix.us-west-1.rds.amazonaws.com');
define("DB_USER", 'admin');
define("DB_PASS", 'cpsc471gp48');
define("DB_NAME", 'project_db');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}
