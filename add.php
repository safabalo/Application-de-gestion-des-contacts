<?php
session_start();
	include ("./connect.php");
	require('./contact.php');

  $db = new dataBase();
  $db = $db->connect();
    $contacte = new contacts($db);
   
if (isset($_POST['submit'])) {

				if (isset($_POST['contactName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) {
					if (!empty($_POST['contactName']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) ) {
						
						$contactName = $_POST['contactName'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$address = $_POST['address'];
						$user_id = $_SESSION['user_id'];
                        $insert = $contacte->create($contactName, $email, $phone, $address, $user_id);
						header("location: ./pages/accueil.php");
					}else{
						header("location: ./index.php");
					}
				}
			}

?>