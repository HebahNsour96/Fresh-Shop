<?php 

    include('admin/examples/includes/connection.php');
    
    if(isset($_POST['signup']))
    {
        // echo 111;die;
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $mobile   = $_POST['mobile'];
        $address  = $_POST['address'];


        $duple = mysqli_query($conn , "select * from customer where customer_email='$email'");
        if(mysqli_num_rows($duple)>0)
        {
            $errorEmail = "this email already exists";
        }
        else
        {
            $query = "insert into customer (customer_name , customer_email , customer_password , mobile , address)
                      values ('$name' , '$email' , '$password' , $mobile , '$address')";
            // echo "<pre";
            // print_r($query);die;
            mysqli_query($conn , $query);
            header('location:signin.php');
        }
        
    }

    if (isset($_POST['signin'])) 
    {

        $email     = $_POST['your_email'];
        $password  = $_POST['your_password'];

        $query      = "SELECT * FROM customer WHERE customer_email = '$email' AND customer_password = '$password'";
        $result     = mysqli_query($conn , $query);
        
        while($custSet = mysqli_fetch_assoc($result))
        {
            if (isset($custSet['customer_id'])) 
            {
                // echo 111;die;
                $_SESSION['customer_id'] = $custSet['customer_id'];
                header("location:checkout.php?id=" . $_SESSION['customer_id']);
            }
            else
            {
                $error = "user not found";
            }
        }
        
        // echo "<pre>";
        // print_r($custSet);die;

        
        // echo 111;die;
        
        // echo '<pre>';
        // print_r($_SESSION);die;
    }
    
    include('includes/header.php');

?>



    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Login</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Account Login</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formLogin" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="InputEmail" name="your_email" placeholder="Enter Your Email"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" name="your_password" placeholder="Password"> 
                            </div>
                            <div class="form-group">
                                    <?php

                                        if (isset($error)) {
                                            echo "<div class='alert alert-danger'>$error</div>";
                                        }
                                    ?>
                                </div>
                        </div>
                        <button type="submit" class="btn hvr-hover" name="signin">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Create New Account</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formRegister" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Full Name</label>
                                <input type="text" class="form-control" id="InputName" name="name" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="InputEmail1" name="email" placeholder="Enter Email"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword1" name="password" placeholder="Password"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Mobile</label>
                                <input type="number" class="form-control" id="InputEmail1" name="mobile" placeholder="Enter Mobile"> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Address</label>
                                <input type="text" class="form-control" id="InputAddress" name="address" placeholder="Enter Address"> 
                            </div>
                            <div class="form-group mt-1">
                                    <?php

                                        if (isset($errorEmail)) {
                                            echo "<div class='alert alert-danger'>$errorEmail</div>";
                                        }
                                    ?>
                            </div>
                        </div>
                        <button type="submit" class="btn hvr-hover" name="signup">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

<?php include('includes/footer.php'); ?>
