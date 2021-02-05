<?php
session_start();
	
if(isset($_GET['id'])){
    $id=$_GET['id'];

// IF USER IS LOGEED IN ONLY WHEN PRODUCT CAN ADD TO CART

if (isset($_SESSION['fullname'])){

		$action=$_GET['action'];
		
    switch($action){
	  case "add":
    if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]++;
    }else{
    $_SESSION['cart'][$id]=1;
    }header('location:cart.php');
    break;
			 
   case "remove":			
    $_SESSION['cart'][$id]--;	
    if($_SESSION['cart'][$id]==0){
    unset($_SESSION['cart'][$id]);
    }header('location:cart.php');
    break;

    case 'vanish':
      if (!empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $key => $value) {
              if ($_GET['id'] == $key) {
                  unset($_SESSION['cart'][$key]);
              }
              if (empty($_SESSION['cart'])) {
                  unset($_SESSION['cart']);
              }
          } 
      }header('location:cart.php');
      break;

	 case "clear":
	 unset($_SESSION['cart']);
	 header('location:index.php');
   }		

  }
?>

<?php } ?>

<!--  CHECKING LOGIN CONDITION -->
<?php
		if (!isset($_SESSION['fullname'])){
				
      echo "<script>
      alert('FOR PURCHASE, PLEASE LOGIN FIRST.');
      document.location='login.php';
      </script>";
		}
?>
<!-- LOGIN CONDITION END -->