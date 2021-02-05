<?php
session_start();
include("conf.php");

	if(isset($_SESSION['amount'])){
		$Total_Payment=$_SESSION['amount'];
        }
       
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        // GETING Ordered Product ID

      $query = "SELECT * from `zaintbl` WHERE id = '$id'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      $product_id = $row['id'];
    }
       
?>

<!-- EMPTY CART CONDITION CHECK -->
<?php

  if(!isset($_SESSION['fullname'])){
		?>
      <script>
      alert("YOUR CART IS EMPTY, PLEASE SHOPPING FIRST.");
      document.location='index.php'
      </script>
		<?php
     }
?> 


<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>PHP Payment API</title>
    <meta charset="utf-8">
    <meta name="language" content="en">
    <meta name="author" content="ZAIN_ALI">
    <meta name="keywords" content="SHOES CORNER, Cheap Shoes, Shoes in Karachi, New Shoes, Shoes Sale, Adidas Shoes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="icon/shoes.png" sizes="50x50">
    <link rel="stylesheet" href="css/Pay.css">
    
    <style>
        body  {
    background-image: url(img/Transaction.jpg);
    background-size: cover;
    background-repeat: no-repeat;
          }
    </style> 
    
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

<div class="pay_details">
    <form id="myCCForm" action="payment.php" method="post">
            <input id="token" name="token" type="hidden" value="">
            <div>
                <label>
                    <span>Card Number</span>
                </label>
                <input id="ccNo" type="text" placeholder="Enter Card Number" size="20" value="" autocomplete="off" required />
            </div>
            <div>
                <label>
                    <span>Expiration Month</span>
                </label>
                <input type="text" placeholder="Enter ExpMonth" size="2" id="expMonth" required />
                <label>
                    <span>Expiration Year</span>
                </label>
                <input type="text" placeholder="Enter ExpYear"size="2" id="expYear" required />
            </div>
            <div>
                <label>
                    <span>CVC</span>
                </label>
                <input id="cvv" size="4" type="text" placeholder="Enter CVC"value="" autocomplete="off" required />
                PKR: <b><?php echo $Total_Payment;?></b>/=
            </div>
            <a type="submit" href="order_process.php?id=<?php echo $product_id ?>" class="btn btn-success">Submit Payment</a>
    </form>
</div>
      
<div class="Box">
    <h1>Ship To:</h1>

    <?php

    $query="SELECT * from shipping";
    $run=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($run)){

    $First_Name = $row['first_name'];
    $Last_Name = $row['last_name'];
    $Email = $row['email'];
    $Country = $row['country'];
    $Province = $row['province'];
    $City = $row['city'];
    $Area = $row['area'];
    $Address = $row['address'];
    $Zip_Code = $row['zip'];
    
    ?>
    <div class="Ship_to">
    
    <h6>FIRST NAME: <b><?php echo $First_Name ?></b></h6>
    <h6>LAST NAME: <b><?php echo $Last_Name ?></b></h6>
    <h6>EMAIL: <b><?php echo $Email ?></b></h6>
    <h6>COUNTRY: <b><?php echo $Country ?></b></h6>
    <h6>PROVINCE: <b><?php echo $Province ?></b></h6>
    <h6>CITY: <b><?php echo $City ?></b></h6>
    <h6>AREA: <b><?php echo $Area ?></b></h6>
    <h6>ADDRESS: <b><?php echo $Address ?></b></h6>
    <h6>ZIP CODE: <b><?php echo $Zip_Code ?></b></h6>
    </div>
    <br>
    <?php } ?>

    </div>


    </div>
    </div>
    <!-- Responsive col CLOSED -->
    </div>


<?php include 'footer.php';?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>
            // Called when token created successfully.
            var successCallback = function(data) {
                var myForm = document.getElementById('myCCForm');

                // Set the token as the value for the token input
                myForm.token.value = data.response.token.token;

                // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
                myForm.submit();
            };

            // Called when token creation fails.
            var errorCallback = function(data) {
                if (data.errorCode === 200) {
                    tokenRequest();
                } else {
                    alert(data.errorMsg);
                }
            };

            var tokenRequest = function() {
                // Setup token request arguments
                var args = {
                    sellerId: "901416513",
                    publishableKey: "3DDCF40D-C2C6-49B9-BEF8-26633B09C90F",
                    ccNo: $("#ccNo").val(),
                    cvv: $("#cvv").val(),
                    expMonth: $("#expMonth").val(),
                    expYear: $("#expYear").val()
                };

                // Make the token request
                TCO.requestToken(successCallback, errorCallback, args);
            };

            $(function() {
                // Pull in the public encryption key for our environment
                TCO.loadPubKey('sandbox');

                $("#myCCForm").submit(function(e) {
                    // Call our token request function
                    tokenRequest();

                    // Prevent form from submitting
                    return false;
                });
            });
</script>
     

<script>
$(function(){
	$('[data-tooltip]').tooltip();
});
</script>

</body>
</html>