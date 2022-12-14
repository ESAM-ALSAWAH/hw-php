<?php
    session_start();
    include '../config/db.php';
    $email=$_POST['email'];
    $pass=$_POST['password'];
    
    $stmt=$conn->prepare('select * from users where email=? and password=?');
    $stmt->bind_param('ss',$email,$pass);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    
    if($result->num_rows >0)
    { 
          $_SESSION['admin']=  $email == 'admin' ? true: false ;
          $_SESSION['user']= $email;
          $_SESSION['user-phone']= $row["phone"];
        
        echo json_encode(["data"=>$row,"message"=>"welcome"]);
        if (isset($_SESSION['user'])) {
            if(isset($_SESSION['admin'])){
                header("Location: ../../hw/admin/index.php", true, 200);
                    
            }
            else {
                header("Location: ../index.php", true, 301);
                exit();
            }
        }

    }
    else {
        header("HTTP/1.0 404 Incorrect Username or Password ");
        echo "Incorrect Username or Password";
    }

?>