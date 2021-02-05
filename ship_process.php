<?php 
session_start();
include('conf.php');

// PRODUCT ID GET

if(isset($_GET['id'])){
    $id = $_GET['id'];
  
    // GETING Ordered Product ID
    
    $query = "SELECT * from `zaintbl` WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $product_id = $row['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SHIPPING</title>
    <meta charset="utf-8">
	<meta name="language" content="en">
	<meta name="author" content="ZAIN_ALI">
	<meta name="keywords" content="SHOES CORNER, Cheap Shoes, Shoes in Karachi, New Shoes, Shoes Sale, Adidas Shoes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/Ship_process.css">
    <link rel="icon" href="icon/shoes.png" sizes="50x50"
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
			<a href="cart.php" data-tooltip title="YOU HAVE <?php echo "$count";?> ITEMS IN YOUR CART"><i class="fa fa-shopping-cart" aria-hidden="true"><h2><b>(<?php echo "$count";?>)</b></h2></i></a>
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

					<!-- FOR HIDING ADMIN PANEL BUTTON FROM USER -->

		<?php if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='user'){ ?>
	
	  <a class="nav-link" href="Dashboard.php" style="text-align: center;">ADMIN PANEL</a>

	  <?php } ?>
	  <a class="nav-link" href="Logout.php" style="text-align: center;">LOG OUT</a>
	</div>
		  </div>

		  </ul>
		</div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-12">

    <div class="Box">
        <h1>SHIPPING DETAILS</h1>
        
        <?php
        $query="SELECT * FROM `shipping`";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($run)){

        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email']; 
        $province = $row['province'];
        $city = $row['city'];
        $area = $row['area'];
        $address = $row['address'];
        $contact = $row['contact'];
        $zip = $row['zip'];
        ?>
        <div class="order_summary">
    
        <h6 class="ship">FIRST NAME: <b><?php echo $first_name;?></b></h6>
        <h6 class="ship">LAST NAME: <b><?php echo $last_name;?></b> </h6>
        <h6 class="ship">EMAIL: <b><?php echo $email;?></b></h6>
        <h6 class="ship">PROVINCE: <b><?php echo $province;?></b></h6>
        <h6 class="ship">CITY: <b><?php echo $city;?></b></h6>
        <h6 class="ship">AREA: <b><?php echo $area;?></b></h6>
        <h6 class="ship">ADDRESS: <b><?php echo $address; ?></b></h6>
        <h6 class="ship">CONTACT: <b><?php echo $contact; ?></b></h6>
        <h6 class="ship">ZIP: <b><?php echo $zip; ?></b></h6>
        </div>

        <?php } ?>

    </div>

    <div class="Box1 mb-3">
        <h1>CART ITEMS DETAIL</h1>
        
        <?php

        $Total_Payment=0;

        if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $id=>$value){

        $query="SELECT * FROM `zaintbl` WHERE id = '$id'";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($run)){

        $id = $row['id'];
        $image = $row['image'];
        $name = $row['name'];
        $newprice = $row['newprice'];
        $Product_Quantity = $value;
        $Total_Amount = $newprice*$Product_Quantity;
        $Total_Payment=$Total_Payment+$Total_Amount;

        ?>

        <div class="order_summary">
    
            <h6 class="ship">PRODUCT ID: <b><?php echo $id; ?></b></h6>
            <h6 class="ship">PRODUCT IMAGE: <img src="img/<?php echo $image ?>" width="120" height="120"></h6>
            <h6 class="ship">PRODUCT NAME: <b><?php echo $name; ?></b></h6>
            <h6 class="ship">PRODUCT PRICE: <b><?php echo $newprice; ?></b></h6>
            <h6 class="ship">PRODUCT QUANTITY: <b><?php echo $Product_Quantity; ?></b></h6>
            <h6 class="ship">TOTAL AMOUNT: <b><?php echo $Total_Amount; ?></b></h6>

        </div>

    

        <?php } ?>

        <?php } ?>
        <?php } ?>
        
        <h6 class="ship my-2 bg-warning mx-5">TOTAL PAYMENT: PKR<b><?php echo $Total_Payment; ?></b>/=</h6>

    </div>


    <div class="charges">
        <h3> Standard Shipping Charges = 150RS</h3>
    </div>
    <a href="payment.php?id=<?php echo $product_id;?>" class="btn btn-info">CONTINUE TO PAYMENT</a>

</div>
  </div>
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