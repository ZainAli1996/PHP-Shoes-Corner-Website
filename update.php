<?php

include("conf.php");

                       // Data Get
  
  if(isset($_GET['id'])){                     
	$id=$_GET['id'];
	$query = "select * from zaintbl where id='$id'";
	$up=mysqli_query($con,$query);
	
  while($row=mysqli_fetch_array($up)){
	  
  $pname=$row['name'];
  $op=$row['oldprice'];
  $np=$row['newprice'];
  $disc=$row['discription'];
  $image=$row['image'];
    
  }
  ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Update</title>
	 <meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="icon" href="icon/shoes.png" sizes="50x50">
  <link rel="stylesheet" type="text/css" href="css/Update.css">

  <style>
    body  {
     background-color: #F8F9F9;
      }
</style> 

</head>

<body>

                            <!-- PRODUCT UPDATE -->
                            
<h3>Update Products</h3>
<br>

  <ul>
      <li>
       		<a href="View.php"><button type="button" class="btn btn-info">GO BACK</button></a>
      </li>
  </ul>


<form action="updated.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

	<table  align="center" width="500" border="0">
  <tbody>
    <tr>
      <td>Product Name</td>
      <td><input type="text" name="pname" class="form-control" required placeholder="Product Title" value="<?php echo $pname;?>"></td>
    </tr>
    <tr>
      <td>Old Price</td>
      <td><input type="text" name="oldprice" class="form-control" required placeholder="Old Price" value="<?php echo $op;?>"></td>
    </tr>
    <tr>
      <td>New Price</td>
      <td><input type="text" name="newprice" class="form-control" required placeholder="New Price" value="<?php echo $np;?>"></td>
    </tr>
    <tr>
      <td>Detail</td>
      <td><input type="text" name="discription" class="form-control" required placeholder="Discription" value="<?php echo $disc;?>"></td>
    </tr>
    <tr>
      <td><h4>Current Image</h4></td>
      <td><img class= "imgz" src="img/<?php echo $image;?>" width="100px"></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><input type="file" name="img" class="form-control" required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="update" class="btn btn-success" value="Update Product"/></td>
    </tr>
  </tbody>
</table>
</form>

<?php
}
?>

</body>
</html>
