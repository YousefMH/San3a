<?php
    session_start();
    if (!isset($_SESSION['ID'])) {
        header("Location:index.php");
        exit();
    }else{
        $_SESSION['ID'] = null;
        header("Location:index.php");
        exit();
    }

?>