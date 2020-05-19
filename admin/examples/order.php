<?php

require('includes/connection.php');
include('includes/header.php');

?>

<!-- MAIN CONTENT-->
<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
            <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <!-- start table -->
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Customer ID</th>
                                        <th>Product ID</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $query  = "select * from wallOrder";
                                        $result = mysqli_query($conn , $query);
                                        while ($order = mysqli_fetch_assoc($result)) 
                                        {
                                        	echo "<tr>";
                                                echo "<td>{$order['w_id']}</td>";

                                                echo "<td>{$order['w_date']}</td>";

                                                echo "<td>{$order['customer_id']}</td>";

                                                echo "<td>{$order['pro_id']}</td>";

                                                echo "<td>{$order['total_pr']}</td>";

                                                echo "<td><a href='delete_order.php ? id={$order['w_id']}' class='btn btn-danger'>Delete</td>";
                                            	
                                        	echo "</tr>";
                                        }
                                     ?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- start footer -->

<?php include('includes/footer.php');?>

<!-- end footer -->