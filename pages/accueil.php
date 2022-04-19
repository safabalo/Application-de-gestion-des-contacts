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
              <a class="nav-link" href="#">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <!-- content -->
    <div class="container mt-3">
        <div class="contact">
            <h2>Contacts lists :</h2>
            <button id="new" type="button" class="plus text-success"><i class="fas fa-plus "></i></button>
        </div>
        <table class="table table-hover mt-4">
            <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Adress</th>
            <th>Edit</th>
            <th>Delete<th>
            </thead>
          <tbody>
            <?php 
              $db = new dataBase();
              $db = $db->connect();
              $contacte = new contacts($db);
              $user_id = $_SESSION['user_id'];
              $contacts = $contacte->read($user_id);
              $i = 1;
              if($contacts){
                
                foreach($contacts as $contact):
            ?>
              <tr>
                <th><?php echo $i++;?></th>
                <td><?php echo $contact['contactName'];?></td>
                <td><?php echo $contact['email'];?></td>
                <td><?php echo $contact['phone'];?></td>
                <td><?php echo $contact['address'];?></td>
                <td>
                  <a href="../update.php?id=<?php echo $contact['id']; ?>" class="badge badge-success btn btn-success">Edit</a>
                </td>
                <td>
                  <a href="../delete.php?id=<?php echo $contact['id']; ?>" class="badge badge-danger btn btn-danger">Delete</a>
                </td>
              </tr>
             <?php endforeach;}?>
            
          </tbody>
        </table>
      </div>
      <div class="overlay d-none"></div>
      <form method="post" action="../add.php" id="form" class="d-none bg-white p-4 position-absolute w-50" style="top:50%; left:50%; transform:translate(-50%, -50%)">
      <div class="form-group">
          <label for="exampleInputEmail1">Contact Name</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter contact name" name="contactName">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter phone" name="phone">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control" placeholder="enter address" name="address">
        </div>
        <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
      </form>

        </div>
      </div>
    </div>
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
      <script src="../Assets/js/my-bootstrap.js"></script>
      <script>
        let newBtn = document.getElementById('new')
        let form = document.getElementById('form')
        let overlay = document.querySelector('.overlay')

        newBtn.addEventListener('click', function() {
          form.classList.toggle('d-none')
          overlay.classList.toggle('d-none')
        })

        overlay.addEventListener('click', function() {
          form.classList.add('d-none')
          overlay.classList.add('d-none')
        })
      </script>
</body>
</html>