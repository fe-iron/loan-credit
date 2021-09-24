<?php

    include 'connection.php';
    include 'auth.php';
    $conn = OpenCon();

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
                        <h4 class="page-title">My Profile</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex" style="float:right;">
                            
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

                <div class="row">
                    <!-- Column -->

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12" style="margin-left: auto; margin-right: auto; margin-top: 10px;">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    if($msg == "Mobile Number Changed Successfully!" || $msg == "Profile Updated Successfully!"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                                ?>

                                <h2 class="text-success" style="text-align: center">Profile Edit Form</h2>
                                <form class="form-horizontal form-material" action="" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Full Name" class="form-control p-0 border-0"
                                                name="fullname" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone No.</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="tel" placeholder="Mobile Number"
                                                class="form-control p-0 border-0" name="phone" value="<?php echo $_SESSION["phone"]; ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date of Birth</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" placeholder="Date of Birth"
                                                class="form-control p-0 border-0" name="dob" required>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Address"
                                                class="form-control p-0 border-0" name="address" required>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Pin Code</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0" name="pin" placeholder="Pin Code" required>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">State</label>
                                        <div class="col-md-12  p-0">
                                            <select name="state" required class="border-bottom" style="border:none;">
                                                <option value="" selected>State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                </option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                <option value="Daman and Diu">Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Puducherry">Puducherry</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>

                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Occupation</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Occupation"
                                                class="form-control p-0 border-0" name="occupation" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                
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