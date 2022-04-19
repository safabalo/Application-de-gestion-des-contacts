<?php
include('user.php');

if(isset($_POST['register'])) {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $repeatpass= $_POST['repeat_password'];



    if(empty($_POST['username'])|| empty($_POST['password']) || empty($_POST['repeat_password'])){
        $message = '<label> Tout les case doit étre remplies</label>';
    }else{
        $user = new User($userName, $password, $repeatpass);
        $user->insertUSer();
    }
}

?>