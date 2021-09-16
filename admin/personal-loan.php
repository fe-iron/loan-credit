<?php

    include '../admin/connection.php';
    include '../admin/auth.php';    
    $conn = OpenCon();

    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }
    
    
    $sql = "SELECT * FROM loans WHERE phone_number=".$_SESSION["phone"]." AND loan_type='personal'";
    
    $result = $conn->query($sql);

    // If form submitted, insert values into the database.
    if (isset($_POST['status'])){
        
        $status = $_POST['status'];
        $my_id = $_POST['this_id'];
        $sql = "UPDATE loans SET status='$status' WHERE id=$my_id";
            
        if ($conn->query($sql) === TRUE) {
            $msg = "Successfully Updated";
            header("Location: personal-loan.php?result=".$msg);
        }else {
            // echo "Error updating record: " . $con->error;
            $msg="Failed!";
        }
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
                                    <span class="hide-menu">BT+ Loan</span>
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
        <div class="page-wrapper">::
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-center">Personal Loan</h4>
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
            
            <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                                <?php 
                                    if($msg == "Successfully Updated"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                                ?>
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">All Loans</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Action</th>
                                            <th class="border-top-0">Bank statement</th>
                                            <th class="border-top-0">Photo</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">KYC</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Loan Type</th>
                                            <th class="border-top-0">Joining Letter</th>
                                            <th class="border-top-0">Salary Slip</th>
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
                                                $text= $text. '<tr>
                                                    <td>'.$i.'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success" value="'.$row['id'].'" onclick="edit(this.value)">Approve</button>
                                                        
                                                    </td>
                                                    <td class="txt-oflo"><a href="../user/upload/'.$row["bank_statement"].'">'.$row["bank_statement"].'</a></td>
                                                    <td> <a href="../user/upload/'.$row["photo"].'">'.$row["photo"].'</a></td>
                                                    <td>'.$row["phone_number"].'</td>
                                                    <td><span class="text-info"><a href="../user/upload/'.$row["kyc"].'">'.$row["kyc"].'</a></span></td>
                                                    <td class="text-dark">'.$row["status"].'</td>
                                                    <td><span class="text-info"><a href="../user/upload/'.$row["loan"].'">'.$row["loan"].'</a></span></td>
                                                    <td><span class="text-info"><a href="../user/upload/'.$row["joining_letter"].'">'.$row["joining_letter"].'</a></span></td>
                                                    <td><span class="text-info"><a href="../user/upload/'.$row["salary_slip"].'">'.$row["salary_slip"].'</a></span></td>
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
                <!-- ============================================================== -->
                <!-- END HERE -->
                <!-- ============================================================== -->
            </div>

                
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

    

                    <!-- Modal -->
        <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                    
                </div>
                <div class="modal-body">
                    <h1 class="text-danger" style="text-align: center;">Are you sure?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal('remove')">No</button>
                    <button type="button" class="btn btn-primary" onclick="submit();">Yes</button>
                </div>
                </div>
            </div>
            </div>

            
            <div style="display: hidden">
                <form action="remove_house_entry.php" method="post" name="remove_form">
                    <input type="hidden" id="remove_id" name="remove_id">
                </form>
            </div>
    
    <!-- Modal -->
    <div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="edit_dataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update </h5>
                
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-material" action="" method="post">
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Status</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" placeholder="Enter Amount" class="form-control p-0 border-0"
                                                name="status" id="status">
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Full Name</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" class="form-control p-0 border-0" id="full_name" readonly>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Date Of Birth</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" class="form-control p-0 border-0" id="dob" readonly>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Address</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" class="form-control p-0 border-0" id="address" readonly>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">State</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" class="form-control p-0 border-0" id="state" readonly>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Pin Code</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" class="form-control p-0 border-0" id="pin" readonly>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Occupation</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" class="form-control p-0 border-0" id="occupation" readonly>
                </div>
            </div>

            <input type="hidden" id="this_id" name="this_id">
            <div class="form-group mb-4">
            <div class="col-sm-12">
                <button class="btn btn-success" type="submit">Update Profile</button>
            </div>
            </div>
            <p></p>
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal('edit_data')">Close</button>
                
            </div>
            </div>
        </div>
        </div>





    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="js/upload.js"></script>
</body>

</html>