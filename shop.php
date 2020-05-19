<?php include('admin/examples/includes/connection.php'); ?>
<!-- start header -->
<?php include('includes/header.php') ?>
<!-- end header -->

<?php 
     $query  = "SELECT * FROM product
     WHERE cat_id = {$_GET['id']}";
     $result = mysqli_query($conn , $query);
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
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <?php 
                                           
                                            while ($proSet = mysqli_fetch_assoc($result)) 
                                            {

                                        ?>
                                        <div class="ser col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="<?php echo "admin/examples/uploads/{$proSet['pro_img']}"; ?>" class="img-fluid" alt="Image" width='300px' height='300px'>
                                                    <form method='post'>
                                                        <div class="mask-icon">
                                                           
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="why-text">
                                                    <a href="<?php echo "shop-detail.php?id={$proSet['pro_id']}"; ?>">
                                                        <h4><?php echo $proSet['pro_name']; ?></h4>
                                                    </a>
                                                    <h5>JOD <?php echo $proSet['pro_price']; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                            <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php 

                    // if(isset($_POST['search']))
                    // {
                    //     $valueToSearch = $_POST['search_value'];
                    //     $query = "SELECT * FROM product WHERE 'pro_name' LIKE '%".$valueToSearch."%'";
                    //     mysqli_query($conn , $query);
                        
                    // }
                    // else {
                    //     $query = "SELECT * FROM product";
                    //     mysqli_query($conn , $query);
                    // }

                ?>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#" method='post'>
                                <input class="form-control" placeholder="Search here..." type="text" name='search_value' id='search'>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                             <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <?php

                                        $query  = "SELECT * FROM category";
                                        $result = mysqli_query($conn , $query);
                                        while ($catSet = mysqli_fetch_assoc($result)) 
                                        {
                                            echo "<li>
                                                    <a href='shop.php?id={$catSet['cat_id']}'>{$catSet['cat_name']}</a>
                                                  </li>";
                                        }

                                    ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

<!-- start footer -->
<?php include('includes/footer.php') ?>
<!-- end footer -->

<!-- search product --> 
<script>
$(document).ready(function()
{
  $("#search").on("keyup", function() 
  {
    var value = $(this).val().toLowerCase();
    $(".ser").filter(function() 
    {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>