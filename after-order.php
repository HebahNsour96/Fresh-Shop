<?php 
    
    include('admin/examples/includes/connection.php');

    // $query = "SELECT * FROM order ORDER BY or_id DESC LIMIT 1";
    // mysqli_query($conn , $query);
    // header('location:after-order.php');
    
    include('includes/header.php'); 
?>

   <!-- Start Top Search -->
   <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="noo-sh-title-top m-5">Thank you for shopping from our store we will deliver as soon as possible
                   
                </h2> 
                <h2 class=" m-5"><p> check your mobile we will contact with you </p></h2>
            </div>
        </div>
    </div>







<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->