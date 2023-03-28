<!-- Main Login Page -->
<?php
include "config/database.php";
include "backend/login.php";
$email = $password = '';
$emailErr = $passwordErr = '';
$loginErr = 0;
if (isset($_POST['submit'])) {
  // Validate the email
  if (empty($_POST['email'])) {
    $emailErr = 'E-mail is required!';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  // Validate the password
  if (empty($_POST['password'])) {
    $passwordErr = 'Password is required!';
  } else {
    $password = $_POST['password'];
  }

  if (empty($emailErr) && empty($passwordErr)) {
    $loginErr = login($conn, $email, $password);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'inc/bootstrap.php' ?>
  <title>University of Calgary Calendar Login</title>
</head>

<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <!-- Logo -->
                  <div class="text-center">
                    <img src="img/logo.png" style="width: 350px;" alt="logo">
                  </div>

                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <p>Please login to your account</p>
                    <!-- Incorrect Credentials Alert -->
                    <?php if ($loginErr == -1) : ?>
                      <div class="alert alert-danger" role="alert">
                        Incorrect Credential!
                      </div>
                    <?php endif; ?>
                    <!-- Email form -->
                    <div class="form-outline mb-4">
                      <input type="email" id="email" name="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" placeholder="E-mail" />
                      <div class="invalid-feedback">
                        <?php echo $emailErr; ?>
                      </div>
                    </div>
                    <!-- Password form -->
                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password" class="form-control <?php echo $passwordErr ? 'is-invalid' : null; ?>" placeholder="Password" />
                      <div class="invalid-feedback">
                        <?php echo $passwordErr; ?>
                      </div>
                    </div>
                    <!-- Login button -->
                    <div class="text-center pt-1 mb-5 pb-1">
                      <input class="btn btn-primary fa-lg gradient-custom mb-3 w-75" type="submit" name="submit" value="Login">
                    </div>
                  </form>

                </div>
              </div>
              <!-- Gradient Panel -->
              <div class="col-lg-6 d-flex align-items-center gradient-custom">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="text-center">Welcome to the University Calendar!</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<?php include 'inc/footer.php' ?>

</html>