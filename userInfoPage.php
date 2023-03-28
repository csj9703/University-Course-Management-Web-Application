<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'inc/bootstrap.php' ?>
    <title>My Information</title>
    <?php include 'inc/header.php' ?>
</head>

<body class="container-fluid gradient-custom">
    <div class="container-fluid gradient-custom">
        <div>
            <?php include 'components/userInfoBox.php' ?>
        </div>
</body>
<?php include 'inc/footer.php' ?>

</html>