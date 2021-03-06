<?php

    include '../admin/connection.php';

    $conn = OpenCon();

    if(empty($_GET)) {
        $msg = " ";
    }else{
        $msg = $_GET['result'];
    }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ezay Credit Solution | Register</title>

    <!-- Favicon icon -->
    <link href='images/16.ico' rel="shortcut icon" type=image/x-icon>
    <!-- Custom CSS -->
    <link href="../admin/css/style.min.css" rel="stylesheet">
    <link href="../css/multi-step-form.css" rel="stylesheet">
    <link rel="icon"  type="image/png" href="../images/fav.png">

</head>

<body>

                    
<div class="container">
    <div class="row">
        <div class="col-md d-flex justify-content-center">
            
        </div>
    </div>
</div>
<!-- multistep form -->
                    <form id="msform" action="registration.php" method="post">
                            <?php 
                                    if($msg == "Registered Successfully!" || $msg == "Successfully Updated"){
                                        print '<h2 class="text-success" style="text-align: center">'.$msg.'</h2>';
                                    }else{
                                        print '<h2 class="text-danger" style="text-align: center">'.$msg.'</h2>';
                                    }
                            ?> 
                            
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Kind of Loan</li>
                        <li>Mobile Number</li>
                        <li>Personal Details</li>
                        <li>Profession</li>
                        
                        
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Kind of Loan you're looking for?</h2>
                        <h3 class="fs-subtitle"></h3>
                        <select name="loan">
                            <option value="Personal">Personal Loan</option>
                            <option value="Mortgage Loan">Mortgage Loan</option>
                            <option value="Business Loan">Business Loan</option>
                            <option value="Home Loan">Home loan</option>
                            <option value="Cash credit & Overdraft Loan">Cash credit & Overdraft</option>
                        </select>
                        
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Mobile Number</h2>
                        <h3 class="fs-subtitle">Verify Mobile Number</h3>
                        <input type="tel" placeholder="Mobile Number" name="phone" id="mob">
                        <input type="tel" placeholder="Enter OTP..." id="verificationCode">
                        
                        <div id="recaptcha-container"></div>
                        
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <button type="button" onclick="send_otp();" class="action-button" id="get-otp" class="btn btn-success">Get OTP</button>
                        <input type="button" name="next" onclick="codeVerify()" id="mobile_next" class="next action-button"  style="background:#2f523e;" value="Verify & Next" disabled/>    
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Personal Details</h2>
                        <h3 class="fs-subtitle">We will never sell it</h3>
                        <input type="text" name="fname" placeholder="Full Name" />
                        <input type="date" name="dob" placeholder="Date of Birth" />
                        <select name="gender">
                            <option value="" selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <input type="text" name="address" placeholder="Enter Address" />
                        <input type="number" name="pin" placeholder="Pin Code" />

                        <select name="state">
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

                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Profession</h2>
                        <h3 class="fs-subtitle">Choose your occupation type</h3>
                        <select name="occupation">
                            <option value="salaried">Salaried</option>
                            <option value="self employed">Self Employed</option>
                        </select>

                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        
                        <input type="submit" name="submit" class="submit action-button" id="signup-btn" value="Submit" />
                    </fieldset>
                    
                        
                    
                    </form>
                    <p id="msg" style="color: orangered;" class="text-center"></p>


                <footer class="footer text-center text-black" style="background: transparent;"> 2021 ?? Eazy Credit Solution <a
                href="http://eazycreditsolution.com/"  class="text-primary">EazyCreditSolution</a>
                </footer>
    

    <script src="../admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'>
    // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script src="../admin/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/js/custom.js"></script>
    <script src="../js/multi-step-form.js"></script>
    <script src="../js/phone_auth.js"></script>
    
</body>

</html>