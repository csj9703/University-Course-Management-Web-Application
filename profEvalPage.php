<?php
session_start();
include "config/database.php";
include "backend/profEvalQuery.php";
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'inc/bootstrap.php' ?>
    <title>Instructor Evaluation</title>
    <?php include 'inc/header.php' ?>
</head>

<body class="container-fluid gradient-custom">
    <div class="container-fluid gradient-custom">
        <div>
            <?php
            if ($prof_eval_type == 'add') {
                include 'components/addProfEvalBox.php';
            } else {
                include 'components/editProEvalBox.php';
            }
            ?>
        </div>
    </div>
</body>
<?php include 'inc/footer.php' ?>

</html>