<?php 
session_start();
include("../connection/conn.php");

if(isset($_POST['email']) && isset($_POST['pass'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $password = md5($password);
    $sql = "SELECT * FROM admin WHERE AdminEmail = '$email' AND Password = '$password'";
    $sqlQuery = mysqli_query($conn,$sql);
    if(mysqli_num_rows($sqlQuery) === 1){
        $row = mysqli_fetch_array($sqlQuery);
        if($row['AdminEmail'] === $email && $row['Password'] === $password){
            $_SESSION['FullName'] = $row['FullName'];
            $_SESSION['AdminEmail'] = $row['AdminEmail'];
            $_SESSION['UserName'] = $row['UserName'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['Password'] = $row['Password'];
            header("Location: ../dashboard.php?login=success");    
        }else{
            header("Location: ../index.php?login=failed");
        }
    }else{
        header("Location: ../index.php?login=not_exit");
    }
}else{
    header("Location: ../index.php?login=failed");
}