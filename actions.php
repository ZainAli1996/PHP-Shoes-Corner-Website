
                          <!-- REGISTRATION CODE -->

<?php
session_start();
include('conf.php');
?>

<?php
if(isset($_POST['btn'])){

$Fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$Phone = mysqli_real_escape_string($con, $_POST['phone']);
$Email = mysqli_real_escape_string($con, $_POST['email']);
$User_type = mysqli_real_escape_string($con, $_POST['user_type']);
$Password = mysqli_real_escape_string($con, $_POST['psw']);
$ConfirmPW = mysqli_real_escape_string($con, $_POST['psw_confirm']);

              // PASSWORD ENCRYPTION
$pass = password_hash($Password, PASSWORD_BCRYPT);
$cpass = password_hash($ConfirmPW, PASSWORD_BCRYPT);

$token = bin2hex(random_bytes(15));

    // EMAIL ALREADY EXISTS
  $emailquery = " select * from registration where email = '$Email' ";
  $query = mysqli_query($con, $emailquery);

  // MULTIPLE EMAIL CHECKING
  $emailcount = mysqli_num_rows($query); 

  if($emailcount>0){
    ?>
      <script>
      alert("Email already exist.");
      </script>
    <?php 

     ?>
        <script>
          location.replace("Registration.php");
        </script>
        <?php

    } 

  // PASSWORD MATCH CHECKING 
  else{
    if($Password === $ConfirmPW){

      $insertquery = "insert into `registration` (fullname, phone, email, user_type, psw, psw_confirm, token, status) values('$Fullname', '$Phone', '$Email', '$User_type', '$pass', '$cpass', '$token', 'inactive')";
      $iquery = mysqli_query($con, $insertquery);

      if($iquery){

      $subject = "Email Activation";
      $body = "Hi, $Fullname Click Here To Activate Your Account http://localhost/ZAIN_ALI/activate.php?token=$token";
      $sender_email = "From: zainirshadali@gmail.com";

      if(mail($Email, $subject, $body, $sender_email)) {
          $_SESSION['msg'] = "Check Your MAIL To Activate Your Account $Email";
          header('location:Login.php');
      } else {
          echo "Email sending failed...";
      }

      } else{
        ?>
        <script>
        alert("Registration is UNsuccessful, Please try again.");
        </script>
        <?php
 
        ?>
        <script>
          location.replace("Registration.php");
        </script>
        <?php

      }

    } else{
      ?>
      <script>
      alert("Password Did Not Match.");
      </script>
      <?php

      ?>
        <script>
          location.replace("Registration.php");
        </script>
        <?php

    }

  }

}
?>

                          <!-- ADD NEW PRODUCTS CODE -->

<?php

if(isset($_POST['add'])){
	$fimg=$_FILES['img']['name'];	
	$tmpimg=$_FILES['img']['tmp_name'];
	$pname=$_POST['pname'];
	$op=$_POST['oldprice'];
	$np=$_POST['newprice'];
	$disc=$_POST['discription'];


	$target="upload/".$fimg;
	move_uploaded_file($tmpimg,$target);
	$query="insert into `zaintbl` values ('','$pname','$op','$np','$fimg','$disc',now())";
	$res=mysqli_query($con,$query) or die(mysqli_error());
	
	if($res){
		echo "<script>
		alert('Product Stored');
		document.location='View.php';
		</script>";
	
	}else{
		echo "<script>
		alert('Product Not Stored');
		</script>";
	}
}

?>



                            <!-- Shipping CODE -->
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
?>

<?php 

if(isset($_POST['submit'])){

$First_name = mysqli_real_escape_string($con, $_POST['first_name']);
$Last_name = mysqli_real_escape_string($con, $_POST['last_name']);
$Email = mysqli_real_escape_string($con, $_POST['email']);
$Country = mysqli_real_escape_string($con, $_POST['country']);
$Province = mysqli_real_escape_string($con, $_POST['province']);
$City = mysqli_real_escape_string($con, $_POST['city']);
$Area = mysqli_real_escape_string($con, $_POST['area']);
$Address = mysqli_real_escape_string($con, $_POST['address']);
$Contact = mysqli_real_escape_string($con, $_POST['contact']); 
$Zip = mysqli_real_escape_string($con, $_POST['zip']); 


$insertquery = "INSERT into `shipping` (first_name, last_name, email, country, province, city, area, address, contact, zip) values('$First_name', '$Last_name', '$Email', '$Country', '$Province', '$City', '$Area', '$Address', '$Contact', '$Zip')";
$query = mysqli_query($con, $insertquery);

    if($query){

      ?>
      <script>
      alert("Your Shipping Information Recorded Successfully.");
      </script>
      <?php 

      ?>
      <script>
        location.replace("ship_process.php");
      </script>
      <?php

    } 
    else{
        echo "Data Failed to Insert";

        ?>
        <script>
          location.replace("shipping.php");
        </script>
        <?php

    }


}
?>



