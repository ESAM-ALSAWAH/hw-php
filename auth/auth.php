<?php 
    session_start();
    if(!isset( $_SESSION['user'])){
        header("Location: ../../hw/register.php", true, 301);
        exit();
    }

?>