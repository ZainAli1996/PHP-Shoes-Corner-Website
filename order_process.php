 <!-- Order Place CODE -->

<?php 
session_start();
include('conf.php');
// PRODUCT ID GET

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
?>

<?php
$Total_Payment=0;

if(isset($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $id=>$value){

$select_cart = "SELECT * from `zaintbl` WHERE id = '$id'";

$result = mysqli_query($con, $select_cart);

while ($row = mysqli_fetch_array($result)){

  $id = $row['id'];
  $image = $row['image'];
	$name = $row['name'];
  $Product_Price = $row['newprice'];
  $Product_Quantity = $value;
  $Total_Amount = $Product_Price*$Product_Quantity;
  $Total_Payment=$Total_Payment+$Total_Amount;
  }

}

}

  $insert = "INSERT INTO `confirm_order`(`product_id`, `product_image`, `product_name`, `product_price`, `product_quantity`, `total_amount`, `total_payment`, `date`, `status`) VALUES ('$id', '$image', '$name', '$Product_Price', '$Product_Quantity', '$Total_Amount', '$Total_Payment',  NOW(), 'unpaid')";

  $query = mysqli_query($con, $insert);

  if($query){
        ?>
        <script>
        alert("YOUR ORDER HAS BOOKED SUCCESSFULLY.");
        location.replace("order_place.php");
        </script>
        <?php
      
      } else{
        ?>
        <script>
        alert("FAILED TO BOOK YOUR ORDER, PLEASE TRY AGAIN.");
        </script>
        <?php
      
        ?>
        <script>
          location.replace("cart.php");
        </script>
        <?php
      
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

