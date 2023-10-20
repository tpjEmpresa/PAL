<?php
    session_start();
    ob_start();
    unset($_SESSION['id_user']);
    unset($_SESSION['nickName']);
    session_destroy();
    header("Location: ../index.php");
?>