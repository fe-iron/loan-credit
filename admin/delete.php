<?php
    require('connection.php');
    $con = OpenCon();

    
    // If form submitted, insert values into the database.
    if (isset($_POST['remove_id'])){
            // removes backslashes
        $this_id = $_POST['remove_id'];
        $page = $_POST['page'];

        if($page == "carousal"){
            $sql = "DELETE FROM carousal WHERE id=".$this_id;    
        }elseif($page == "loan-type"){
            $sql = "DELETE FROM loan_type WHERE id=".$this_id;    
        }elseif($page == "call"){
            $sql = "DELETE FROM phone_call WHERE id=".$this_id;
        }elseif($page == "team_member"){
            $sql = "DELETE FROM team WHERE id=".$this_id;    
        }

        if ($con->query($sql) === TRUE) {
            header("Location: ".$page.".php?result=Successfully Deleted!");
        } else {
            header("Location: ".$page.".php?result=Failed to remove!");
        }

    }
?>