<?php

    include '../admin/connection.php';

    $con = OpenCon();
    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }

    session_start();
    $set_cond = False;
    // If form submitted, insert values into the database.
if (isset($_POST['phone'])){
        // removes backslashes
    $phone = stripslashes($_REQUEST['phone']);
        //escapes special characters in a string
    $phone = mysqli_real_escape_string($con,$phone);
    
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE phone_number='$phone'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    
    if($rows==1){
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['full_name'];
        $_SESSION['occupation'] = $row['occupation'];
        $_SESSION['phone'] = $row['phone_number'];
        $_SESSION['loan'] = $row['loan'];
        
        
        // Redirect user to index.php
        header("Location: index.php");
    }else{
        $set_cond = True;
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

    <title>Ezay Credit Solution | Login</title>

    <!-- Favicon icon -->
    <link href='images/16.ico' rel="shortcut icon" type=image/x-icon>
    <!-- Custom CSS -->
    <link href="../admin/css/style.min.css" rel="stylesheet">
    <link rel="icon"  type="image/png" href="../images/fav.png">
    <link href="../css/multi-step-form.css" rel="stylesheet">
    <style>
        @media (max-width: 1050px) {
            #msform, .footer {
                /* position: static; */
                left: 0px;
                top: 75px;
            }
        }
    </style>
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

    <form id="msform" action="login.php" method="post">
                            <?php 
                                    if($msg == "Registered Successfully!" || $msg == "Successfully Updated"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                            ?> 
                            <?php if($set_cond){
                                echo '<p class="text-danger h3 py-2">Wrong Credentials, Try Again!</p>';}
                            ?>
                         
                    <fieldset>
                        <h2 class="fs-title">Mobile Number login</h2>
                        <h3 class="fs-subtitle">Verify Mobile Number</h3>
                        <input type="tel" placeholder="Mobile Number" name="phone" id="mob">
                        <input type="tel" placeholder="Enter OTP..." id="verificationCode" style="display: none;">
                        
                        <div id="recaptcha-container"></div>
                        
                        
                        <button type="button" onclick="send_otp();" class="action-button" id="get-otp" class="btn btn-success">Get OTP</button>
                        <input type="submit" name="next"  id="mobile_next" class="next action-button"  style="background:#2f523e;" value="Login" disabled/>    
                    </fieldset>
                                </form>

        </div>
        <footer class="footer text-center text-black" style="background: transparent;"> 2021 © Eazy Credit Solution <a
                href="http://eazycreditsolution.com/"  class="text-primary">EazyCreditSolution</a>
            </footer>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div> -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/app-style-switcher.js"></script> -->
    <!--Wave Effects -->
    <!-- <script src="js/waves.js"></script> -->
    <!--Menu sidebar -->
    <script src="../admin/js/sidebarmenu.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/js/custom.js"></script>
    <script src="../js/phone_auth.js"></script>
</body>

</html>