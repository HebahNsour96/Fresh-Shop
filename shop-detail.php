<?php 

    // session_start();
    include('admin/examples/includes/connection.php');

    $query   = "select * from product where pro_id = {$_GET['id']}";
    $result  = mysqli_query($conn , $query);
    $product = mysqli_fetch_assoc($result);

    // echo "<pre>";
    // print_r($product);die;
    
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
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo "shop.php?id={$product['cat_id']}"; ?>">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                

                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="<?php echo "admin/examples/uploads/{$product['pro_img']}"; ?>" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="<?php echo "admin/examples/uploads/{$product['pro_img']}"; ?>" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="<?php echo "admin/examples/uploads/{$product['pro_img']}"; ?>" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="<?php echo "admin/examples/uploads/{$product['pro_img']}"; ?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="<?php echo "admin/examples/uploads/{$product['pro_img']}"; ?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="<?php echo "admin/examples/uploads/{$product['pro_img']}"; ?>" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $product['pro_name']; ?></h2>
                        <h5>JOD <?php echo $product['pro_price']; ?></h5>
                        <h5>Quantity: <?php echo $product['pro_qty']; ?></h5>
						<h4>Short Description:</h4>
                        <p><?php echo $product['pro_desc']; ?></p>
                                    
						<!-- <ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label">Quantity</label>
									<input class="form-control" value="0" min="0" max="20" type="number">
								</div>
							</li>
						</ul> -->
                        <form method='post'>
                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn">
                                    <button class="ml-auto btn hvr-hover text-white" type='submit' name='addtocart'>Add to cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                    </div>
                    
                    <div class="featured-products-box owl-carousel owl-theme">
                        <?php 
                        
                            $query  = "select * from product where cat_id = 16";
                            $resultp = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_assoc($resultp)){
                    
                        ?>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="<?php echo "admin/examples/uploads/{$row['pro_img']}"; ?>" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                    </div>
                                </div>
                                <div class="why-text">
                                    <a href="<?php echo "shop-detail.php?id={$row['pro_id']}"; ?>">
                                        <h4><?php echo $row['pro_name']; ?></h4>
                                    </a>
                                    <h5> $<?php echo $row['pro_price']; ?></h5>
                                </div>
                            </div>
                        </div>
                            <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->
