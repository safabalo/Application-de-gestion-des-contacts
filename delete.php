<?php
session_start();
include ("./connect.php");
require('./contact.php');

$db = new dataBase();
$db = $db->connect();
$contacts = new contacts($db);
$id = $_REQUEST['id'];
$user_id = $_SESSION['user_id'];
$delete = $contacts->delete($user_id, $id);

if ($delete) {
     header('location: ./pages/accueil.php');
     die();
}
 ?>