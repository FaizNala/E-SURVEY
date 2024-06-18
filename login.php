<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    body {
      background-image: url('dist/img/grapol.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      min-height: 100vh;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Black overlay with 50% opacity */
      z-index: 1;
    }

    .login-box {
      position: relative;
      z-index: 2;
      background-color: rgba(255, 255, 255, 0.8);
      /* White background with some transparency */
      padding: 20px;
      border-radius: 10px;
      max-width: 400px;
      margin: auto;
    }

    @media (max-width: 576px) {
      .login-box {
        padding: 15px;
        max-width: 90%;
      }

      .login-box .card-header h1 {
        font-size: 1.5rem;
      }

      .login-box .input-group .form-control {
        font-size: 0.9rem;
      }

      .login-box .btn {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Admin</b>Survey</a>
      </div>
      <div class="card-body">
        <p align="center"><img src="dist/img/LogoPolinema.png" alt="LogoPolinema" width="180"></p>
        <p class="login-box-msg">Sign in to start your session</p>

        <!-- Error Message Container -->
        <?php
        if (isset($_GET['error'])) {
          $error = $_GET['error'];
          if ($error === 'invalidPass') {
            echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Invalid password!
                  </div>';
          } else if ($error === 'invalidUser') {
            echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Username not found!
                  </div>';
          }
        }
        ?>

        <form action="cek_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if (isset($_COOKIE["username"])) {
                                                                                                    echo $_COOKIE['username'];
                                                                                                  } ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" <?php if (isset($_COOKIE["password"])) { ?> value="<?php echo $_COOKIE['password'];
                                                                                                                                                } ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p align="center"><a href="layouts/linktree/linktree.php">survey</a></p>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>