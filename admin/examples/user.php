<?php 

    include('includes/connection.php');
    if (isset($_POST['update'])) {
            
        $email    = $_POST['admin_email'];
        $password = $_POST['admin_password'];
        $fullname = $_POST['fullname'];


        $query = "update admin set admin_email    = '$email',
                                admin_password = '$password',
                                fullname       = '$fullname'
                where admin_id = {$_GET['id']}";
        
        // echo $query; die;
        mysqli_query($conn, $query);

        header('location:manage_admin.php');

    }

    $query  = "select * from admin";
    $result = mysqli_query($conn , $query);
    $admin  = mysqli_fetch_assoc($result);

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
                                    <h3 class="text-center title-2">Edit Profile</h3>
                                </div>
                                <hr>
                                <!-- start form --> 
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Email</label>
                                        <input name="admin_email" type="text" class="form-control" value="<?php echo $admin['admin_email']; ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Password</label>
                                        <input id="cc-name" name="admin_password" type="password" class="form-control cc-name valid" value="<?php echo $admin['admin_password']; ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Full Name</label>
                                        <input id="cc-name" name="fullname" type="text" class="form-control cc-name valid" value="<?php echo $admin['fullname']; ?>">
                                    </div>  
                                    <div>
                                        <button id="payment-button" type="submit" name="update" class="btn btn-lg btn-info">Update</button>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
<!-- start footer -->
<?php include('includes/footer.php'); ?>
<!-- end footer -->