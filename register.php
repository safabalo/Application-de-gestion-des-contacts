<?php
include('user.php');

if(isset($_POST['submit'])) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if(empty($_POST['username'])|| empty($_POST['password'])) {
        $message = '<label> Tout les case doit étre remplies</label>';
    } else {
        $user = new User($userName, $password);
        $user->checkUser($userName, $password);
    }
}

?>