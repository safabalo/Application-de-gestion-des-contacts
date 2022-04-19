<?php 
session_start();
  include("./connect.php");
  include("./contact.php");
  $db = new dataBase();
  $db = $db->connect();
  $contacts = new contacts($db);
  $user_id= $_SESSION['user_id'];
  $id = $_REQUEST['id'];
  $get = $contacts->getContactById($id, $user_id);

  if(isset($_GET['id'])){
    if($contact = $contacts->getContactById($id, $user_id)){
         $contactName = $contact['contactName'];
         $email = $contact['email'];
         $phone = $contact['phone'];
         $address = $contact['address'];
     }
    }
     if (isset($_POST['update'])) {
      if (isset($_POST['contactName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) {
        if (!empty($_POST['contactName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) ) {
          
          $contact['id'] = $id;
          $contactName = $_POST['contactName'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $address = $_POST['address'];

          if($update = $contacts->update($id, $contactName, $email, $phone, $address, $user_id)){
            header("location: ./pages/accueil.php");
          }
        }
      }
     }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Assets/css/my-bootstrap.css">
  <link rel="stylesheet" href="./Assets/css/style.css">
  <title>Accueil</title>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!---->
  </head>
 
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="./Assets/images/images-removebg-preview.png" alt="logo" width="70px" height="70px"/>
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
              <a class="nav-link" href="#">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <form method="post" id="form" class="p-4" >
        <div class="form-group">
            <label for="exampleInputEmail1">Contact Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter contact name" name="contactName" value="<?php echo $contactName?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter phone" name="phone" value="<?php echo $phone?>">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="enter address" name="address" value="<?php echo $address?>">
          </div>
          <button type="submit" class="btn btn-success mt-2" name="update">update</button>
        </form>
</body>
</html>