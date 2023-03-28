<?php
// Login function that takes in the entered credentials and passes
// the credentials into the SQL query.
function login(mysqli $conn, string $email, string $pwd)
{
    session_start();
    $hashpwd = hash('sha256', $pwd);
    $query = "SELECT COUNT(*) AS C FROM user WHERE email='$email' AND upwd='$hashpwd'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (intval($row[0]['C']) == 1) {
        setupSession($conn, $email);
        header('Location: homepage.php');
    } else {
        return -1;
    }
}
// Setup the session to store session variables for the logged in user
function setupSession(mysqli $conn, string $email)
{
    $query = "SELECT uid, email, fname, lname, privilege FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $user_arr = $row[0];
    $_SESSION['logged_in'] = True;
    $_SESSION['uid'] = $user_arr['uid'];
    $_SESSION['email'] = $user_arr['email'];
    $_SESSION['fname'] = $user_arr['fname'];
    $_SESSION['lname'] = $user_arr['lname'];
    $_SESSION['privilege'] = $user_arr['privilege'];
}
