<?php
    session_start();
    
    if(session_destroy())
    {
        header("Location: ../../hw/register.php", true, 301);
        exit();
   }
?>