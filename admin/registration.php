<?php

    require('connection.php');
    $con = OpenCon();
     // If form submitted, insert values into the database.
     if (isset($_POST['email'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['email']);
        //escapes special characters in a string

        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];

        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            header("Location: signup.php?result=Email Already Exists!");
        }else{
                $query = "INSERT into `users` (phone_number, email, password, full_name) 
                        VALUES ('$phone', '$email', '".md5($password)."', '$name')";       
        }
        // echo $query;
        $result = mysqli_query($con,$query);
        if($result){
            header("Location: index.php?result=Registered Successfully!");
        }else{
            header("Location: signup.php?result=Something Went Wrong! Try Again");
        }
            
    }
?>

