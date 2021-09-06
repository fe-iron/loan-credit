<?php

    include 'connection.php';
//    include 'auth.php';
    $conn = OpenCon();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Teer | Super | Lucky Teer Online: </title>
    
    <!-- Favicon icon -->
    <link href='images/16.ico' rel="shortcut icon" type=image/x-icon>
    <!-- Custom CSS -->
    
    <!-- <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> -->
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="super_admin.php">
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

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <!-- <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"> -->
                                <span class="text-white font-medium">
                                    Admin
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
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item common_btn">
                            <a class="sidebar-link " href="bt-plus-loan.php"
                                aria-expanded="false">
                                <i class=" fas fa-edit" aria-hidden="true"></i>
                                <span class="hide-menu">BT + Home Loan</span>
                            </a>
                        </li>
                        <li class="sidebar-item common_btn">
                            <a class="sidebar-link" href="personal-loan.php"
                                aria-expanded="false">
                                <i class=" fas fa-edit" aria-hidden="true"></i>
                                <span class="hide-menu">Personal Loan</span>
                            </a>
                        </li>
                        <li class="sidebar-item common_btn">
                            <a class="sidebar-link" href="mortgage.php"
                                aria-expanded="false">
                                <i class=" fas fa-upload" aria-hidden="true"></i>
                                <span class="hide-menu">Mortgage Loan</span>
                            </a>
                        </li>
                        <li class="sidebar-item common_btn">
                            <a class="sidebar-link" href="cc-and-od.php"
                                aria-expanded="false">
                                <i class=" fas fa-map-marker" aria-hidden="true"></i>
                                <span class="hide-menu">CC and OD Loan</span>
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
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal"></a></li>
                            </ol>
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
            <!-- Start Applied Loans -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="white-box">
                                <div class="d-md-flex mb-3">
                                    <h3 class="box-title mb-0">CC and OD Loan Stats</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Organize</th>
                                                <th class="border-top-0">Date</th>
                                                <th class="border-top-0">F/R</th>
                                                <th class="border-top-0">S/R</th>
                                                <th class="border-top-0">Verified</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                $text = '';
                                                $i = 0;
                                                while($row = $result->fetch_assoc()) {
                                                    $i += 1;
                                                    $dat = strval($row["date"]);
                                                    $dat = substr($dat, 0, 10);
                                                    $text= $text. '<tr>
                                                        <td>'.$i.'</td>
                                                        <td class="txt-oflo">'.$row["city"].'</td>
                                                        <td>'.$dat.'</td>
                                                        <td><span class="text-info">'.$row["F/R"].'</span></td>
                                                        <td><span class="text-info">'.$row["S/R"].'</span></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info" value="'.$row['id'].'" onclick="edit(this.value)">Edit</button>
                                                            <button type="button" class="btn btn-danger" value="'.$row['id'].'" onclick="remove(this.value)">Remove</button>
                                                        </td>

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
            <!-- End Applied Loans -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © Eazy Credit Solution Admin <a
                    href="#">EazyCreditSolution</a>
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