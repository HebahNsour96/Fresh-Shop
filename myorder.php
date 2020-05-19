<?php include('admin/examples/includes/connection.php'); ?>
<!-- start header -->
<?php 

    $query  = "select * from order";
    $result = mysqli_query($conn , $query);

    include('includes/header.php'); ?>
<!-- end header -->

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
                    <h2>Welcome,<a href='account-update.php'>update account</a></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php 
                        
                                while($row = mysqli_fetch_assoc($result))
                                {

                            ?>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <?php echo $row['order_id']; ?>
								        </a>
                                    </td>
                                    <td>
                                        <p><?php echo $row['order_date']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['status']; ?></p>
                                    </td>
                                    <td>
                                        <p>$<?php echo $row['total_price']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['qty']; ?></p>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- End Cart -->

<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->