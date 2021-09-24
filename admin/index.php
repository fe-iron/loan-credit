<?php

    include 'connection.php';
    include 'auth.php';
    $conn = OpenCon();

    $sql = "SELECT * FROM users";
    $assistants = $conn->query($sql);

    $sql = "SELECT * FROM subscriber";
    $subscribers = $conn->query($sql);


    if($assistants){
        $users = mysqli_num_rows($assistants);
    }else{
        $users = 0;
    }

    $sql = "SELECT * FROM loans WHERE status='accepted'";
    $accepted = $conn->query($sql);


    if($accepted){
        $accepted = mysqli_num_rows($accepted);
    }else{
        $accepted = 0;
    }

    
    $sql = "SELECT * FROM loans WHERE status='reject'";
    $rejected = $conn->query($sql);


    if($rejected){
        $rejected = mysqli_num_rows($rejected);
    }else{
        $rejected = 0;
    }


    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }
    
    

    if (isset($_POST['phone'])){
        // removes backslashes
        $phone = stripslashes($_REQUEST['phone']);
            //escapes special characters in a string
        $phone = mysqli_real_escape_string($conn,$phone);
        $full_name = $_POST['fullname'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $pin = $_POST['pin'];
        $state = $_POST['state'];
        $occupation = $_POST['occupation'];

        //Checking is user existing in the database or not
        $query = "UPDATE `users` SET full_name='$full_name', dob='$dob', address='$address', pin='$pin', state='$state', occupation='$occupation'
            WHERE phone_number='$phone'";
        // echo $query;
        if (mysqli_query($conn, $query)) {
            $msg = "Profile Updated Successfully!";
        } else {
            echo "Error updating record: "  . mysqli_error($conn);
            $msg = "Something went wrong" . mysqli_error($conn);
            // header("Location: password_change.php?result=Something Went Wrong try again!");
        }

    }   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Admin | Eazy Credit Solution </title>
    
    <!-- Favicon icon -->
    <link href='images/16.ico' rel="shortcut icon" type=image/x-icon>
    <!-- Custom CSS -->
    
    <!-- <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> -->
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
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
                        <li class="sidebar-item common_btn">
                            
                            <a class="sidebar-link" style="padding-left: 52px;" onclick="myfun2()"
                                aria-expanded="false">
                                
                                <span class="hide-menu">Website Settings</span>
                                <i class="fas fa-caret-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <div id="sub-menu2" style="display: none;">
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="carousal.php"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                    <span class="hide-menu">Carousal</span>
                                </a>
                            </li>
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="loan-type.php"
                                    aria-expanded="false">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                    <span class="hide-menu">Loan Types</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="call.php"
                                    aria-expanded="false">
                                    <i class="fas fa-mobile-alt" aria-hidden="true"></i>
                                    <span class="hide-menu">Call To Action</span>
                                </a>
                            </li> 
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="team_member.php"
                                    aria-expanded="false">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    <span class="hide-menu">Team Member</span>
                                </a>
                            </li> 
                            <li class="sidebar-item common_btn" style="padding-left: 26px;">
                                <a class="sidebar-link" href="payment-options.php"
                                    aria-expanded="false">
                                    <i class="fas fa-university" aria-hidden="true"></i>
                                    <span class="hide-menu">Payment Options </span>
                                </a>
                            </li> 
                        </div> 


                        <li class="sidebar-item common_btn">
                            <a class="sidebar-link" href="password_change.php"
                                aria-expanded="false">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                                <span class="hide-menu">Mobile Number Change</span>
                            </a>
                        </li> 
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
                <!-- /.col-lg-12 -->
            </div>
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
                            <h3 class="box-title">Total Users Registered</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?php echo $users; ?></span></li>
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
                                <li class="ms-auto"><span class="counter text-purple"><?php echo $accepted; ?></span></li>
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
                                <li class="ms-auto"><span class="counter text-info"><?php echo $rejected; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Subscribers</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Full Name</th>
                                            <th class="border-top-0">Phone Number</th>
                                            <th class="border-top-0">Amount</th>
                                            <th class="border-top-0">Duration</th>
                                            <th class="border-top-0">Installment</th>
                                            <th class="border-top-0">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($subscribers->num_rows > 0) {
                                            // output data of each row
                                            $text = '';
                                            $i = 0;
                                            while($row = $subscribers->fetch_assoc()) {
                                                $i += 1;
                                                $text= $text. '<tr>
                                                    <td>'.$i.'</td>
                                                    <td class="txt-oflo">'.$row['date'].'</td>
                                                    <td>'.$row["full_name"].'</td>
                                                    <td>'.$row["phone"].'</td>
                                                    <td>'.$row["amount"].'</td>
                                                    <td>'.$row["duration"].'</td>
                                                    <td>'.$row["installment"].'</td>
                                                    <td>'.$row["email"].'</td>
                                                </tr>';
                                            }
                                            echo $text;
                                        }
                                        ?>        
                                    </tbody>
                                </table>
                            </div>
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
            <footer class="footer text-center"> 2021 © Eazy Credit Solution Admin <a
                    href="http://eazycreditsolution.com/">EazyCreditSolution</a>
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
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!-- <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="js/app-style-switcher.js"></script> -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>