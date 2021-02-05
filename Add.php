<?php 
session_start();

                    // ROLE BASED PAGE RESTRICTION

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='admin'){
  header('location:index.php');
  die();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Product</title>
	 <meta charset="utf-8">
	<link href="css/add.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="icon" href="icon/shoes.png" sizes="50x50">

  <style>
    body  {
     background-color: lightgray;
      }
</style> 

</head>

<body>
	
<div class="container-fluid">

	  <?php
			if (isset($_SESSION['fullname'])):
			?>
	<h6><?php echo $_SESSION['fullname'];?> </h6></button>
      <?php endif; ?>

	 <h5><span style="color: #D50000">WECOME TO</span> ADD NEW PRODUCTS PANNEL </h5>
	 <h3>ADD NEW PRODUCTS IN YOUR WEBSITE</h3>

		<ul>
      		<li>
       			 <a href="Dashboard.php"><button type="button" class="btn btn-primary">Go to Dashboard</button></a>
      		</li>
    	</ul>

									<!-- TABLE -->
			<div class="container">
			<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
		<form action="actions.php" method="post" enctype="multipart/form-data">
	<table width="200" class="table table-bordered table-hover text-center">
  <tbody>
    <tr>
      <td>Product Name</td>
      <td><input type="text" class="form-control" name="pname" placeholder="Product Name" required/></td>
    </tr>
    <tr>
      <td>Old Price</td>
      <td><input type="text" class="form-control" name="oldprice" placeholder="Old Price (without using comma)" required/></td>
    </tr>
    <tr>
      <td>New Price</td>
      <td><input type="text" class="form-control" name="newprice" placeholder="New Price (without using comma)" required/></td>
    </tr>
    <tr>
      <td>Detail</td>
      <td><input type="text" class="form-control" name="discription" placeholder="Product Details" required/></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><input type="file" name="img" required/></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="add" value="Add This Product"/></td>
    </tr>
  </tbody>
</table>
</form>
	</div>	
		</div>
		</div>

		<i class="fas fa-check"></i>

</div>

</body>
</html>
