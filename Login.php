<?php
session_start();
include("conf.php");

 if(isset($_POST['btn'])){

	$Email = mysqli_real_escape_string($con, $_POST['email']);
	$Password = mysqli_real_escape_string($con, $_POST['psw']);
	 
	$query="select * from `registration` where email='$Email' and status='active'";
	$run=mysqli_query($con,$query);
	$email_count = mysqli_num_rows($run);

	if($email_count){
		$email_pass = mysqli_fetch_assoc($run);

		$_SESSION['ROLE']=$email_pass['user_type'];
		if($email_pass['user_type']=='admin'){

			$db_pass = $email_pass['psw'];

		$_SESSION['fullname'] = $email_pass['fullname'];
		$pass_decode = password_verify($Password, $db_pass);

			if($pass_decode){

		if(isset($_POST['rememberme'])){
			setcookie('emailcookie',$Email,time()+21600);
			setcookie('passwordcookie',$Password,time()+21600);
		}

			$_SESSION['id'] = $email_pass['id'];

			echo "Login Successful";
			header('location:Dashboard.php');
			die();
			}else {
			?>
		<script>
		alert("Incorrect Password, Please Try Again.");
		</script>
			<?php
			} 
			
		}if($email_pass['user_type']=='user'){

			$db_pass = $email_pass['psw'];

		$_SESSION['fullname'] = $email_pass['fullname'];
		$pass_decode = password_verify($Password, $db_pass);

			if($pass_decode){

		if(isset($_POST['rememberme'])){
			setcookie('emailcookie',$Email,time()+21600);
			setcookie('passwordcookie',$Password,time()+21600);
		}

			$_SESSION['id'] = $email_pass['id'];

			echo "Login Successful";
			header('location:index.php');
			die();
			}else {
			?>
		<script>
		alert("Incorrect Password, Please Try Again.");
		</script>
			<?php
				} 
		
		}

	}else{
		?>
      <script>
      alert("Invalid Email, Please Register Your Email First.");
      </script>
    	<?php
		}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOG IN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="icon/shoes.png" sizes="50x50">
    <link rel="stylesheet" href="css/LogiN.css">

    <style>
      body{
        background-image: url(img/Login.jpg);
        background-size: cover;
        background-repeat: no-repeat;}
    </style>
  </head>

<body>

<div class="box">
   
    									<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="index.php">
	<img src="img/logo.png" alt="" height="50px" width="50px">
	<h4><span style="color: #D50000">SHOES</span> CORNER</h4>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			<a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="About.php">ABOUT</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				CATEGORY
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="Kids.html">Kids</a>
				<a class="dropdown-item" href="Male.html">Male</a>
				<a class="dropdown-item" href="Female.html">Female</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="Contact.php">CONTACT</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="Login.php" style="color: blue !important;">LOGIN</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="Registration.php"  style="color: green !important;">REGISTER</a>
			</li>
		</ul>
	</div>
</nav>  

  								<!-- LOGIN FORM -->
<div class="container">

<div class="mx-3">
	<p class="bg-success text-white">
		<?php 
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
		}else{
			echo $_SESSION['msg'] = "You are now LOGGED OUT, Please LOGIN.";
		}
		?>
	</p>
</div>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
	<h2><b>USER LOGIN</b></h2>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" maxlength="30" name="email" required 
		   value="<?php if(isset($_COOKIE['emailcookie'])){
			echo $_COOKIE['emailcookie'];
		} ?>">

    <label for="pass"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" maxlength="20" name="psw" required 
		   value="<?php if(isset($_COOKIE['passwordcookie'])){
			echo $_COOKIE['passwordcookie'];
		} ?>">
	
	<label>
		<input class="mb-2" type="checkbox" name="rememberme"> Remember Me
	</label>	
	
    <button type="submit" class="btn btn-success" name="btn">LOGIN NOW</button>
	

    <span class="psw">Forgot Your Password? Don't Worry <a href="recover_email.php"><b>Click Here</b></a></span>
	</form>
	<div class="mt-1 ml-2">
	<p>Don't Have Account? <a href="Registration.php"><b>Register Here</b></a></p>
	</div>

</div>
</body>
</html>