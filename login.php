<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if(!empty($_POST['email'] && !empty($_POST['password']))) {
  extract($_POST);
  require_once 'db.php';
  $db = new Db();
  $users = $db->row("SELECT * FROM `users` WHERE email=:email AND password=:password", [
    'email' => $email,
    'password' => md5($password),
  ]);
  if($users) {
    session_start();
    $_SESSION['user'] = $users[0];
    header("Location: user.php");
  } else {
    $alert = "Incorrect username or password";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Digital Wallet</h1>
                  </div>

                  <!-- <? if($alert): ?>
                  <div class="alert alert-danger" role="alert">
                    <?=$alert?>
                  </div>
                  <? endif; ?> -->

                  <form class="user" method="post" action="login.php">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Register</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
