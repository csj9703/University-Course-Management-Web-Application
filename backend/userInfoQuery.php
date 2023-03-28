<?php
function setupMajorMinor(mysqli $conn)
{
    $user_id = $_SESSION['uid'];
    $query = "SELECT major_in.dep_name AS major, minor_in.dep_name AS minor FROM user, major_in, minor_in WHERE major_in.sid='$user_id' AND minor_in.sid='$user_id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $user_arr = $row[0];
    $_SESSION['major'] = $user_arr['major'];
    $_SESSION['minor'] = $user_arr['minor'];
}
