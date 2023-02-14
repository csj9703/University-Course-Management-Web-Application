<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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

                <form>
                  <p>Please login to your account</p>
                  <!-- Email form -->
                  <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control"
                      placeholder="E-mail" />
                  </div>
                  <!-- Password form -->
                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control"
                     placeholder="Password"/>
                  </div>
                  <!-- Login button -->
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom mb-3 w-75" type="button">Log
                      in</button>
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
<?php include 'inc/footer.php'?>
</html>
