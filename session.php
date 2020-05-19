<?php 

    // include('admin/examples/includes/connection.php');
    // session_start();

    // $user_check    = $_SESSION['login_user'];
    // $ses_sql       = mysqli_query($conn , "select email from customer where customer_email = '$user_check'");
    // $row           = mysqli_fetch_assoc($ses_sql);
    // $login_session = $row['your_email'];

    // if(!isset($_SESSION['login_user']))
    // {
    //     echo 111;die;
    //     header('location:signin.php');
    //     die();
    // }


?>
<?php
session_start();
//to  connect public side with data base.....
include('admin/includes/examples/connection.php');
 
if (!isset($_SESSION['userLog'])) {
header ("location:signin.php");}

if(isset($_POST['update'])){
	$name    = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];
	
	//open connection to data base from include file connection

//perform query Update..
    $query = "update customer set customer_name   = '$name',
   customer_address = '$address',
   customer_mobile      = '$phone',
   customer_email   = '$email'
    where customer_id = {$_GET['id']}";

    mysqli_query($conn,$query);

}

//to edit spacific customer according to custom_id that you get it from URL using $_GET method....
$query  = "select * from customer where customer_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$customer  = mysqli_fetch_assoc($result);


// when press on order.................................
if(isset($_POST['addtocart'])){
 $_SESSION['products'][] = $_GET['id'];
}
foreach ($_SESSION['products'] as $pro_id) {
  $qu = "SELECT * FROM product where product_id = $pro_id";
  $res = mysqli_query($conn,$qu);
  while($row = mysqli_fetch_assoc($res)){
    $productCart[] = $row ;
  }
}
                  //  $sum+=$singleProduct['product_price'] * $_SESSION["qty"][$singleProduct['product_id']];
             
                    


        if (isset($_POST['order'])) 
        {

            //foreach ($productCart as $singleProduct) {
            	$order_id=rand();
            	$order_price=$_SESSION['total'];
                $query= "insert into ordertable(O_id,O_price)
                VALUES ($order_id,$order_price)";
                //echo $query;die;
                mysqli_query($conn,$query);
                //}
       
            if (count($productCart)>0) {
             // if (isset($_SESSION['customerid'])) {
                
                //$order_date= date("Y/m/d h:i:sa");


                header("location:index.php");
                unset($_SESSION['customerid']);
                   unset($_SESSION["qty"]);
                unset($_SESSION["products"]);
             
                
            }
            
          //} 
						
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<?php include ('includes/header.php'); ?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
<?php  // $qu = "SELECT * FROM customer where customer_id = LAST INSIRT ID()";
    
  //$res = mysqli_query($conn,$qu);

 // $row = mysqli_fetch_assoc($res); ?>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action=""  method="post" >
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Customer Name</label>
	                  <input type="text" class="form-control" placeholder=""  name="name"  value="<?php echo $customer['customer_name']; ?>">

	                </div>
	              </div>
	             
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Address</label>
		            		 <input type="text" class="form-control" placeholder=""  name="address"   value="<?php echo $customer['customer_address']; ?>">
		                
		            	</div>
		            </div>
		           
		            
		           
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="" name="phone"   value="<?php echo $customer['customer_mobile']; ?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="text" class="form-control" placeholder="" name="email"   value="<?php echo $customer['customer_email']; ?>">
	                </div>
                </div>
                <div class="w-100"></div>
                
                                <button id="payment-button" type="submit"  name="update" class="btn btn-success">Update
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;

                                </button>
								
	          </form><!-- END -->
					</div>
				
	       
	          	<div class="col-md-6">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Cash On Delivary</label>
											</div>
										</div>
									</div>
									
									<form action="" method="post">
									
									<button class="btn btn-primary py-3 px-4" name="order" type="submit" onclick="myFunction()" >Place an order</button>
									<input type="hidden" name="total" id="total" value="<?php $_SESSION['total'];?>">
								</form>
								</div>



<script>
		
function myFunction() {

 // alert("You Are Welcome! Your Order Is Done .. Thanks For Visiting VEGEFOODS");
//getElementById('#total');
//var order_id="<?php //echo $order_id;?>";
 //total =getElementById('#total').val();
// var total = getElementById($('#total').val());
		        
//alert(" total is:"+$('#total').val());
var total=document.getElementById('total').value(1);
//var total=getElementById('#total').val();
alert(total);
//alert("Thank you your order number is"+total);
}

</script>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include ('includes/footer.php'); ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

    
  </body>
</html>