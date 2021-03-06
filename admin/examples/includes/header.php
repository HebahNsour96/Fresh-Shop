<?php

    session_start();
    if (!isset($_SESSION['admin_id'])) 
    {
        header('location:login.php');
    }

?>

<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
 <!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Admin
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="talk.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Talk</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="admin.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="customer.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Customer</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="category.php">
                            <i class="nc-icon nc-puzzle-10"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="product.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="order.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Ordert</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="incoming.php">
                            <i class="nc-icon nc-album-2"></i>
                            <p>In Coming</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="feedback.php">
                            <i class="nc-icon nc-send"></i>
                            <p>Feedback</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <span class="no-icon">Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->