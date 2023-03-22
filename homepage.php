<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'inc/bootstrap.php'?>
    <title>Home Page</title>
    <?php include 'inc/header.php'?>
</head>
<body>
<h1> Welcome <?php echo $_SESSION['fname'] ." ". $_SESSION['lname'];?> </h1>
</body>
<?php include 'inc/footer.php'?>
</html>