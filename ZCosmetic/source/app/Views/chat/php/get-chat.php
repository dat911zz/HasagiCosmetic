<?php 
    session_start();
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    $db = new DatabaseHelper();
    if(isset($_SESSION['MaTaiKhoan'])){
        $outgoing_id = $_SESSION['MaTaiKhoan'];
        $loaiTK = $_SESSION['role'] ;

        $incoming_id = $_POST['incoming_id'];
        $output = "";

        if ($loaiTK == 3){
            $sql = "SELECT * FROM tbl_messenger 
            LEFT JOIN tbl_nhanvien ON   tbl_nhanvien.Ma = tbl_messenger.out_msgs_id                    
            WHERE (out_msgs_id = {$outgoing_id} AND in_msgs_id = {$incoming_id})
            OR (out_msgs_id = {$incoming_id} AND in_msgs_id = {$outgoing_id}) ORDER BY ma_msg";
        }
        else {
            $sql = "SELECT * FROM tbl_messenger 
            LEFT JOIN tbl_nguoidung ON   tbl_nguoidung.Ma = tbl_messenger.out_msgs_id                    
            WHERE (out_msgs_id = {$outgoing_id} AND in_msgs_id = {$incoming_id})
            OR (out_msgs_id = {$incoming_id} AND in_msgs_id = {$outgoing_id}) ORDER BY ma_msg";
    
        }

        $data = $db->executeReader($sql);
        if($db->executeCount($sql) > 0){
            foreach($data as $pr){
                if($pr->out_msgs_id === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $pr->NoiDung .'</p>
                                        <span>'. $pr->ThoiGian .'</span>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg" alt="">
                                    <div class="details">
                                    <p>'. $pr->NoiDung .'</p>
                                    <span>'. $pr->ThoiGian .'</span>
                                    </div>
                                </div>';
                }
            
                //<img src="php/images/'.$row['img'].'" alt="">
            }
        }else{
            $output .= '<div class="text">Không có tin nhắn có sẵn. Khi bạn gửi tin nhắn, chúng sẽ xuất hiện ở đây.</div>';
        }
        echo $output;
    }else{
        $myJS = <<<EOT
        <script type='text/javascript'>
            window.location.replace("/Chat/Users");
        </script>
        EOT;
      echo($myJS);
    }
