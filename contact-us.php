<?php

    include('admin/examples/includes/connection.php');

    

    if(isset($_POST['submit']))
    {
        // echo 111;die;
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $subject = $_POST['subject'];
        $msg     = $_POST['msg'];

        $query = "insert into feedback (name , email , subject , msg)
                  values ('$name' , '$email' , '$subject' , '$msg')";
       
        mysqli_query($conn , $query);
        header('location:contact-us.php');
    }
    

    include('includes/header.php'); 

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
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>GET IN TOUCH</h2>
                        <p>We will so happy to show your feedback.</p>
                        <form action="" method="post">
                            <div class="form-groub">
                                <input type="text" name="name" class="form-control mb-3" placeholder="your name">
                            </div>
                            <div class="form-groub">
                                <input type="text" name="email" class="form-control mb-3" placeholder="your email">
                            </div>
                            <div class="form-groub">
                                <input type="text" name="subject" class="form-control mb-3" placeholder="Subject">
                            </div>
                            <div class="form-groub">
                                <textarea placeholder="your message" name="msg" id="message" rows="4" class="col-md-12 mb-3"></textarea>
                            </div>
                            <div class="form-groub">
                                <button type="submit" name="submit" class="btn hvr-hover text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <p>It is a supermarket called a new store that includes many products from vegetables and fruits from private farms and we are fresh and we bring them on demand and well-known and reliable products and we will bring more products. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: as Salt Center,<br>Princess Muna Street</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="">+962 777955381</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="">hebahnsour@outlook.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

<!-- footer start -->
<?php include('includes/footer.php'); ?>
<!-- footer end -->