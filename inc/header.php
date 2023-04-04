<!-- Header Navbar: Should be imported for every page -->
<section id="header">
  <nav class="navbar navbar-expand-lg navbar-dark gradient-custom">
    <a class="navbar-brand" href="homepage.php">
      <img src="img/UC-horz-rgb.png" width="200" class="d-inline-block align-top" alt="">
    </a>
    <h4 style="margin-bottom:10px;color:white;margin-right: 100px;padding-top: 5px;padding-left: 10px;"><b>Welcome, <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></b></h4>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item btn btn-light">
          <a class="nav-link" href="homepage.php">Home</a>
        </li>
        <?php if ($_SESSION['privilege'] == 0) : ?>
          <li class="nav-item btn btn-light">
            <a class="nav-link" href="userInfoPage.php">My Information</a>
          </li>
        <?php else : ?>
          <li class="nav-item btn btn-light">
            <a class="nav-link" href="courseCreatePage.php">Course Creation</a>
          </li>
        <?php endif ?>
        <li class="nav-item btn btn-light">
          <a class="nav-link" href="backend/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</section>