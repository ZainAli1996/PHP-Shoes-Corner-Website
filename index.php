<?php
session_start();
include("conf.php");
?>
								<!-- PAGINATION -->
<?php

$per_page=12;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	if($start<=0){
		$start=0;
		$current_page=1;
	}else{
		$current_page=$start;
		$start--;
		$start=$start*$per_page;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>SHOES CORNER</title>
	<meta charset="utf-8">
	<meta name="language" content="en">
	<meta name="author" content="ZAIN_ALI">
	<meta name="keywords" content="SHOES CORNER, Cheap Shoes, Shoes in Karachi, New Shoes, Shoes Sale, Adidas Shoes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/Style.css">
  <link rel="icon" href="icon/shoes.png" sizes="50x50">
</head>
<!-- PAGE LOADER START-->
<body onload="Myfunction()">
<div id="loading"></div>
<!-- PAGE LOADER END-->

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

								<!-- SLIDER -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Slider1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Slider2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Slider3.jpg" alt="Third slide">
	</div>
	<div class="carousel-item">
		<img class="d-block w-100" src="img/Slider4.jpg" alt="Third slide">
	  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
								<!-- SERVICES -->

<div class="Services">
		
	<div class="FreeShipping">
		<div><i class="fa fa-truck" aria-hidden="true"></i></div>
		<div><h3>Free Shipping</h3></div>
	</div> 
		
	<div class="Support">
		<div><i class="fa fa-headphones" aria-hidden="true"></i></div>
		<div><h3>24/7 Support</h3></div>
	</div>

	<div class="BestQuality">
		<div><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
		<div><h3>Best Quality</h3></div>
	</div>
		
</div>


								<!-- PRODUCTS -->
			
<div class="Products">
	<h1>NEW ARRIVALS</h1>
	<div class="contrainer-fluid">
	<div class="row">     
	<div class="col-12 my-2">		
	  
	<?php	  

	$query="SELECT * FROM zaintbl";
	$dis=mysqli_query($con,$query);
	$record=mysqli_num_rows($dis);
	$pagi=ceil($record/$per_page);

	$sql="SELECT * FROM zaintbl limit $start,$per_page";
	$res=mysqli_query($con,$sql);

	if(mysqli_num_rows($res)>0){

	while($row=mysqli_fetch_assoc($res)){

		$id = $row['id'];
		$name = $row['name'];
		$old_price = $row['oldprice'];
		$new_price = $row['newprice'];
		$image = $row['image'];
		?>

	

		<div class="Box shadow">
		<div class="Image">
			<img src="img/<?php echo $image ?>">
		</div>
		<div class="Detail">
			<div class="ProductName"><?php echo $name ?></div>
			<h6><font color="red"> <b>WAS: </b></font><s>PKR <?php echo $old_price ?></s></h6>
			<h6><font color="darkgreen"> <b>NOW: </b></font><b>PKR <?php echo $new_price ?></b></h6>
			<a href="cart_process.php?id=<?php echo $id;?>&action=add" class="btn btn-warning">Add to Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
		</div>
	</div>
    <?php } } else {?>
	<div class="records mx-5">
	No Record Found.
	</div>
	<?php } ?> 
	
	</div>
	</div>
	</div> 
</div>



<ul class="pagination justify-content-center">
	<?php 
	for($i=1;$i<=$pagi;$i++){
	$class='';
	if($current_page==$i){
		?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
	}else{
	?>
		<li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
	<?php
	}
	?>
    
<?php } ?>
</ul>



<?php include 'footer.php';?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
$(function(){
	$('[data-tooltip]').tooltip();
});
</script>

<!-- PAGE LOADER JS CODE START-->
<script>
    var preloader = document.getElementById('loading');
    function Myfunction(){
        preloader.style.display = 'none';
    }
    </script>
<!-- PAGE LOADER JS CODE END-->
</body>
</html>