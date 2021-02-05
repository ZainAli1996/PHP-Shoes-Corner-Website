<?php
session_start();
include("conf.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];

    // GETING Ordered Product ID

  $query = "SELECT * from `zaintbl` WHERE id = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  $product_id = $row['id'];
}
?>

<!Doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CART</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="icon/shoes.png" sizes="50x50">
  <link rel="stylesheet" href="css/Cart.css">
  <style>
    body{
      background-image: url(img/CartBG.png);
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body>
<center>

									        	<!-- NAVBAR START -->
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
   
	<?php }else{ ?>
	<li class="nav-item">
		<a class="nav-link" href="Login.php" style="color: blue !important;">LOGIN</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="Registration.php" style="color: green !important;">REGISTER</a>
	  </li>
	<?php } ?>

					<!-- LOGIN CONDITION BUTTON DISPLAY END-->

	<?php
	$count=0;
	if(isset($_SESSION['cart'])){
		$count=count($_SESSION['cart']);
	}
	?>

	  <li class="nav-item">
		  <div class="cart">
		<a href="cart.php" data-tooltip title="YOU HAVE <?php echo "$count";?> ITEMS IN YOUR CART"><i class="fa fa-shopping-cart" aria-hidden="true"><h2 class="count"><b>(<?php echo "$count";?>)</b></h2></i></a>
		</div>
          	  </li>

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
									        	  <!-- NAVBAR END -->

<div class="container">

  <h2><span style="color: #D50000">Shopping</span> Cart</h2>  
  <h5>Shop Happiness From Here</h5>

  <?php

      $Total_Payment=0;

    if(isset($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $id=>$value){
      
    $query="SELECT * FROM `zaintbl` WHERE id='$id'";
    $dis=mysqli_query($con,$query);	
    $row=mysqli_fetch_assoc($dis);

    $id = $row['id'];
    $name = $row['name'];
    $price = $row['newprice'];
    $image = $row['image'];
    $Product_Quantity = $value;
    $Total_Amount = $price*$Product_Quantity;
    $Total_Payment=$Total_Payment+$Total_Amount;
    
    $_SESSION['amount']=$Total_Payment;
   
  ?>
         
  <div class="MainBox rounded">

          <div class="Image">
            <img src="img/<?php echo $image;?>" name="image" height="223" width="225">
          </div>

        <div class="Details">

        <h6>Product ID = <b><?php echo $id;?></h6></b><br>
            <h3>Product Name = <b><?php echo $name;?></h3></b><br>
            <h6>Product Price = <b><?php echo $price;?></h6></b><br>
              <h1>Quantity =
               <a href="cart_process.php?id=<?php echo $id;?>&action=remove" style=color:red;><i class="fa fa-minus-square" aria-hidden="true"></i></a> 
                <b><?php echo $Product_Quantity;?></b>
               <a href="cart_process.php?id=<?php echo $id;?>&action=add" style=color:green;> <i class="fa fa-plus-circle" aria-hidden="true"></i></a>  
              </h1><br>
        <h6>Amount = <b>PKR <?php echo $Total_Amount;?></b></h6><br>
<h6 class="mb-1">Remove This Product<a href="cart_process.php?id=<?php echo $row["id"]?>&action=vanish"><i class="fa fa-trash" aria-hidden="true"></i></a></h6>
      
        </div>
  </div>

  <?php } ?> 
                        <!-- Select Data Query END -->

      <div class="Total">
        <h6>Pay Total = <b>PKR <?php echo $Total_Payment?></h6></b>
      </div>

  <?php  } ?>

                        <!-- Session Cart Query END -->  

                        <!-- CART BUTTON DISPLAY START-->

  <?php if( isset($_SESSION['cart']) && !empty($_SESSION['cart']) ){
	?>
<div class="Buttons">

    <div class="Continue_Shopping">
      <a href="index.php" class="btn btn-warning">Continue Shoping</a>
    </div>

   <div class="Empty_Cart">
      <a href="cart_process.php?id=<?php echo $row['id']?>&action=clear" class="btn btn-primary">Empty Cart</a>
    </div>

    <div class="CustomerID">
      <a href="shipping.php?id=<?php echo $id;?>" class="btn btn-success">PROCEED TO CHECKOUT</a>
    </div>

</div>
	<?php }else{ ?>

  <div class="mycart">
    <?php
    echo "YOUR CART IS EMPTY, PLEASE ADD ITEMS IN YOUR CART.";
    ?> <span style='font-size:20px;'>&#128578;</span>
  </div>

   <div class="Continue_Shopping">
      <a href="index.php" class="btn btn-warning">Continue Shoping</a>
    </div>
   
	<?php } ?>

					          <!-- CART BUTTON DISPLAY END-->

</div>
</center>

<script>
$(function(){
	$('[data-tooltip]').tooltip();
});
</script>

</body>
</html>