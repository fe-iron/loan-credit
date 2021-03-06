<?php

    include '../admin/connection.php';
    include '../admin/auth.php';    
    $conn = OpenCon();

    
    $sql = "SELECT * FROM payment";
    $teams = $conn->query($sql);

    
    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }
    
    if (isset($_POST['s'])){
        $target_dir = "upload/payment/";

        $upi = $_POST["upi"];
        $bank_name = $_POST["bank_name"];
        $bank_holder_name = $_POST["bank_holder_name"];
        $bank_account_number = $_POST["bank_account_number"];
        $bank_ifsc = $_POST["bank_ifsc"];
    
        $photo = $_FILES['qr']['name'];
        $target_file1 = $target_dir . basename($_FILES["qr"]["name"]);
            // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
            // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png");
          
            if( in_array($imageFileType1,$extensions_arr) ){
                // Upload file
                if(move_uploaded_file($_FILES['qr']['tmp_name'],$target_dir.$photo)){
                   // Insert record
                   $query = "INSERT INTO payment(holder_name, ifsc, acc_number, upi_id, bank_name, qr_code)
                    values('$bank_holder_name', '$bank_ifsc', $bank_account_number, '$upi', '$bank_name', '$photo')";
                    // echo $query;
                    $result = mysqli_query($conn,$query);
                    if($result){
                        $msg = "Updated Successfully!";
                        // echo $msg;
                    }else{
                        // echo mysqli_error($conn);
                        $msg = "Update Failed!";
                    }
                    // echo $msg;
                    header("Location: payment-options.php?result=".$msg);
                }
             }else{
                //  echo "error saving file";
                 header("Location: payment-options.php?result=Something went wrong! at ".$photo);
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
    
    <title>Eazy Credit Solution | Admin | Website Change</title>
    
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
                                <a class="sidebar-link" href="mortgage.php"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
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
                                    <i class="far fa-clock" aria-hidden="true"></i>
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
                        <h4 class="page-title text-center">Payment Option Settings</h4>
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
                                    if($msg == "Updated Successfully!" || $msg == "Successfully Deleted!"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                                ?>

                            
                                <form class="form-horizontal form-material" action="" method="post"
                                    enctype="multipart/form-data">
                                    <h3 class="text-center">Update Payment Form</h3> <br>

                                    
                                    <p class="form-group mb-4 text-info text-center">Add QR CODE & UPI </p>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">QR Code</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="qr"
                                                id="img_photo" required onchange="validateImage('img_photo');" title="Photo should be small in size and be in format 240x240">
                                        </div>
                                    </div>
                            
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">UPI ID</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter UPI ID..." class="form-control p-0 border-0"
                                                name="upi" required>
                                        </div>
                                    </div>
                                    <p class="form-group mb-4 text-info text-center">Add Bank Detail</p>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Bank Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter Bank Name..." class="form-control p-0 border-0"
                                                name="bank_name" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Bank Holder Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter Bank Holder Name..." class="form-control p-0 border-0"
                                                name="bank_holder_name" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Bank Account Nunber</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter Bank Account Number..." class="form-control p-0 border-0"
                                                name="bank_account_number" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Bank IFSC Code</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter Bank IFSC Code..." class="form-control p-0 border-0"
                                                name="bank_ifsc" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" value="Submit" name="s">Submit Form</button>
                                        </div>
                                    </div>

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
                                <h3 class="box-title mb-0">Update History</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">QR Code</th>
                                            <th class="border-top-0">UPI Id</th>
                                            <th class="border-top-0">Bank Name</th>
                                            <th class="border-top-0">Bank Holder's Name</th>
                                            <th class="border-top-0">Account Number</th>
                                            <th class="border-top-0">IFSC Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($teams->num_rows > 0) {
                                            // output data of each row
                                            $text = '';
                                            $i = 0;
                                            while($row = $teams->fetch_assoc()) {
                                                $i += 1;
                                                $text= $text. '<tr>
                                                    <td>'.$i.'</td>
                                                    <td class="txt-oflo">'.$row['date'].'</td>
                                                    <td> <a href="upload/payment/'.$row["qr_code"].'">'.$row["qr_code"].'</a></td>
                                                    <td>'.$row["upi_id"].'</td>
                                                    <td>'.$row["bank_name"].'</td>
                                                    <td>'.$row["holder_name"].'</td>
                                                    <td>'.$row["acc_number"].'</td>
                                                    <td>'.$row["ifsc"].'</td>
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
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 ?? Eazy Credit Solution  <a
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
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    
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