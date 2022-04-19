<?php
    session_start();

    unset($_SESSION['user_id']);
    unset($_SESSION);
    session_destroy();
    header("location: ./login.php");
?>