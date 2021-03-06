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

    $new_phone = stripslashes($_REQUEST['new_phone']);
        //escapes special characters in a string
    $new_phone = mysqli_real_escape_string($con,$new_phone);
    
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE phone_number='$phone'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    
    if($rows==1){
        $sql = "UPDATE users SET phone_number='$new_phone' WHERE phone_number='$phone'";
        if ($con->query($sql) === TRUE) {
            header("Location: index.php?result=Mobile Number Changed Successfully!");
        } else {
            echo "Error updating record: " . $conn->error;
            // header("Location: password_change.php?result=Something Went Wrong try again!");
        }

        $sql = "UPDATE loans SET phone_number='$new_phone' WHERE phone_number='$phone'";
        if ($con->query($sql) === TRUE) {
            header("Location: index.php?result=Mobile Number Changed Successfully!");
        } else {
            // echo "Error updating record: " . $conn->error;
            header("Location: password_change.php?result=Something Went Wrong try again!");
        }
        
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

    <title>Ezay Credit Solution | Mobile Number Change</title>

    <!-- Favicon icon -->
    <link href='images/16.ico' rel="shortcut icon" type=image/x-icon>
    <!-- Custom CSS -->
    <link href="../admin/css/style.min.css" rel="stylesheet">
    <link rel="icon"  type="image/png" href="../images/fav.png">
    <link href="../css/multi-step-form.css" rel="stylesheet">

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

    <div class="container">
        <div class="row">
            <div class="col-md d-flex justify-content-center">
                <img src="../images/loan_logo.png" alt="logo" width="200px">
            </div>
        </div>
    </div>
    <form id="msform" action="" method="post">
                            <?php 
                                    if($msg == "Registered Successfully!" || $msg == "Successfully Updated"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                            ?> 
                            <?php if($set_cond){
                                echo '<p class="text-danger h3 py-2">Mobile Number not found! Try Again!</p>';}
                            ?>
                         
                    <fieldset>
                        <h2 class="fs-title">Change Mobile Number</h2>
                        <h3 class="fs-subtitle">Verify Your Mobile Number</h3>
                        <input type="tel" placeholder="Mobile Number" name="phone" >
                        <input type="tel" placeholder=" NEW Mobile Number" name="new_phone" id="mob" id="mob">
                        <input type="tel" placeholder="Enter OTP..." id="verificationCode" style="display: none;">
                        
                        <div id="recaptcha-container"></div>
                        
                        
                        <button type="button" onclick="send_otp1();" class="action-button" id="get-otp" class="btn btn-success">Get OTP</button>
                        <input type="submit" name="next"  id="mobile_next" class="next action-button"  style="background:#2f523e;" value="change" />    
                    </fieldset>
                                </form>


            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-white" style="background: transparent;"> 2021 ?? Eazy Credit Solution <a
                    href="http://eazycreditsolution.com/"  class="text-primary">EazyCreditSolution</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
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