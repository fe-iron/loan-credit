<?php

    require('admin/connection.php');
    $con = OpenCon();
     // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['email']);
        //escapes special characters in a string

        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $fname = stripslashes($_REQUEST['fname']);
        $fname = mysqli_real_escape_string($con,$fname);
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $message = $_POST['message'];

        
        $query = "INSERT into `messages` (first_name, last_name, email, phone_number, address, message) 
                        VALUES ('$fname', '$lname', '$email', $phone, '$address', '$message')";       
        // echo $query;
        $result = mysqli_query($con,$query);
        $msg = "Succcess";
        json_encode(['code'=>200, 'msg'=>$msg]);
        exit;
    }
?>

