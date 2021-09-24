<?php

    include '../admin/connection.php';
    include '../admin/auth.php';    
    $conn = OpenCon();

    $sql = "SELECT * FROM users";
    $assistants = $conn->query($sql);
    
    $sql = "SELECT * FROM users WHERE phone_number=".$_SESSION['phone']." AND form_completed=0";
    $action_needed = $conn->query($sql);


    if($action_needed){
        $action_needed_count = mysqli_num_rows($action_needed);
    }else{
        $action_needed_count = 0;
    }
    


    $sql = "SELECT * FROM loans WHERE status='accept' AND phone_number=".$_SESSION['phone'];
    $loans_approved = $conn->query($sql);


    if($loans_approved){
        $loans_approved = mysqli_num_rows($loans_approved);
    }else{
        $loans_approved = 0;
    }

    
    $sql = "SELECT * FROM loans WHERE status='reject' AND phone_number=".$_SESSION['phone'];
    $loans_rejected = $conn->query($sql);


    if($loans_rejected){
        $loans_rejected = mysqli_num_rows($loans_rejected);
    }else{
        $loans_rejected = 0;
    }


    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }

 
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Eazy Credit Solution | Users | Home</title>
    
    <!-- Favicon icon -->
    <link href='images/16.ico' rel="shortcut icon" type=image/x-icon>
    <!-- Custom CSS -->
    

    <!-- Custom CSS -->
    <link href="../admin/css/style.min.css" rel="stylesheet">
    <link rel="icon"  type="image/png" href="../images/fav.png">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <!-- <img src="plugins/images/logo-icon.png" alt="homepage" /> -->
                            <img src="../images/loan_logo.png"  style="width: 200px; height: 50px;" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <li>
                            <a class="profile-pic" href="#">
                                <!-- <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"> -->
                                <span class="text-white font-medium">
                                <?php echo $_SESSION["username"]; ?>
                                </span>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2 common_btn">
                            <a class="sidebar-link" href="index.php"
                                aria-expanded="false">
                                
                                <i class="fa fa-tachometer-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item common_btn">
                            
                            <a class="sidebar-link" style="padding-left: 52px;" onclick="myfun()"
                                aria-expanded="false">
                                
                                <span class="hide-menu">Loan</span>
                                <i class="fas fa-caret-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <div id="sub-menu" style="display: none;">
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="personal-loan.php"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <span class="hide-menu">Personal Loan</span>
                                </a>
                            </li>
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="mortgage.php"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <span class="hide-menu">Mortgage Loan</span>
                                </a>
                            </li>

                            
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="cc-and-od.php"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <span class="hide-menu">CC and OD Loan</span>
                                </a>
                            </li> 
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="bt-plus-loan.php"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <span class="hide-menu">BT + Home Loan</span>
                                </a>
                            </li> 
                        </div> 
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex" style="float:right;">
                            <a href="profile-edit.php" 
                                class="btn btn-info  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">My Profile
                            </a>
                            <a href="logout.php" 
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout
                            </a>
                        </div>
                        
                    </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Action Needed</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?php  echo $action_needed_count; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Loans Approved</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?php echo $loans_approved ; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Loans Rejected</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?php echo $loans_rejected; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="white-box analytics-info">
                                <?php 
                                    if($msg == "Application Submitted Successfully!"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                                ?>
                            <h2 class="box-title text-center" style="font-size: 25px;">Your Loan Status</h2>
                            <?php if($loans_approved){ ?>
                                <p class="box-title text-success">Dear <?php echo $_SESSION['username']; ?> <br>
                                Congratulations... <br> Your <?php 
                                if($_SESSION['loan'] == "Personal"){
                                    echo $_SESSION['loan']. " Loan";
                                }else{
                                    echo $_SESSION['loan'];
                                }
                                 ?> Application is Accepted. <br> For Disbursement our Support Team Will Call You Soon..
                                </p>

                            <?php }elseif($loans_rejected){ ?>
                                <p class="box-title text-danger">
                                Dear <?php echo $_SESSION['username']; ?> <br>
                                We are Unable to Process Your 
                                <?php
                                if($_SESSION['loan'] == "Personal"){
                                    echo $_SESSION['loan']. " Loan";
                                }else{
                                    echo $_SESSION['loan'];
                                }
                                ?> Application. 
                                <br>Sorry, your Loan Application is Rejected. <br> Re- Apply after six months...</p>
                            <?php }elseif($action_needed_count == 0){ ?>
                                <p class="box-title text-info">
                                Dear <?php echo $_SESSION['username']; ?>,<br>
                                We are processing Your <?php if($_SESSION['loan'] == "Personal"){ echo $_SESSION['loan']. " Loan "; } else{
                                    $_SESSION['loan'];
                                } ?> Application. 
                                We'll get back to you soon.</p>
                            <?php } 
                            
                            if ($action_needed->num_rows > 0) {
                                // output data of each row
                                $text = '';
                                $i = 0;
                                while($row = $action_needed->fetch_assoc()) {
                                    $i += 1;
                                    if($row['loan'] == "Personal"){
                                        $text= $text."<p class='text-dark fw-bold fs-6'> ".$i.". Please complete your ".$row['loan']." Loan form by clicking <a class='text-primary' href='personal-loan.php' >Here</a></p>";
                                    }elseif($row['loan'] == "Mortgage"){
                                        $text= $text."<p class='text-dark fw-bold fs-6'> ".$i.". Please complete your ".$row['loan']." form by clicking <a class='text-primary' href='mortgage.php' >Here</a></p>";
                                    }elseif($row['loan'] == "Business Loan"){
                                        $text= $text."<p class='text-dark fw-bold fs-6'> ".$i.". Please complete your ".$row['loan']." form by clicking <a class='text-primary' href='bt-plus-loan.php' >Here</a></p>";
                                    }elseif($row['loan'] == "Home Loan"){
                                        $text= $text."<p class='text-dark fw-bold fs-6'> ".$i.". Please complete your ".$row['loan']." form by clicking <a class='text-primary' href='bt-plus-loan.php' >Here</a></p>";
                                    }elseif($row['loan'] == "Cash credit & Overdraft"){
                                        $text= $text."<p class='text-dark fw-bold fs-6'> ".$i.". Please complete your ".$row['loan']." form by clicking <a class='text-primary' href='cc-and-od.php' >Here</a></p>";
                                    }
                                }
                                echo $text;
                            }
                            ?>

                            <p class="text-center box-title text-danger">For any Queries Please Contact : +91-8944014303</p>
                            
                        </div>
                    </div>
                    
                </div>



                
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © Eazy Credit Solution <a
            href="http://eazycreditsolution.com/"  class="text-primary">EazyCreditSolution</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!-- <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="js/app-style-switcher.js"></script> -->
    <script src="../admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="../admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../admin/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../admin/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="../admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../admin/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>