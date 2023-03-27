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
<body class="container-fluid gradient-custom">
<div class="container-fluid gradient-custom">
  <div>
    <div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
      <div class="card-header">Search For Courses</div>
      <div class="card-body">
        <h6 class="card-title">Search Options: </h6>
        <div class="input-group rounded">
          <div class="input-group mt-3 mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="cDepartSelect">Course Department: </lable>
            </div>
            <select class="form-select" id="cDepartSelect">
              <option selected>Choose...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text">Course Number: </span>
            <input type="text" class="form-control" placeholder="Enter a course number">
          </div>
          <div class="input-group mt-3 mb-3">
            <span class="input-group-text">Course Name: </span>
            <input type="text" class="form-control" placeholder="Enter a course name">
          </div>
          <div class="input-group mt-3 mb-3">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#antiReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Anti-requisite(s)</button>
          </div>
          <div class="card card-body collapse" aria-expanded="false" id="antiReqCollapse">
            <div class="input-group mt-3 mb-3">
              <span class="input-group-text">Anti-requitsite Course(s): </span>
              <input type="text" class="form-control" placeholder="Enter Anti-requisite courses separated by comma ',' (E.g. CPSC 203, CPSC 205)">
            </div>
          </div>
          <div class="input-group mt-3 mb-3">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#preReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Pre-requisite(s)</button>
          </div>
          <div class="card card-body collapse" aria-expanded="false" id="preReqCollapse">
            <div class="input-group mt-3 mb-3">
              <span class="input-group-text">Pre-requitsite Course(s): </span>
              <input type="text" class="form-control" placeholder="Enter Pre-requisite courses separated by comma ',' (E.g. CPSC 203, CPSC 205)">
            </div>
          </div>
          <div class="input-group mt-3 mb-3">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include 'inc/footer.php'?>
</html>

