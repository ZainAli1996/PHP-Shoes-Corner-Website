<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONTACT US</title>
  <meta charset="utf-8">
	<meta name="language" content="en">
	<meta name="author" content="ZAIN_ALI">
	<meta name="keywords" content="SHOES CORNER, Cheap Shoes, Shoes in Karachi, New Shoes, Shoes Sale, Adidas Shoes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/contact.css">
  <link rel="icon" href="icon/shoes.png" sizes="50x50">
</head>
<body>
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
                  
					<!-- LOGIN CONDITION BUTTON DISPLAY START-->

	<?php if( isset($_SESSION['fullname']) && !empty($_SESSION['fullname']) ){
	?>
   
   <li class="nav-item">
  <a class="nav-link" href="Feedback.php">FEEDBACK</a>
  </li>

   <?php
	$count=0;
	if(isset($_SESSION['cart'])){
		$count=count($_SESSION['cart']);}
	?>

	<li class="nav-item">
		<div class="cart">
			<a href="cart.php" data-tooltip title="YOU HAVE <?php echo "$count";?> ITEMS IN YOUR CART"><i class="fa fa-shopping-cart" aria-hidden="true"><h2 class="count"><b>(<?php echo "$count";?>)</b></h2></i></a>
		</div>
    </li>

	<?php }else{ ?>
	<li class="nav-item">
		<a class="nav-link" href="Login.php" style="color: blue !important;">LOGIN</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="Registration.php" style="color: green !important;">REGISTER</a>
	  </li>
	<?php } ?>

					<!-- LOGIN CONDITION BUTTON DISPLAY END-->

	  <div class="dropdown">
		<?php if (isset($_SESSION['fullname'])): ?>
	<button class="dropbtn"><h5 class="user"><?php echo $_SESSION['fullname'];?>'S Account</h5></button>
		<?php endif; ?>
	<div class="dropdown-content">
	  <a class="nav-link" href="Dashboard.php" style="text-align: center;">ADMIN PANEL</a>
	  <a class="nav-link" href="Logout.php" style="text-align: center;">LOG OUT</a>
	</div>
		  </div>

</ul>
</div>
</nav>  

<div class="text-center my-3">
  <h1 class="display-1">CONTACT US</h1>
</div>
                          <!-- SERVICES -->

<div class="Services">
      
      <div class="Support rounded">
      <i class="fa fa-phone" aria-hidden="true"></i>
        <h3>Talk to Sales</h3>
  <div class="box">
        <h2 class="help">Costomer Service 24/7</h2>
        <h5>Feel Free to call us</h5>
        <h6>Phone: +92xxx-xxxxxxx</h6>
  </div>
      </div>
  
      <div class="Email rounded">
      <i class="fa fa-envelope-o" aria-hidden="true"></i>
        <h3>Email Us</h3>
  <div class="box">
        <h2 class="help"> Please feel free to mail us</h2>
        <h5>We will reply you in 48 Hours</h5>
      <address>
        <a href="mailto:zainirshadali@gmail.com">Click Here to Mail</a>
      </address>
  </div>
      </div>
      

</div>
                          <!-- SERVICES CLOSED -->



    <div class="mx-5 text-center">
      <img src="https://www.w3schools.com/w3images/map.jpg" class="img-fluid w-75" alt="Responsive image">
    </div>


<?php include 'footer.php';?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
$(function(){
	$('[data-tooltip]').tooltip();
});
</script>

</body>
</html>


