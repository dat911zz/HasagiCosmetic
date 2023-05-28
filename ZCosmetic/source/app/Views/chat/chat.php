<?php
session_start();
if(!isset($_SESSION['MaTaiKhoan']) || !isset($_SESSION['role'])) {
    $myJS = <<<EOT
      <script type='text/javascript'>
          window.location.replace("/Pages/AccountLogin");
      </script>
      EOT;
    echo($myJS);
} else {
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    $db = new DatabaseHelper();

    //$user_id = $_GET['user_id'];
    $user_id = array($ID_User)[0];
    if($_SESSION['role'] == 3) {
        $sql ="SELECT * FROM tbl_nhanvien WHERE Ma = {$user_id}";

    } else {
        $sql ="SELECT * FROM tbl_nguoidung WHERE Ma = {$user_id}";
    }
    if($db->executeCount($sql) > 0) {
        $row = $db->executeReader($sql)[0];
    } else {
        $myJS = <<<EOT
          <script type='text/javascript'>
              window.location.replace("/Chat/Users");
          </script>
          EOT;
        echo($myJS);
    }
}
?>
<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>


  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php

?>
        <a href="/Chat/Users" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <!-- <img src="php/images/<?php // echo $row['img'];?>" alt=""> -->
        <img src="../assets/images/admin-logo/Logo.png" alt="">
        <div class="details">
          <span><?php echo $row->HoVaTen?></span>
          <p><?php echo $row->GioiTinh; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script>
    const form = document.querySelector(".typing-area");
    const incoming_id = form.querySelector(".incoming_id").value;
    const inputField = form.querySelector(".input-field");
    const sendBtn = form.querySelector("button");
    const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/Chat/PhpInsertChat", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/Chat/PhpGetChat", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
  </script>

  <?= $this->endSection() ?>
