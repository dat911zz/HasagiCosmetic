<?php 
    session_start();
    if(isset($_SESSION['MaTaiKhoan'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['MaTaiKhoan'];
        $loaiTK = $_SESSION['LoaiTK'] ;

        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
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

 

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){

                if($row['out_msgs_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['NoiDung'] .'</p>
                                        <span>'. $row['ThoiGian'] .'</span>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/1683946297cat_TradingCard.jpg" alt="">
                                    <div class="details">
                                        <p>'. $row['NoiDung'] .'</p>
                                        <span>'. $row['ThoiGian'] .'</span>
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
        header("location: ../login.php");
    }
