<?php
session_start();
include('conf.php');

                    // ROLE BASED PAGE RESTRICTION

if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']!='admin'){
    header('location:index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="icon/shoes.png" sizes="50x50">
  <link  rel="stylesheet" href="css/role.css">
    <title>User Role</title>
    <style>
        body  {
        background-color: floralwhite;
        }
    </style> 
</head>

<body>
	<div class="container-fluid">
		  
          <!-- ROLE VIEW TABLE -->
            
    <?php
    if (isset($_SESSION['fullname'])):
    ?>
    <h4><?php echo $_SESSION['fullname'];?> </h4></button>
    <?php endif; ?>

    <h5><span style="color: #D50000">WELCOME TO</span> USER ROLE PANNEL</h5>

    <ul>
    <li>
    <a href="Dashboard.php"><button type="button" class="btn btn-success">Go to Dashboard</button></a>
    </li>
    </ul>
        
    <div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
    <table width="400" border="1" class="table table-bordered table-hover">
    <tbody>
    <tr class="text-center" style="color:blue;">
    <td>ID</td>
    <td>FULLNAME</td>
    <td>EMAIL</td>
    <td>USER TYPE</td>
    </tr>

    <?php

    $query="select * from `registration`";
    $dis=mysqli_query($con,$query) or die(mysqli_error());
    while($row=mysqli_fetch_assoc($dis)){

    $id = $row['id'];
    $Fullname = $row['fullname'];
    $Email = $row['email'];
    $Usertype = $row['user_type'];
    ?>

    <tr class="text-center">
    <td><?php echo $id ?></td>
    <td><?php echo $Fullname ?></td>
    <td><?php echo $Email ?></td>
    <td><?php echo $Usertype ?></td>
    </tr>

    <?php } ?>

    </tbody>
    </table>

    </div>
    </div>
            <!-- Responsive col CLOSED -->
    </div>


    </div>
</body>
</html>