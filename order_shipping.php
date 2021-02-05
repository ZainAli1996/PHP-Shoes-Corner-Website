<?php
session_start();
include("conf.php");

                    // ROLE BASED PAGE RESTRICTION

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='admin'){
  header('location:index.php');
  die();
}
?>

<?php if (isset($_GET['action']) && $_GET['action'] =='order_shipping' && $_GET['id']) {?>
           <!-- &&	Checkes Both Values Are "TRUE" -->
             <!-- ==	Checkes Both Values Are "Equal" -->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Orders Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="icon/shoes.png" sizes="50x50">
    <link rel="stylesheet" href="css/order_details.css">
</head>
<body>
                            <!-- THEN SECOND THIS PAGE EXICUTES -->
    <ul>
        <li>
          <a href="order_shipping.php" class="btn btn-primary">GO BACK</a>
       </li>
    </ul>

    <h2><span style="color: #D50000">CUSTOMERS ORDERS</span> DETAILS</h2>
  
  <div class="container">
    <div class="row">
<table class="table text-center mt-1 table-bordered">
  <thead>
    <tr class="text-center" style="color:#28a745;">
      <td>Order ID</td>
      <td>Product ID</td>
      <td>Product Name</td>
      <td>Product Image</td>
      <td>Product Price</td>
      <td>Product Quantity</td>
      <td>Total Payment</td>
      <td>Date (yyy/mm/dd)</td>
      <td class="text-center">Status</td>
    </tr>
  </thead> 

<?php 

// PRODUCT ID GET

if(isset($_GET['id'])){
  $id = $_GET['id'];
  }

  $query = "SELECT * FROM  confirm_order WHERE id='$id'";
  $run = mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($run)){

    $id = $row['id'];
    $Product_ID = $row['product_id'];
    $Product_Name = $row['product_name'];
    $Product_Image = $row['product_image'];
    $Product_Price = $row['product_price'];
    $Product_Quantity = $row['product_quantity'];
    $Total_Payment = $row['total_payment'];
    $Date = $row['date'];
    $Status = $row['status'];
  ?>

    <tbody>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $Product_ID; ?></td>
        <td><?php echo $Product_Name; ?></td>
        <td><img src="img/<?php echo $Product_Image; ?>"width="100"></td>
        <td><?php echo $Product_Price; ?></td>
        <td><?php echo $Product_Quantity; ?></td>
        <td><?php echo $Total_Payment; ?></td>
        <td><?php echo $Date; ?></td>
        <td class="text-danger" ><?php echo $Status; ?></td>

      </tr>
    </tbody>
    <?php } ?>
</table>
</div>
</div>
</body>
</html>

  <?php  } else {?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders Shipping</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="icon/shoes.png" sizes="50x50">
    <link rel="stylesheet" href="css/ORder_Shipping.css">
</head>
<body>
                            <!-- FIRST THIS PAGE EXICUTES -->
    <ul>
        <li>
        <a href="Dashboard.php"><button type="button" class="btn btn-success">Go to Dashboard</button></a>
        </li>
    </ul>

    <h5><span style="color: #D50000">PRODUCT SHIPPING</span> DETAILS</h5>
				
<div class="container">
			<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
<form action="order_shipping.php" method="POST">
			<table width="400" border="1" class="table table-bordered table-hover">
  <tbody>
    <tr class="text-center" style="color:#6610f2;">
      <td>Ship ID</td>
      <td>First_Name</td>
      <td>Last_Name</td>
      <td>Email_Address</td>
      <td>Country</td>
      <td>Province</td>
      <td>City</td>
      <td>Area</td>
      <td>Home_Address</td>
      <td>Contact_Number</td>
      <td>Zip</td>
      <td>Customers Orders</td>
    </tr>
	  
	  <?php

	  $query="SELECT * from `shipping`";
	  $dis=mysqli_query($con,$query) or die(mysqli_error());
	  while($rows=mysqli_fetch_assoc($dis)){

      $Shipping_ID = $rows['id'];
      $first_name = $rows['first_name'];
      $last_name = $rows['last_name'];
      $email = $rows['email'];
      $country = $rows['country'];
      $province = $rows['province'];
      $city = $rows['city'];
      $area = $rows['area'];
      $address = $rows['address'];
      $contact = $rows['contact'];
      $zip = $rows['zip'];
    ?>
    
  <tr class="text-center">
    <td ><?php echo $Shipping_ID ?></td>
    <td><?php echo $first_name ?></td>
    <td><?php echo $last_name ?></td>
    <td><?php echo $email ?></td>
    <td><?php echo $country ?></td>
    <td><?php echo $province ?></td>
    <td><?php echo $city ?></td>
    <td><?php echo $area ?></td>
    <td><?php echo $address ?></td>
    <td><?php echo $contact ?></td>
    <td><?php echo $zip ?></td>
    <td><a href="?action=order_shipping&id=<?php echo $Shipping_ID ?>"><button type="button" class="btn btn-primary">Details</button></a></td>
</form>
  </tr>

  <?php }} ?>

</tbody>
</table>
  </div>
  </div>
			            	<!-- Responsive col CLOSED -->

</div>
</body>
</html>