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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $query  = "select * from feedback";
                                        $result = mysqli_query($conn , $query);
                                        while ($feed = mysqli_fetch_assoc($result)) 
                                        {
                                        	echo "<tr>";
                                            	echo "<td>{$feed['feed_id']}</td>";
                                                
                                                echo "<td>{$feed['name']}</td>";
                                                
                                                echo "<td>{$feed['email']}</td>";
                                                
                                                echo "<td>{$feed['subject']}</td>";
                                                
                                                echo "<td>{$feed['msg']}</td>";
                                            	
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