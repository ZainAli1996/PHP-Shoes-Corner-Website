<?php
session_start();
include("conf.php");
?>

<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];

	$query="delete from `zaintbl` where id='$id'";
	$res=mysqli_query($con,$query) or die (mysqli_error());
	
	if($res){
		echo "<script>
		alert('DATA SUCCESSFULLY DELETED');
		document.location='View.php';
		</script>";
	}else{
		echo "<script>
		alert('FAILED to Delete Data');
		document.location='View.php';
		</script>";
	}
}
?>