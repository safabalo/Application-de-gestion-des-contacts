<?php 
  session_start();
  include_once('../connect.php');
  include_once('../contact.php');
  if(!$_SESSION['user_id']) {
    header("location: ../index.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Assets/css/my-bootstrap.css">
  <link rel="stylesheet" href="../Assets/css/style.css">
  <title>Accueil</title>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!---->
  </head>
  <style>
    .overlay {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
    }
  </style>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="userpage.php">
            <img src="../Assets/images/images-removebg-preview.png" alt="logo" width="70px" height="70px"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav ms-auto fs-5 d-flex flex-sm-row justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="accueil.php">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<main>
    <div class="w-100">
    <iframe src="https://embed.lottiefiles.com/animation/97681" class="w-100 mt-5"></iframe>
    <div>
</main>
</body>
</html>