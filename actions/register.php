<?php
    session_start();
    include '../config/db.php';
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $city=$_POST['city'];
    $address=$_POST['address'];

    $gender=$_POST['gender'];
    $date=$_POST['date'];
    $occupation=$_POST['occupation'];
    
    function EmailIsExist($email_)
    {
        $query = "select * from users where email='$email_'";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName='hw';
        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbName);
        
        $result = $conn->query($query);
        
        if($result->num_rows > 0){
            return true;
        }
        else return false;
    }
    function PhoneIsExist($phone_)
    {
        $query = "select * from users where phone='$phone_'";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName='hw';
        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbName);
        
        $result = $conn->query($query);
        
        if($result->num_rows > 0){
            return true;
        }
        else return false;
    }


    if(EmailIsExist($email)){
        header("HTTP/1.0 400  Email Already Token ");
        exit();
    }
   else  if(PhoneIsExist($phone)){
        header("HTTP/1.0 400  Phone Already Token ");
        exit();
    }
    else if (strlen($phone)<10){
        header("HTTP/1.0 400  phone must be from 10 of number ");
        exit();
    }
    else if(strlen($password)<8){
        header("HTTP/1.0 400  Password must be greater than 8 ");
        exit();
    }
    else if ($password != $repassword){
        header("HTTP/1.0 400  The password and confirm password do not match");
        exit();
    }
    else{
        $q="INSERT INTO `users`( `firstName`, `lastName`, `userName`, `email`, `password`, `phone`, `city`, `address`, `gender`, `occupation`, `date`, `invoice`) VALUES ('$firstName','$lastName','$userName','$email','$password','$phone','$city','$address','$gender','$occupation','$date','0')";
        $result=mysqli_query($conn,$q);
        
        if($result){
            echo 'Register successfully , Please LoginIn to your account ';
        }
    }



    
?>