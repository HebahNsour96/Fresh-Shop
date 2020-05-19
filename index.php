<?php include('includes/header.php'); ?>
<?php include('admin/examples/includes/connection.php');
    // unset($_SESSION['customer_id']);
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

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/slider.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"></h1>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                
    <?php 
        $query  = "select * from category";
        $result = mysqli_query($conn , $query);
        while($cat = mysqli_fetch_assoc($result)){ ?>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ml-5">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="<?php echo "admin/examples/uploads/{$cat['cat_img']}"; ?>" alt="" width="300px" height="300px"/>
                        <a class="btn hvr-hover" href="<?php echo "shop.php?id={$cat['cat_id']}"; ?>"><?php echo $cat['cat_name']; ?></a>
                    </div>
 </div>
    <?php } ?>

    
   
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Fruits & Vegetables</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="" data-filter="*">All</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            <?php 
                $query  = "select * from product limit 5";
                $result = mysqli_query($conn , $query);
                while($row = mysqli_fetch_assoc($result)){
               
            ?>
                <div class="col-lg-2 col-md-2 special-grid all">
                
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <!-- <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div> -->
                            <img src="<?php echo "admin/examples/uploads/{$row['pro_img']}"; ?>" class="img-fluid" alt="Image" width='300px' height='300px'>
                            <form method="post">
                                <div class="mask-icon">
                                   
                                </div>
                            </form>
                        </div>
                        <div class="why-text">
                            <a href="<?php echo "shop-detail.php?id={$row['pro_id']}"; ?>">
                                <h4><?php echo $row['pro_name'] ?></h4>
                            </a>
                            <h5>JPD <?php echo $row['pro_price'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->
    
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button data-filter=".top-featured">Top featured</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            <?php 
                $query  = "select * from product where cat_id = 16";
                $result = mysqli_query($conn , $query);
                while($rowF = mysqli_fetch_assoc($result)){
               
            ?>
                <div class="col-lg-2 col-md-3 special-grid top-featured">
                    
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <!-- <div class="type-lb">
                                <p class="new">New</p>
                            </div> -->
                            <img src="<?php echo "admin/examples/uploads/{$rowF['pro_img']}"; ?>" class="img-fluid" alt="Image">
                            <form method="post">
                                <div class="mask-icon">
                                </div>
                            </form>
                        </div>
                        <div class="why-text">
                            <a href="<?php echo "shop-detail.php?id={$rowF['pro_id']}"; ?>">
                                <h4><?php echo $rowF['pro_name'] ?></h4>
                            </a>
                            <h5> $<?php echo $rowF['pro_price'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->

     <!-- Start Products  -->
     <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button data-filter=".top-featured">On Coming</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            <?php 
                $query  = "select * from product where cat_id = 17";
                $result = mysqli_query($conn , $query);
                while($rowO = mysqli_fetch_assoc($result)){
               
            ?>
                <div class="col-lg-2 col-md-3 special-grid on-Coming">
                    
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <!-- <div class="type-lb">
                                <p class="new">New</p>
                            </div> -->
                            <img src="<?php echo "admin/examples/uploads/{$rowO['pro_img']}"; ?>" class="img-fluid" alt="Image">
                            <form method="post">
                                <div class="mask-icon">
                                    
                                </div>
                            </form>
                        </div>
                        <div class="why-text">
                            <a href="<?php echo "shop-detail.php?id={$rowO['pro_id']}"; ?>">
                                <h4><?php echo $rowO['pro_name'] ?></h4>
                            </a>
                            <h5> $<?php echo $rowO['pro_price'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->


<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->
    