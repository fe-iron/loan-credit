<?php

    include '../admin/connection.php';

    $con = OpenCon();
     // If form submitted, insert values into the database.
     if (isset($_POST['phone'])){
        // removes backslashes
        $name = $_POST['fname'];
        $phone = $_POST['phone'];
        $loan = $_POST['loan'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $gender = $_POST['address'];
        $gender = $_POST['pin'];
        $state = $_POST['state'];
        $occupation = $_POST['occupation'];

        $sql = "SELECT * FROM `users` WHERE phone='$phone'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            header("Location: signup.php?result=Mobile Number Exists!");
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

