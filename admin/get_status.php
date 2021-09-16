<?php 
    include 'connection.php';
    $conn = OpenCon();
    $q = intval($_GET['q']);

    $sql="SELECT * FROM loans WHERE id = '".$q."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    echo $row['status']." ";
    $number = $row['phone_number'];

    $sql="SELECT * FROM users WHERE phone_number = '".$number."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    echo $row['full_name']." ";
    echo $row['dob']." ";
    echo $row['address']." ";
    echo $row['pin']." ";
    echo $row['state']." ";
    echo $row['occupation']." ";
?>
