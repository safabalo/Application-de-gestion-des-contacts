<?php
session_start();
require('../createuser.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/my-bootstrap.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>login</title>
</head>
<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light px-2 fs-5" id="bgnav">
        <div class="container-fluid">
          <a class="navbar-brand" href="../login.html">
            <img src="../Assets/images/images-removebg-preview.png" alt="logo" width="70px" height="70px"/>
          </a>
          <a class="nav-link active fw-bold d-flex justify-content-end" href="../login.php">Login</a>   
        </div>
      </nav>

    <!-- content -->
    <div class="content container-fluid row d-flex">
        <div class="col-6 d-none d-lg-flex">
          <img src="../Assets/images/Mobile login-pana.svg" alt="login">
        </div>
        <div class="col-12 col-md-6 login">
          <form class="bg-white p-3 h-100 h-sm-70 " action="" method="POST" >
             <h6 class="text-center fs-3 fw-bold" style="color: #12CE81">SIGN UP</h6>
             <div class="mb-2">
              <label for="user" class="form-label text-secondary">Username</label>
              <input type="text" class="form-control" name="username"  placeholder="Enter your username">
            </div>
            <div class="mb-4 mb-sm-2">
              <label for="Password" class="form-label text-secondary"  >Password</label>
              <input type="password" class="form-control" id="Password"name="password"   placeholder="Enter your password">
            </div>
            <div class="mb-4 mb-sm-2">
                <label for="confPassword" class="form-label text-secondary"  >Confirm Password</label>
                <input type="password" class="form-control" id="confPassword"name="repeat_password"   placeholder="Re-enter your password">
              </div>      
            <button type="submit" class="btn text-white w-100" name="register" style="background-color: #12CE81">SIGN UP</button>
            
            <p class="text-center mt-2">Already have an account? <a href="../login.php" style="color: #12CE81">sign in</a> here.</p>  
          </form>

        </div>
    </div>
    







    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
      <script src="Assets/js/my-bootstrap.js"></script>
</body>
</html>