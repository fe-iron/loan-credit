<?php
include '../admin/connection.php';
$conn = OpenCon();
if(isset($_POST['s'])){
        $target_dir = "upload/";        
        $occupation = $_POST['occupation'];
        $phone = $_POST["phone"];

        $identity = $_FILES['identity']['name'];
        $target_file1 = $target_dir . basename($_FILES["identity"]["name"]);
        // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","pdf");

        // Check extension
        if( in_array($imageFileType1,$extensions_arr) ){
           // Upload file
           if(move_uploaded_file($_FILES['identity']['tmp_name'],$target_dir.$identity)){
              // Insert record
              $flag1 = true;
           }
        }else{
            // echo $kyc;
            header("Location: cc-and-od.php?result=Something went wrong! ".$identity);
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
            // echo $bank_statement;
            header("Location: cc-and-od.php?result=Something went wrong! ".$bank_statement);
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
            // echo $photo;
            header("Location: cc-and-od.php?result=Something went wrong! ".$photo);
        }



        $trade = $_FILES['trade']['name'];
        $target_file3 = $target_dir . basename($_FILES["trade"]["name"]);
        // Select file type
        $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType3,$extensions_arr)){
        // Upload file
        if(move_uploaded_file($_FILES['trade']['tmp_name'],$target_dir.$trade)){
            // Insert record
            $flag4 = true;
        }
        }else{
            // echo $trade;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$trade);
        }


        $itr = $_FILES['itr']['name'];
        $target_file10 = $target_dir . basename($_FILES["itr"]["name"]);
        // Select file type
        $imageFileType10 = strtolower(pathinfo($target_file10,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType10,$extensions_arr)){
        // Upload file
        if(move_uploaded_file($_FILES['itr']['tmp_name'],$target_dir.$itr)){
            // Insert record
            $flag10 = true;
        }
        }else{
            // echo $itr;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$itr);
        }

        $gst = $_FILES['gst']['name'];
        $target_file11 = $target_dir . basename($_FILES["gst"]["name"]);
        // Select file type
        $imageFileType11 = strtolower(pathinfo($target_file11,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType11,$extensions_arr)){
        // Upload file
        if(move_uploaded_file($_FILES['gst']['tmp_name'],$target_dir.$gst)){
            // Insert record
            $flag11 = true;
        }
        }else{
            // echo $gst;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$gst);
        }


        
        if(empty($_FILES['previous_loan_sanction']['name'])){
            $previous_loan_sanction = '';
        }else{
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
                // echo $previous_loan_sanction;
                header("Location: cc-and-od.php?result=Something went wrong! at ".$previous_loan_sanction);
            }
            
        }
        
        if(empty($_FILES['current_statement']['name'])){
            $current_statement = '';
        }else{
            
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
                // echo $current_statement; 
                header("Location: cc-and-od.php?result=Something went wrong! at ".$current_statement);
            }
            
        }

        
        $deed = $_FILES['deed']['name'];
        $target_file12 = $target_dir . basename($_FILES["deed"]["name"]);
        // Select file type
        $imageFileType12 = strtolower(pathinfo($target_file12,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType12,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['deed']['tmp_name'],$target_dir.$deed)){
              // Insert record
              $flag12 = true;
           }
        }else{
            // echo $deed;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$deed);
        }

        
        $chain_deed = $_FILES['chain_deed']['name'];
        $target_file13 = $target_dir . basename($_FILES["chain_deed"]["name"]);
        // Select file type
        $imageFileType13 = strtolower(pathinfo($target_file13,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType13,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['chain_deed']['tmp_name'],$target_dir.$chain_deed)){
              // Insert record
              $flag13 = true;
           }
        }else{
            // echo $chain_deed;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$chain_deed);
        }


        
        $update_parcha = $_FILES['update_parcha']['name'];
        $target_file14 = $target_dir . basename($_FILES["update_parcha"]["name"]);
        // Select file type
        $imageFileType14 = strtolower(pathinfo($target_file14,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType14,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES['update_parcha']['tmp_name'],$target_dir.$update_parcha)){
              // Insert record
              $flag14 = true;
           }
        }else{
            // echo $update_parcha;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$update_parcha);
        }


        
        $update_Khajna = $_FILES["update_khajna"]["name"];
        $target_file15 = $target_dir . basename($_FILES["update_khajna"]["name"]);
        // Select file type
        $imageFileType15 = strtolower(pathinfo($target_file15,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType15,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES["update_khajna"]["tmp_name"],$target_dir.$update_Khajna)){
              // Insert record
              $flag15 = true;
           }
        }else{
            // echo $update_Khajna;
            header("Location: cc-and-od.php?result=Something wen  wrong! at ".$update_khajna);
        }

        
        $sanctioned_plan = $_FILES["sanctioned_plan"]["name"];
        $target_file16 = $target_dir . basename($_FILES["sanctioned_plan"]["name"]);
        // Select file type
        $imageFileType16 = strtolower(pathinfo($target_file16,PATHINFO_EXTENSION));

        // Check extension
        if(in_array($imageFileType16,$extensions_arr)){
           // Upload file
           if(move_uploaded_file($_FILES["sanctioned_plan"]["tmp_name"],$target_dir.$sanctioned_plan)){
              // Insert record
              $flag16 = true;
           }
        }else{
            // echo $sanctioned_plan;
            header("Location: cc-and-od.php?result=Something went wrong! at ".$sanctioned_plan);
        }





        if($flag1 && $flag2 && $flag3 && $flag4 && $flag7 && $flag8 && $flag11 && $flag11 &&
            $flag12 && $flag13 && $flag14 && $flag15 && $flag16){
            $query = "INSERT INTO loans (phone_number,loan,identity,bank_statement,trade_licence,itr,gst,photo,deed,chain_deed,update_parcha,update_khajna,sanctioned_plan,previous_loan,current_statement,loan_type)
                    values('$phone', '$occupation', '$identity', '$bank_statement', '$trade', '$itr', '$gst', '$photo', '$deed', '$chain_deed', '$update_parcha', '$update_Khajna', '$sanctioned_plan', '$previous_loan_sanction', '$current_statement', 'Cash credit & Overdraft')";
             
              $result = mysqli_query($conn,$query);
              if($result){
                    $_SESSION['loan_id'] = mysqli_insert_id($conn);
                    $msg = "Your application is updated Successfully! Now please make payment";
                    header("Location: payment.php?result=".$msg);      
               }else{
                  //   echo mysqli_error($conn);
                    $msg = "Update Failed!";
               }
               header("Location: cc-and-od.php?result=".$msg);
            
        }
    }
?>