<?php 
    session_start();
    if(isset( $_SESSION['user']) && $_SESSION['user']!='admin' ){
        
        header("Location: ../../hw/register.php", true, 301);
        exit();
    }

?>