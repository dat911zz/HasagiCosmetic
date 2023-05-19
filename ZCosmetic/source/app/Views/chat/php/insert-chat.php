<?php 
    session_start();
    if(isset($_SESSION['MaTaiKhoan'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['MaTaiKhoan'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO tbl_messenger (in_msgs_id, out_msgs_id, NoiDung)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>