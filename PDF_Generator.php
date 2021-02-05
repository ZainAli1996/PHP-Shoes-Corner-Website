<!-- PDF GENERATING -->
<?php 
include('conf.php');
include("vendor/autoload.php"); 

   $css = file_get_contents('css/PDF.css');
   $body ='<div class="Box">
   <h1>Order Summary</h1>
   <div class="container">
      <div class="row">
         <div class="col-12">';

            
               $query="SELECT * FROM `confirm_order`";
               $run=mysqli_query($con,$query);
               while($row=mysqli_fetch_assoc($run)){
               
               $id = $row['id'];
               $product_id = $row['product_id'];
               $Product_Image = $row['product_image'];
               $Product_Name = $row['product_name'];
               $Product_Price = $row['product_price'];
               $Product_Quantity = $row['product_quantity'];
               $Total_Amount = $Product_Price*$Product_Quantity; 
               $Date = $row['date'];
               $Status = $row['status'];
               
               
               $body.='<div class="order_summary">
               <h6 class="ship">Serial No. '.$row['id'].'</h6>
               <h6 class="ship">PRODUCT ID: '.$row['product_id'].'</h6>
               <h6 class="ship"> PRODUCT IMAGE: <img src="img/'.$row['product_image'].'" width="120" height="120"></h6>
               <div class="naam">
                  <h6 class="ship">PRODUCT NAME: '.$row['product_name'].'</h6>
               </div>
               <h6 class="ship">PRODUCT PRICE: <b>'.$row['product_price'].'</b></h6>
               <h6 class="ship">PRODUCT QUANTITY: <b> '.$row['product_quantity'].'</b></h6>
               <h6 class="ship bg-info p-1 rounded">TOTAL AMMOUNT: <b>PKR '.$row['total_amount'].'</b>/=</h6>
               <h6 class="ship">BUYING DATE: '.$row['date'].'</h6>
               <h6 class="ship bg-danger">STATUS: '.$row['status'].'</h6>
            </div>
            <h6 class="ship bg-warning mx-5 my-2 p-2 rounded">TOTAL PAYMENT: <b>PKR '.$row['total_payment'].'</b>/=</h6>
         </div>
      </div>
   </div>
</div>
<div>
<h2> THANK YOU FOR SHOPPING WITH US </h2>
</div>';

   }

   

   $mpdf = new \Mpdf\Mpdf();
   $mpdf -> WriteHTML($css,1);
   $mpdf -> WriteHTML($body,2);
   $mpdf -> Output();
   
?>