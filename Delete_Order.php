<?php
session_start();
include("conf.php");
?>

								<!-- ORDER DELETE CODE -->

<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];

	$query="delete from `confirm_order` where id = '$id'";
	$res=mysqli_query($con,$query);
	
	if($res){
		echo "<script>
		alert('SELECTED ORDER HAS CANCELLED SUCCESSFULLY.');
		document.location='cart.php';
		</script>";
	}else{
			echo "<script>
		alert('FAILED to CANCEL Your Order');
		document.location='shipping.php';
		</script>";
	}

}
?>