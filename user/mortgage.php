<?php

    include '../admin/connection.php';
    include '../admin/auth.php';    
    $conn = OpenCon();

    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }
    
    
    
    $occupation = '';
    if(isset($_POST['s'])){
        $name = $_FILES['img_file']['name'];
        $page = $_POST['page'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["img_file"]["name"]);
      
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
      
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
           // Upload file
           if(move_uploaded_file($_FILES['img_file']['tmp_name'],$target_dir.$name)){
              // Insert record
              $query = "INSERT INTO images (image_url, page) values('".$name."', '$page')";
              $result = mysqli_query($conn,$query);
              if($result){
                    $msg = "Uploaded Successfully!";
               }else{
                    $msg = "Image Saving Failed!";
               }
           }
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
    
    <!-- <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> -->
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
                        <h4 class="page-title text-center">Mortgage Loan</h4>
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
            <div class="row">
                    <div class="col-lg-8 col-xlg-9 col-md-12" style="margin-left: auto; margin-right: auto;">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    if($msg == "Uploaded Successfully!" || $msg == "Successfully Deleted!"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                                ?>

                            
                                <form class="form-horizontal form-material" action="" method="post"
                                    enctype="multipart/form-data" onSubmit="return validateImage();">
                                    <h3 class="text-center">Application form</h3> <br>

                                    <p class="form-group mb-4 text-danger">All documents should be Uploaded in PDF format.</p>
                                    <p class="form-group mb-4 text-info text-center">Personal Document</p>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Your Photo</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="bank_statement"
                                                id="img_gst" required>
                                        </div>
                                    </div>
                            <?php 
                                if($_SESSION['occupation'] === 'self employed'){
                            ?>
                                    
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">PAN, Aadhar Card, Voter ID Applicant / Co Applicant</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="identity"
                                                id="img_identity" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Bank statement of last 1 year</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="bank_statement"
                                                id="img_bank" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Trade licence of last 3 years</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="trade"
                                                id="img_trade" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">ITR of last 3 years with P/L, Balance sheet & computation of income</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="itr"
                                                id="img_itr" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">GST return</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="gst"
                                                id="img_gst" required>
                                        </div>
                                    </div>
                                <?php
                                    }else{
                                ?>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Last 3 Months salary slip</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="salary_slip"
                                                id="img_salary_slip" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Form 16 last 2 years</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="form16"
                                                id="img_form_16" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0"> Joining letter and ID card(in one PDF)</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="joining_letter"
                                                id="img_joining_letter" required>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>  
                                    <p class="form-group mb-4 text-info text-center">Legal Documents</p>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Deed</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="deed"
                                                id="img_deed" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Chain Deed</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="chain_deed"
                                                id="img_chain_deed" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Update Parcha</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="update_parcha"
                                                id="img_update_parcha" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Update Khajna</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="update_Khajna"
                                                id="img_update_Khajna" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Sanctioned Plan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="Sanctioned Plan"
                                                id="img_Sanctioned Plan" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Estimate</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter Amount" class="form-control p-0 border-0"
                                                name="estimate">
                                        </div>
                                    </div>
                                    
                                    <p class="form-group mb-4 text-info text-center">Other Documents</p>
                                    
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Previous Loan Sanction letter</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="previous_loan_sanction"
                                                id="img_previous_loan_sanction" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Current Statement with Foreclosures Amount</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="current_statement"
                                                id="img_current_statement" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" value="Submit" name="s">Submit Form</button>
                                        </div>
                                    </div>
                                    <p class="form-group mb-4 text-danger">DO NOT UPLOAD PDFs OF SIZE MORE THAN 10MB</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            
            
            <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Loans Applied</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Bank statement</th>
                                            <th class="border-top-0">photo</th>
                                            <th class="border-top-0">ITR</th>
                                            <th class="border-top-0">Trade</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Deed</th>
                                            <th class="border-top-0">Update Parcha</th>
                                            <th class="border-top-0">Estimate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                                    <td>1</td>
                                                    <td>something</td>
                                                    <td>something</td>
                                                    <td>something</td>
                                                    <td>something</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success">Approved</button>
                                                        <button type="button" class="btn btn-danger">Reject</button>
                                                    </td>
                                                    <td>something</td>
                                                    <td><span class="text-info">Deed</span></td>
                                                    <td><span class="text-info">Estimate</span></td>

                                                </tr>
                                            
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