<?php
session_start();
include("conf.php");
                       // Data Update

        $id = $_POST['id'];
        $name = $_POST['pname'];
        $price = $_POST['oldprice']; 
        $new_price = $_POST['newprice'];
        $discription = $_POST['discription'];

          $file_image =$_FILES['img']['name'];
          $tmp_name = $_FILES['img']['tmp_name'];  
          $target = "upload/".$file_image ;

          move_uploaded_file($tmp_name ,$target);

          $sql = "UPDATE zaintbl 
                  set name = '$name',
                  oldprice = '$price',
                  newprice = '$new_price',
                  discription = '$discription',
                  image='$target'
                  where id='$id'";

          $query = mysqli_query($con,  $sql);

          if($query){
                echo "<script>
		alert('Data Has Updated Successfully');
		document.location='View.php';
		</script>";
          } 
          else{
                echo "<script>
		alert('Data has NOT updated');
		document.location='View.php';
		</script>";
          }
        
          ?>
            
