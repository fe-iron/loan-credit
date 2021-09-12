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
        $address = $_POST['address'];
        $pin = $_POST['pin'];
        $state = $_POST['state'];
        $occupation = $_POST['occupation'];

        $sql = "SELECT * FROM `users` WHERE phone='$phone'";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
            header("Location: signup.php?result=Mobile Number Exists!");
        }else{
            $query = "INSERT into `users` (full_name, phone_number, loan, dob, gender, address, pin, state, occupation) 
                        VALUES ('$name', '$phone', '$loan', '$dob', '$gender', '$address', '$pin', '$state', '$occupation')";
        }
        // echo $query;
        // $result = mysqli_query($con,$query);

        if($con->query($query) === TRUE){
            header("Location: login.php?result=Registered Successfully!");
        }else{
            // echo "Error: " . $query . "<br>" . $con->error;
            header("Location: signup.php?result=Something Went ! Try Again");
        }
            
    }
?>

