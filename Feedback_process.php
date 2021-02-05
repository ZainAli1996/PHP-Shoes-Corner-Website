                            <!-- Feedback CODE -->

<?php 
session_start();
include('conf.php');

if(isset($_POST['btn'])){

$First_name = mysqli_real_escape_string($con, $_POST['first_name']);
$Last_name = mysqli_real_escape_string($con, $_POST['last_name']);
$Email = mysqli_real_escape_string($con, $_POST['email']);
$City = mysqli_real_escape_string($con, $_POST['city']);
$Contact = mysqli_real_escape_string($con, $_POST['contact']); 
$Comments = mysqli_real_escape_string($con, $_POST['comments']); 


$insertquery = "insert into `feedback` (first_name, last_name, email, city, contact, comments) values('$First_name', '$Last_name', '$Email', '$City', '$Contact', '$Comments')";
$query = mysqli_query($con, $insertquery);

    if($query){

      ?>
      <script>
      alert("You Information Has Recorded Successfully.");
      </script>
      <?php 

      ?>
      <script>
        location.replace("index.php");
      </script>
      <?php

    } 
    else{
        echo "Data Failed to Insert";

        ?>
        <script>
          location.replace("feedback.php");
        </script>
        <?php

    }


}
?>
