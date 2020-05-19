<?php

    include('admin/examples/includes/connection.php');
    session_start();

    $productCart = array();
    if(isset($_POST['addtocart']))
    {
        // echo 111;die;
        //add current product inside session
        $_SESSION['product'][] = $_GET['id'];
    }
    foreach($_SESSION['product'] as $pro_id)
    {
        // print_r($pro_id);die;
        $query  = "select * from product where pro_id = $pro_id";
        $result = mysqli_query($conn , $query);
        // echo "<pre>";
        // print_r($_SESSION);die;
        while($ses = mysqli_fetch_assoc($result))
        {
            $productCart[] = $ses;
        }
    }
    // echo "<pre>";
    // print_r($productCart);die;

    // if (!isset($_SESSION['customer_id'])) 
    // {
    //     // echo 111;die;
    //     header("location:signin.php");
    // }
    
    if(isset($_POST['placeOrder']))
    {
        // echo 111;die;
        // foreach ($productCart as $singleProduct) {     
        $order_id      = rand();
        $order_date    = date("Y/m/d h:i:sa");
        $order_price   = $_SESSION['total'];
        $order_product = $_SESSION['pro_id'];
            
        $query = "insert into wallOrder(w_id , w_date , customer_id , pro_id , total_pr)
                  VALUES ($order_id , '$order_date' , {$_GET['id']} , $order_product , $order_price)";
        
        // echo $query;die;
        mysqli_query($conn , $query);
        // }

        if (count($productCart)>0) 
        {
            header("location:after-order.php");
            unset($_SESSION['customer_id']);
            unset($_SESSION["product"]);
        }
        
    }
        
        if(isset($_POST['update']))
        {
            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $mobile  = $_POST['mobile'];
            $address = $_POST['address'];

            $query = "update customer set customer_name   = '$name',
                                          customer_email  = '$email',
                                          mobile          = '$mobile',
                                          address         = '$address'
                    
                      where customer_id = {$_GET['id']}";

            mysqli_query($conn , $query);
        }
        
        
    $query  = "select * from customer where customer_id = {$_GET['id']}";
    $result = mysqli_query($conn , $query);
    $rows1  = mysqli_fetch_assoc($result);

    // include('includes/header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="my-account.php">Account</a></li> -->

                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>


                        <!-- <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="shop.php">Sidebar Shop</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.php">My Account</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item"><a class="nav-link" href="notification.php">Notification</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                    
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge"><?php echo count($_SESSION['product']); ?></span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                
                <li class="cart-box">
                    <?php 
                        $sum = 0;
                        foreach($productCart as $singleProduct){ 
                            $sum += $singleProduct['pro_price'];        
                    ?>
                    <ul class="cart-list">
                        
                        <li>
                            
                            <a href="#" class="photo"><img src="<?php echo "admin/examples/uploads/{$singleProduct['pro_img']}"; ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $singleProduct['pro_name']; ?></a></h6>
                            <p><span class="price">JOD <?php echo $singleProduct['pro_price']; ?></span></p>
                        </li>
                         <?php } ?>
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart text-white">VIEW CART</a>
                        </li>
                    </ul>
                </li>
            </div>
               
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
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
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate method="post">
                            
                            <div class="mb-3">
                                <label for="username">Full Name *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" id="username" value="<?php echo $rows1['customer_name']; ?>" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $rows1['customer_email']; ?>">
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Mobile *</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $rows1['mobile']; ?>" required>
                                <div class="invalid-feedback"> Please enter your Mobile. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $rows1['address']; ?>" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="total" id="total" value="<?php $_SESSION['total'];?>">
                            </div>
                            <hr class="mb-1">
                            <div class="custom-control custom-radio">
                                    <input id="cash" name="paymentMethod" type="radio" checked class="custom-control-input" required>
                                    <label class="custom-control-label" for="cash">Cash On Delivery</label>
                            </div> 
                            <hr class="mb-1">
                            <div class="col-12 d-flex shopping-box"> 
                                <button type="submit" name="placeOrder" class=" btn hvr-hover text-white p-3">Place Order</button>
                                <button type="submit" name="update" class=" btn hvr-hover text-white p-3 ml-2">update</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

<?php include('includes/footer.php'); ?>