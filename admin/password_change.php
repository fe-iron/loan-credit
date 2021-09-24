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
    $not_found = False;
    $not_match = False;
    $set_passw = False;
    // If form submitted, insert values into the database.
if (isset($_POST['phone'])){
    $confirm_password = $_POST['confirm_password'];
    $new_password = $_POST['new_password'];
    $old_password = $_POST['old_password'];
    if($confirm_password == $new_password){
        $result = mysql_query("SELECT password FROM users WHERE email='admin@eazycreditsolution.com' AND password='".md5($old_password)."'");
        if(!$result)
        {
            $set_cond = True;
        }
        else
        {
            $result=mysql_query("UPDATE users SET password='$new_password' where email='admin@eazycreditsolution.com'");    
            if($result){
                header("Location: login.php?result=Congratulations!! You have successfully changed your password");
            }else{
                $set_passw = True;
            }
        }
    }else{
        $not_match = True;
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
                                echo '<p class="text-danger h4 py-2">Password Match Not Found! Enter Correct Old Password!</p>';}
                                elseif($not_match){
                                    echo '<p class="text-danger h4 py-2">Password Do not matched! Try Again!</p>';
                                }elseif($set_passw){
                                    echo '<p class="text-danger h4 py-2">Password Change Filed! Try Again</p>';
                                }
                            ?>
                            
                         
                    <fieldset>
                        <h2 class="fs-title">Change Your Password</h2>
                        <h3 class="fs-subtitle">Verify Your Password and Change</h3>
                        
                        <input type="text" value="admin@eazycreditsolution.com" readonly>
                        <input type="text" placeholder="Old Password..." name="old_password" id="mob" id="mob" required>
                        <input type="password" placeholder="New Password" name="new_password" required>
                        <input type="password" placeholder="Confirm New Password" name="confirm_password" required>
                        
                        
                        
                        <input type="submit" name="next" class="next action-button" value="change"/>    
                    </fieldset>
                                </form>


            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-white" style="background: transparent;"> 2021 © Eazy Credit Solution <a
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