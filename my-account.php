<?php 
    
    include('admin/examples/includes/connection.php');
   
    $name        = "";
    $email       = "";
    $password    = 0;
    $address     = "";
    $mobile      = 0;

    if(isset($_POST['submit']))
    {
        // echo 111;die;
        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $password    = $_POST['password'];
        $mobile      = $_POST['mobile'];
        $address     = $_POST['address'];
        

        $query = "update admin set customer_name     = '$name',
                                   customer_email    = '$email',
                                   customer_password = '$password',
                                   mobile            = '$mobile',
                                   address           = '$address'
                                   
                  where customer_id = {$_GET['id']}";

        // echo $query; die;
        mysqli_query($conn, $query);

        header('location:my-account.php');

        
        
    }
        $query  = "select * from customer where customer_id = {$_GET['id']}";
        // echo $query;die;        
        $result = mysqli_query($conn , $query);
        $row = mysqli_fetch_assoc($result);
        // echo $row;die;
    
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
                    <h2>Welcome, <?php echo $row['customer_name']; ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Shop</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Your Information</h3>
                        </div>
                        <form class="needs-validation" novalidate method="post">
                            <div class="row">
                                
                            </div>
                            
                            <div class="mb-3">
                                <label for="username">Name </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" name="name" value="<?php echo $row['customer_name']; ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['customer_email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email">Password </label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['customer_password']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mobile">Mobile </label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address">Address </label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
                            </div>
                            <hr class="mb-1">
                            <div class="col-12 d-flex shopping-box"> 
                                <button class="ml-auto btn hvr-hover text-white p-3 float-lg-right " type="submit" name="submit">Update Information</button> 
                                <a class="ml-1 btn hvr-hover text-white" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                

            </div>

        </div>
    </div>
    <!-- End Cart -->

<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->