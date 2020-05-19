<?php

	require('includes/connection.php');
    
    if (isset($_POST['submit'])) 
    {
        $name     = $_POST['cust_name'];
        $email    = $_POST['cust_email'];
        $password = $_POST['cust_pass'];
        $mobile   = $_POST['cust_mobile'];
        $address  = $_POST['cust_address'];

        $query = "insert into customer (customer_name , customer_email , customer_password , mobile , address)
                  values ('$name' , '$email' , '$password' , '$mobile' , '$address')";
        
        mysqli_query($conn , $query);

        header('location:customer.php');
    }

    $id         = '';
    $name       = '';
    $email      = '';
    $password   = '';
    $address    = '';

    if(isset($_POST['update']))
    {

        $id       = $_POST['cust_id'];
        $name     = $_POST['cust_name'];
        $email    = $_POST['cust_email'];
        $password = $_POST['cust_pass'];
        $mobile   = $_POST['cust_mobile'];
        $address  = $_POST['cust_address'];

        $query = "update customer set customer_name     = '$name',
                                      customer_email    = '$email',
                                      customer_password = '$password',
                                      mobile            =  $mobile,
                                      address           = '$address'
                 
                  where customer_id = $id ";
        // echo $query;die;

        mysqli_query($conn , $query);

        header("location:customer.php");

    }

?>
<?php include('includes/header.php');?>



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
                                <h3 class="text-center title-2">Customer Info</h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                    <input name="cust_name" type="text" class="form-control">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Customer Email</label>
                                    <input name="cust_email" type="Email" class="form-control cc-name valid" >
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Password</label>
                                    <input name="cust_pass" type="password" class="form-control cc-name valid" >
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Mobile</label>
                                    <input name="cust_mobile" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Address</label>
                                    <input name="cust_address" type="text" class="form-control">
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info">
                                     Save
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query  = 'select * from customer';
                                $result = mysqli_query($conn , $query);
                                while ($customer = mysqli_fetch_assoc($result)) 
                                {
                                    echo '<tr>';
                                        echo "<td>{$customer['customer_id']}</td>";
                                        
                                        echo "<td>{$customer['customer_name']}</td>";
                                        
                                        echo "<td>{$customer['customer_email']}</td>";
                                        
                                        echo "<td>{$customer['mobile']}</td>";
                                        
                                        echo "<td>{$customer['address']}</td>";
                                        
                                        echo "<td><button class='edit btn btn-info' data-id='{$customer['customer_id']}' data-name='{$customer['customer_name']}' data-email='{$customer['customer_email']}' data-password='{$customer['customer_password']}' data-mobile='{$customer['mobile']}' data-address='{$customer['address']}'>Edit</button></td>";
                                        
                                        echo "<td><a href = 'delete_cust.php ? id={$customer['customer_id']}' class = 'btn btn-danger'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>
</div>


    <!-- modal medium -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- start form --> 
                <form action="" method="post">
                    
                    <div class="modal-body">
                        <input type="hidden" name="cust_id" id='update_id' class="form-control" value="<?php echo $id; ?>">
                        
                        <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                        <input name="cust_name" id="update_name" type="text" class="form-control" value="<?php echo $name; ?>">
                        
                        <label for="cc-name" class="control-label mb-1">Customer Email</label>
                        <input id="update_email" name="cust_email" type="text" class="form-control cc-name valid" value="<?php echo $email; ?>">
                       
                        <label for="cc-name" class="control-label mb-1">Customer Password</label>
                        <input id="update_pass" name="cust_pass" type="password" class="form-control cc-name valid" value="<?php echo $password; ?>">

                        <label for="cc-name" class="control-label mb-1">Customer Mobile</label>
                        <input id="update_mobile" name="cust_mobile" type="number" class="form-control cc-name valid" value="<?php echo $mobile; ?>"> 

                        <label for="cc-name" class="control-label mb-1">Customer Address</label>
                        <input id="update_address" name="cust_address" type="text" class="form-control cc-name valid" value="<?php echo $address; ?>">  
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
                var name       = $(this).attr('data-name');
                var email      = $(this).attr('data-email');
                var password   = $(this).attr('data-password');
                var mobile     = $(this).attr('data-mobile');
                var address    = $(this).attr('data-address');


                $('#mediumModal').modal('show');

                $('#update_id').val(id);
                $('#update_name').val(name);
                $('#update_email').val(email);
                $('#update_pass').val(password);
                $('#update_mobile').val(mobile);
                $('#update_address').val(address);
                
            });
    });

</script>