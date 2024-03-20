<?php
session_start();
include("../connection/conn.php");

   
if(isset($_POST["fullname"]) && isset($_POST['username']) && isset($_POST["email"]) && isset($_POST['pass'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
       $email = $_POST['email'];
       $pass = $_POST['pass'];

       $pass = md5($pass);

       $sql = "SELECT * FROM admin WHERE FullName = '$fullname' && AdminEmail = '$email' && UserName = '$username'";
       $sqlQuery = mysqli_query($conn,$sql);
       if(mysqli_num_rows($sqlQuery) > 0){
            header("Location: ../signup.php?login=duplicate");
       }else{
        $insertAdmin = "INSERT INTO admin(FullName,AdminEmail,UserName,Password) VALUES('$fullname','$email','$username','$pass')";
        $insertAdminQuery = mysqli_query($conn,$insertAdmin);
        header("Location: ../index.php?signup=success");
    }
}