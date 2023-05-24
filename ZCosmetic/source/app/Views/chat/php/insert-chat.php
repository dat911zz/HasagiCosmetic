<?php 
 include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
 $db = new DatabaseHelper();
    session_start();
    if(isset($_SESSION['MaTaiKhoan'])){
        $outgoing_id = $_SESSION['MaTaiKhoan'];
        $incoming_id = $_POST['incoming_id'];
        $message =  $_POST['message'];
        if(!empty($message)){
            $sql = "INSERT INTO tbl_messenger (in_msgs_id, out_msgs_id, NoiDung)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
            $KQ = $db->executeNonQuery($sql);
        }
    }else{
        $myJS = <<<EOT
        <script type='text/javascript'>
            window.location.replace("/Chat/Users");
        </script>
        EOT;
      echo($myJS);
    }
?>