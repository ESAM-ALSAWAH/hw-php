<?php
    include_once '../config/db.php';
    $Phone=$_POST["Phone"];
    $inovice = $conn->query("SELECT invoice FROM users WHERE phone='$Phone'")->fetch_all();
    if($inovice)
        echo $inovice[0][0];
    else{
        header("HTTP/1.0 422 This number does not exist");
        echo "This number does not exist";
    }
?>