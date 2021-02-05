                            <!-- PASSWORD RECOVERY -->
<?php
session_start();
include('conf.php');

if(isset($_POST['recover'])){

$Email = mysqli_real_escape_string($con, $_POST['email']);

    // EMAIL ALREADY EXISTS
  $emailquery = " select * from registration where email = '$Email' ";
  $query = mysqli_query($con, $emailquery);

  // MULTIPLE EMAIL CHECKING
  $emailcount = mysqli_num_rows($query); 

  if($emailcount){
    
    $userdata = mysqli_fetch_array($query);

    $Fullname = $userdata['fullname'];
    $token = $userdata['token'];
    
      $subject = "Password Reset";
      $body = "Hi, $Fullname Click Here To Reset Your Password http://localhost/ZAIN_ALI/reset_password.php?token=$token";
      $sender_email = "From: zainirshadali@gmail.com";

      if(mail($Email, $subject, $body, $sender_email)) {
          $_SESSION['msg'] = "Check Your MAIL To Reset Your Password at $Email";
          header('location:Login.php');
      } else {
          echo "Email Sending Failed.";
      }
    
    }else {
      echo "No Email Found";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="icon/shoes.png" sizes="50x50">
    <link rel="stylesheet" href="css/recover.css">
</head>
<body>
<div class="container col-lg-4 mt-5">
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <h2>Recover Your Password</h2>
        <p>Please Provide Your Valid Email Address</p>
        <label for="email"><b>Email</b></label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
        <button type="submit" name="recover" class="btn btn-info mt-2">SEND MAIL</button>
      
  </form>
</div>
</body>
</html>