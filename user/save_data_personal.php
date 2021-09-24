<?php
include '../admin/connection.php';
$conn = OpenCon();
if(isset($_POST['s'])){
        $target_dir = "upload/";        
        $occupation = $_POST['occupation'];
        $phone = $_POST["phone"];

        $kyc = $_FILES['kyc']['name'];
        $target_file1 = $target_dir . basename($_FILES["kyc"]["name"]);
        // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","pdf");
      

        // Check extension
        if( in_array($imageFileType1,$extensions_arr) ){
           // Upload file
           if(move_uploaded_file($_FILES['kyc']['tmp_name'],$target_dir.$kyc)){
              // Insert record
              $flag1 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$kyc);
        }


        
        
        $bank_statement = $_FILES['bank_statement']['name'];
        $target_file2 = $target_dir . basename($_FILES["bank_statement"]["name"]);
        // Select file type
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType2,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['bank_statement']['tmp_name'],$target_dir.$bank_statement)){
              // Insert record
              $flag2 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$bank_statement);
        }


        $photo = $_FILES['photo']['name'];
        $target_file3 = $target_dir . basename($_FILES["photo"]["name"]);
        // Select file type
        $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType3,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photo)){
              // Insert record
              $flag3 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$photo);
        }


        $salary_slip = $_FILES['salary_slip']['name'];
        $target_file4 = $target_dir . basename($_FILES["salary_slip"]["name"]);
        // Select file type
        $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType4,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['salary_slip']['tmp_name'],$target_dir.$salary_slip)){
              // Insert record
              $flag4 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$salary_slip);
        }

        $form16 = $_FILES['form16']['name'];
        $target_file5 = $target_dir . basename($_FILES["form16"]["name"]);
        // Select file type
        $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType5,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['form16']['tmp_name'],$target_dir.$form16)){
              // Insert record
              $flag5 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$form16);
        }


        $joining_letter = $_FILES['joining_letter']['name'];
        $target_file6 = $target_dir . basename($_FILES["joining_letter"]["name"]);
        // Select file type
        $imageFileType6 = strtolower(pathinfo($target_file6,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType6,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['joining_letter']['tmp_name'],$target_dir.$joining_letter)){
              // Insert record
              $flag6 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$joining_letter);
        }



        $previous_loan_sanction = $_FILES['previous_loan_sanction']['name'];
        $target_file7 = $target_dir . basename($_FILES["previous_loan_sanction"]["name"]);
        // Select file type
        $imageFileType7 = strtolower(pathinfo($target_file7,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType7,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['previous_loan_sanction']['tmp_name'],$target_dir.$previous_loan_sanction)){
              // Insert record
              $flag7 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$previous_loan_sanction);
        }


        $current_statement = $_FILES['current_statement']['name'];
        $target_file8 = $target_dir . basename($_FILES["current_statement"]["name"]);
        // Select file type
        $imageFileType8 = strtolower(pathinfo($target_file8,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType8,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['current_statement']['tmp_name'],$target_dir.$current_statement)){
              // Insert record
              $flag8 = true;
           }
        }else{
            header("Location: personal-loan.php?result=Something went wrong! ".$current_statement);
        }

        if($flag1 && $flag2 && $flag3 && $flag4 && $flag5 && $flag6 && $flag7 && $flag8){
            $query = "INSERT INTO loans (phone_number,loan,kyc,bank_statement,photo,salary_slip,form_16,joining_letter,previous_loan,current_statement,loan_type)
             values('$phone', '$occupation', '$kyc', '$bank_statement', '$photo', '$salary_slip', '$form16', '$joining_letter', '$previous_loan_sanction', '$current_statement', 'Personal')";
             
              $result = mysqli_query($conn,$query);
              if($result){
                     $_SESSION['loan_id'] = mysqli_insert_id($con);
                     // echo $_SESSION['loan_id'];
                     $msg = "Your application is updated Successfully! Now please make payment";
                     header("Location: payment.php?result=".$msg);      
               }else{
                  //   echo mysqli_error($conn);
                    $msg = "Update Failed!";
                    header("Location: personal-loan.php?result=".$msg);
               }
               
            
        }

        // echo $kyc, $bank_statement, $photo, $salary_slip, $form16, $joining_letter, $previous_loan_sanction, $current_statement;
    }
    // phone_number	loan	kyc	bank_statement	trade_licence	itr	gst	photo	salary_slip	form_16	joining_letter	deed	chain_deed	update_parcha	update_khajna	sanctioned_plan	estimate	previous_loan	current_statement	status	

?>

