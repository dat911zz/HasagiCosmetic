<?php
    session_start();
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    $db = new DatabaseHelper();
    
    $outgoing_id = $_SESSION['MaTaiKhoan'];
    $loaiTK = $_SESSION['role'] ;

    $searchTerm = $_POST['searchTerm'];
    if($loaiTK == 3){
        $sql1 = "SELECT * FROM tbl_nhanvien WHERE NOT Ma = {$outgoing_id} AND HoVaTen LIKE '%{$searchTerm}%'";
    }
    else {
        $sql1 = "SELECT * FROM tbl_nguoidung WHERE NOT Ma = {$outgoing_id} AND HoVaTen LIKE '%{$searchTerm}%'";
    }
    $output = "";
    $query = $db->executeReader($sql1);
   
    if($db->executeCount($sql1) == 0) {
        $output .= "Không có người dùng nào tìm được";
    } elseif($db->executeCount($sql1)> 0) {
        //----------------------------------------------------------------

        // <!-- <img src="php/images/'.$row['img'] .'" alt=""> -->
        foreach ($query as $qr){
            $sql2 = "SELECT * FROM tbl_messenger WHERE (in_msgs_id = {$qr->Ma}
                                OR 	out_msgs_id = {$qr->Ma}) AND (out_msgs_id = {$outgoing_id} 
                                OR in_msgs_id = {$outgoing_id}) ORDER BY ma_msg DESC LIMIT 1";
            $query2 = $db->executeReader($sql2);
            ($db->executeCount($sql2) > 0) ? $result = $query2[0]->NoiDung : $result ="Không có tin nhắn";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($query2[0]->out_msgs_id)) {
                ($outgoing_id == $query2[0]->out_msgs_id) ? $you = "Bạn: " : $you = "";
            } 
            else {
                $you = "";
            }

            ($outgoing_id == $qr->Ma) ? $hid_me = "hide" : $hid_me = "";
  
            $offline = "Online";
            $hoten = $qr->HoVaTen != null ? $qr->HoVaTen : "Nhân Viên  Đang Cập Nhât";
            $output .= '<a href="chat.php?user_id='. $qr->Ma .'">
                                    <div class="content">
                                    <img         
                                    <img src="../assets/images/admin-logo/Logo.png" alt="">

                                    <div class="details">
                                        <span>'.  $hoten .'</span>
                                        <p>'. $you . $msg .'</p>
                                    </div>
                                    </div>
                                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                                </a>';

        }


    }
    echo $output;
?>
<script>
const usersList = document.querySelector(".users-list");

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/Chat/PhpUsers", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 1000);

</script>