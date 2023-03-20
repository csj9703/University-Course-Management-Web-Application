<?php
    session_start();
    include "user.php";
?>

<h1> Welcome <?php echo $_SESSION['fname'] ." ". $_SESSION['lname'];?> </h1>

<a href="logout.php">Logout</a>