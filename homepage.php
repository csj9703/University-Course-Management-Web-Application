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
    <div class="container-fluid gradient-custom" style="margin-bottom: 0px;padding-bottom: 1px;">
        <div class="card text-dark bg-light mb-3" style="max-width: auto;">
            <div class="card-header">Search</div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'inc/footer.php'?>
</html>

