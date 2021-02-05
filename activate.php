<?php
session_start();
include('conf.php');

if(isset($_GET['token'])){

    $token = $_GET['token'];

    $updatequery = "update registration set status='active' where token='$token'";

    $query = mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account Activated Successfully";
            header('location:Login.php');
        }else{
            $_SESSION['msg'] = "You are LoGged  OuT";
            header('location:Login.php');
        }
    }else{
        $_SESSION['msg'] = "Account Activation is UNsuccessfully";
        header('location:Registration.php');
    }
}
?>