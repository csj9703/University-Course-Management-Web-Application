<?php
$isbn = $_GET['isbn'];

// Query textbook information
function query_textbook_info($conn, $isbn)
{
    $query = "SELECT * FROM textbook WHERE isbn='$isbn';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}
