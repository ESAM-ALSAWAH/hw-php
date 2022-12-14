<?php
    include_once '../config/db.php';
    $invoice=$_POST['invoice'];
    $userId=$_POST['userId'];
    
    $result=mysqli_query($conn,"UPDATE users SET invoice='$invoice' WHERE id='$userId'");
    if($result){
        echo 'The invoice has been modified successfully' .$userId;
    }
    
    
?>