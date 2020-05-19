<?php

	require('includes/connection.php');
	if (isset($_POST['submit'])) 
    {
		
		$email    = $_POST['admin_email'];
		$password = $_POST['admin_password'];
        $fullname = $_POST['fullname'];
        
        $duple = mysqli_query($conn , "select * from admin where admin_email='$email'");

        if(mysqli_num_rows($duple)>0)
        {
            $errorEmail = "this email already exists";
        }
        else
        {
            $query = "insert into admin(admin_email,admin_password,fullname)
                      
                      values('$email','$password','$fullname')";
            // echo "<pre";
            // print_r($query);die;
            mysqli_query($conn , $query);
            header('location:admin.php');
        }
	}

    $id         = '';
    $email      = '';
    $password   = '';
    $fullname   = '';

    if(isset($_POST['update']))
    {

        $id       = $_POST['admin_id'];
        $email    = $_POST['admin_email'];
        $password = $_POST['admin_password'];
        $fullname = $_POST['fullname'];

        $query = "update admin set admin_email    = '$email',
                                   admin_password = '$password',
                                   fullname       = '$fullname'
                 
                  where admin_id = $id ";
        // echo $query;die;

        mysqli_query($conn , $query);

        header("location:admin.php");

    }

?>
<?php 
	include('includes/header.php');
?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Admin Info</h3>
                                </div>
                                <hr>
                                <!-- start form --> 
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                        <input name="admin_email" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <?php

                                            if (isset($errorEmail)) {
                                                echo "<div class='alert alert-danger'>$errorEmail</div>";
                                            }

                                       ?>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Admin Password</label>
                                        <input id="cc-name" name="admin_password" type="password" class="form-control cc-name valid" >
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Admin Full Name</label>
                                        <input id="cc-name" name="fullname" type="text" class="form-control cc-name valid" >
                                    </div>  
                                    <div>
                                        <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info">Save</button>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <!-- start table -->
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Full Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $query  = "select * from admin";
                                        $result = mysqli_query($conn , $query);
                                        while ($admin = mysqli_fetch_assoc($result)) 
                                        {
                                        	echo "<tr>";
                                            	echo "<td>{$admin['admin_id']}</td>";
                                            	echo "<td>{$admin['admin_email']}</td>";
                                            	echo "<td>{$admin['fullname']}</td>";
                                            			
                                            	//? id={$admin['admin_id']} >> get id in url
                                            	echo "<td><button class='edit btn btn-info' data-id='{$admin['admin_id']}' data-email='{$admin['admin_email']}' data-password='{$admin['admin_password']}' data-fullname='{$admin['fullname']}'>Edit</button></td>";

                                            	echo "<td><a href='delete_admin.php ? id={$admin['admin_id']}' class='btn btn-danger'>Delete</td>";
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


    <!-- modal medium -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- start form --> 
                <form action="" method="post">
                    
                    <div class="modal-body">
                        <input type="hidden" name="admin_id" id='update_id' class="form-control" value="<?php echo $id; ?>">
                        
                        <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                        <input name="admin_email" id="update_email" type="text" class="form-control" value="<?php echo $email; ?>">
                        
                        <label for="cc-name" class="control-label mb-1">Admin Password</label>
                        <input id="update_password" name="admin_password" type="password" class="form-control cc-name valid" value="<?php echo $password; ?>">
                       
                        <label for="cc-name" class="control-label mb-1">Admin Full Name</label>
                        <input id="update_name" name="fullname" type="text" class="form-control cc-name valid" value="<?php echo $fullname; ?>"> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="update" class="btn btn-primary" value="update" >update</button>
                    </div>
                   
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
    <!-- end modal medium -->  


<!-- start footer -->

<?php include('includes/footer.php');?>

<!-- end footer -->


<script type="text/javascript">

    $(document).ready(function()
        {
            $('.edit').click(function()
            {
                var id         = $(this).attr('data-id');
                var email      = $(this).attr('data-email');
                var password   = $(this).attr('data-password');
                var fullname   = $(this).attr('data-fullname');


                $('#mediumModal').modal('show');

                $('#update_id').val(id);
                $('#update_email').val(email);
                $('#update_password').val(password);
                $('#update_name').val(fullname);
            });
    });

</script>