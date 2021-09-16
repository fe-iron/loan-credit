<?php

    require('admin/connection.php');
    $con = OpenCon();
     // If form submitted, insert values into the database.
    if (isset($_POST['phone'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['email']);
        //escapes special characters in a string

        $email = stripslashes($_REQUEST['email']);

        $email = mysqli_real_escape_string($con,$email);
        
        $fname = stripslashes($_REQUEST['fname']);
        $fname = mysqli_real_escape_string($con,$fname);
        $amount = $_POST['amount'];
        $phone = $_POST['phone'];
        $month = $_POST['month'];
        $installment = $_POST['installment'];

        if(empty($_POST['email'])){
            $query = "INSERT into `subscriber` (full_name, amount, phone, installment, duration) 
                        VALUES ('$fname', $amount, '$phone', $installment, '$month')";       
        }else{
            $query = "INSERT into `subscriber` (full_name, amount, email, phone, installment, duration) 
                        VALUES ('$fname', $amount, '$email', '$phone', $installment, '$month')";       
        }
        
        // echo $query;
        $result = mysqli_query($con,$query);

        if($result){
            $msg = "Updated Successfully!";
            header("Location: index.php?result=".$msg);
            // echo $msg;
        }else{
            echo mysqli_error($conn);
            $msg = "Update Failed!";
            header("Location: index.php?result=".$msg);
        }
        
        
    }
?>

