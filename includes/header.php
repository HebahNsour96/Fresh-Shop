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

                        <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> -->


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
                                <span class="badge">
                                    <?php echo count($_SESSION['product']); ?>
                                </span>
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