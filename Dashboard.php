<?php 
session_start();
include("conf.php");

                    // ROLE BASED PAGE RESTRICTION

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='admin'){
	header('location:index.php');
	die();
}
?>

<!--  CHECKING LOGIN CONDITION -->
<?php
    if (isset($_SESSION['fullname'])){
      
    echo "<script> 
    alert('WELCOME TO ADMIN PANEL.');
    header('location:Dashboard.php');
    </script>";
 
		}else{
    echo "<script>
    alert('WARNING! Access Denied.');
    document.location='login.php';
    </script>";
  }
?>
<!-- LOGIN CONDITION END -->

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="icon/shoes.png" sizes="50x50">
  <link rel="stylesheet" href="css/dashboard.css">

<style>
    body  {
      background-image: url(img/Dash.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      }
</style> 

</head>
<body>

  <div class="container-fluid mt-2">
   
    <a href="index.php"><button type="button" class="btn btn-warning">GO TO HOMEPAGE</button></a>

    <?php
			if (isset($_SESSION['fullname'])):
			?>
	<h4><?php echo $_SESSION['fullname'];?> </h4></button>
      <?php endif; ?>

    <h5><span style="color: #D50000">WELCOME TO</span> DASHBOARD</h5>
   
    <div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
    <img src="img/dashboard.png" class="card-img" alt="pic" style="height: 100px; width: 100px; margin: 5px;">
    <h2 style="border-bottom: blue solid 2px; color:red; width:240px">ADMIN RIGHTS</h2> 

  <ul>
    <li><a href="Role.php"><h6 class="btn btn-info" >VIEW ROLES</h6></a></li>
    <li><a href="order_shipping.php"><h6 class="btn btn-primary" >VIEW ORDERS</h6></a></li>
    <li><a href="View.php"><h6 class="btn btn-success">VIEW PRODUCTS</h6></a></li>
    <li><a href="Add.php"><h6 class="btn btn-danger" >ADD NEW PRODUCTS</h6></a></li>
    
  </ul> 
    
    </div>
    </div>
    </div>
    
    
    </div>

</body>
</html>
