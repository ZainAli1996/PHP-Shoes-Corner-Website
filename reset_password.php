                            <!-- PASSWORD RESET -->
<?php
session_start();
include('conf.php');

if(isset($_POST['reset'])){

if(isset($_GET['token'])){

  $token = $_GET['token'];

$NewPassword = mysqli_real_escape_string($con, $_POST['psw']);
$ConfirmPW = mysqli_real_escape_string($con, $_POST['psw_confirm']);

              // PASSWORD ENCRYPTION
$pass = password_hash($NewPassword, PASSWORD_BCRYPT);
$cpass = password_hash($ConfirmPW, PASSWORD_BCRYPT);

  // PASSWORD MATCH CHECKING 
  
    if($NewPassword === $ConfirmPW){
   
      $updatequery = "UPDATE registration SET psw='$pass' WHERE token='$token'";

      $iquery = mysqli_query($con, $updatequery);

      if($iquery){

       $_SESSION['msg'] = "Your Password Has Been Successfully UPDATED.";
       header('location:Login.php');
      }else{
        $_SESSION['passmsg'] = "FAILED To Update Your Password.";
        header('location:reset_password.php');
      }

    }else {
      $_SESSION['passmsg'] = "Password is Not Matching.";
        header('location:reset_password.php');
    }

}else{
  echo "No Token Found";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="icon/shoes.png" sizes="50x50">
    <link rel="stylesheet" href="css/resetpw.css">
</head>
<body>
<div class="container col-lg-4 mt-5">
  <form action="" method="POST">
        <h2>Reset Your Password</h2>
        <p>Please Create A New Password</p>
        <p class="bg-info mx-5 text-white">
        <?php
        if(isset($_SESSION['passmsg'])){
            echo $_SESSION['passmsg'];
        }else {
            echo $_SESSION['passmsg'] = "";
        }
        ?>
        </p>
        <hr>
        
        <label for="psw"><b> New Password</b></label>
        <input type="password" class="form-control mb-2" placeholder="Enter New Password" name="psw" required>       

        <label for="psw-confirm"><b>Confirm Password</b></label>
        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="psw_confirm" required>
        
        <button type="submit" name="reset" class="btn btn-primary mt-2">UPDATE PASSWORD</button>
      
  </form>
</div>
</body>
</html>