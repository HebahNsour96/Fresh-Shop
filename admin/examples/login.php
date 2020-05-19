<?php

    session_start();

    include('includes/connection.php');

    if (isset($_POST['submit'])) 
    {

        // echo "111";die;
        
        $email     = $_POST['email'];
        $password  = $_POST['password'];

        $query      = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$password'";
        $result     = mysqli_query($conn , $query);
        $adminSet   = mysqli_fetch_assoc($result);
        
        // echo "<pre>";
        // print_r($adminSet);die;

        if (isset($adminSet['admin_id'])) 
        {
            $_SESSION['admin_id'] = $adminSet['admin_id'];
            header('location:admin.php');
        }
        else
        {
            $error = "user not found";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        
                        <div class="login-form">
                            <!-- start form -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <?php

                                        if (isset($error)) {
                                            echo "<div class='alert alert-danger'>$error</div>";
                                        }
                                    ?>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">sign in</button>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
<!-- end document-->