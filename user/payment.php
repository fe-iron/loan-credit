<?php

    include '../admin/connection.php';
    include '../admin/auth.php';    
    $conn = OpenCon();

    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }    
    
    $sql = "SELECT * FROM payment ORDER BY id DESC LIMIT 1";
    $payment = $conn->query($sql);
    if ($payment->num_rows > 0) {
        // output data of each row
        $row = $payment->fetch_assoc();
    }

    $occupation = '';
    if(isset($_POST['s'])){
        $name = $_FILES['photo']['name'];
        $loan_id = $_POST['loan_id'];
        $target_dir = "../admin/upload/payment/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
      
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","pdf");
      
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
           // Upload file
           if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$name)){
              // Insert record
              $query = "UPDATE loans SET payment_slip='".$name."' WHERE id=".$loan_id;
              $result = mysqli_query($conn,$query);
              if($result){
                    $query = "UPDATE users SET form_completed=1 WHERE phone_number=".$_SESSION['phone'];
                    $result = mysqli_query($conn,$query);  
                    if($result){
                        $msg = "Application Submitted Successfully!";
                    }else{
                        $msg = "Application Submitted Successfully! with some error";
                    }
                    
               }else{
                    $msg = "Record saving Failed!";
               }
           }
        }else{
            $msg = "Image Saving Failed!";
        }
        header("Location: index.php?result=".$msg);
    }

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Eazy Credit Solution | Payment</title>
    
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php if($_SESSION['loan'] == "Personal" ){ ?>
                            <h4 class="page-title text-primary text-center">Payment for your <?php echo $_SESSION['loan']; ?> Loan Application</h4>
                        <?php }else{?>
                            <h4 class="page-title text-primary text-center">Payment for your <?php echo $_SESSION['loan']; ?> Application</h4>
                        <?php }?>        
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
                                    if($msg == "Your application is updated Successfully! Now please make payment"){
                                        print '<h4 class="text-success" style="text-align: center">'.$msg.'</h4>';
                                    }else{
                                        print '<h4 class="text-danger" style="text-align: center">'.$msg.'</h4>';
                                    }
                                ?>

                            
                                <form class="form-horizontal form-material" action="" method="post"
                                    enctype="multipart/form-data" onSubmit="return validateImage();">
                                    <h3 class="text-center">Upload Payment Screenshot</h3> <br>

                                    <p class="form-group mb-4 text-dark fs-5">Scan below QR or pay from other options like UPI or Bank Transfer. <br> Pay from your phone then upload the transaction screenshot below</p>
                                    
                                    <p class="form-group text-dark fs-6 fw-bolder text-center">Account Details</p>
                                    <p class="form-group text-dark fs-4 text-center">Recepient's Name: <?php echo $row['holder_name']; ?></p>
                                    <p class="form-group text-dark fs-4 text-center">Bank Name: <?php echo $row['bank_name']; ?></p>
                                    <p class="form-group text-dark fs-4 text-center">IFSC CODE: <?php echo $row['ifsc']; ?></p>

                                    <p class="form-group text-dark fw-bolder fs-5 text-center">Account Number: <?php echo $row['acc_number'] ?></p>

                                    <p class="form-group text-dark fw-bolder fs-6 text-center">QR CODE </p>
                                    <div class="class="justify-content-md-center">
                                        <img src="../admin/upload/payment/admin_qr.jpg"  alt="QR Code">
                                    </div>
                                    <p class="form-group text-dark fs-5 text-center fw-bold">UPI ID: <?php echo $row['upi_id']; ?></p>


                                    <p class="form-group text-primary">Please pay ₹499 Rupees from the below options to complete your loan application.</p>


                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Payment Slip</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" class="form-control p-0 border-0" name="photo"
                                                id="img_photo" required onchange="validateImage('img_photo');" required>
                                        </div>
                                    </div>
                            
                                    <input type="hidden" value="<?php echo $_SESSION['loan_id']; ?>" name="loan_id">
                                    


                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" value="Submit" name="s">Submit Payment Slip</button>
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
    <script src="../admin/js/upload.js"></script>
</body>

</html>