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
    if($_SESSION['role'] == 3) {
        $sql ="SELECT * FROM tbl_nguoidung WHERE Ma = ".$_SESSION['MaTaiKhoan'];
    } else {
        $sql ="SELECT * FROM tbl_nhanvien WHERE Ma = ".$_SESSION['MaTaiKhoan'];
    }

    if($_SESSION['role'] != 3) {
      ?> <?= $this->extend('layouts/admin_layout') ?><?php
        $name = "Nhân Viên";
    } else {
      ?> <?= $this->extend('layouts/main') ?><?php
        $name = "Khách Hàng ";
    }
    $row = $db->executeReader($sql);
    if($db->executeCount($sql)) {
        $taikhoan = $row[0];
    }
}
?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>


  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
              <!-- <img src="php/images/<?php // echo $row['img'];?>" alt=""> -->
          <div class="details">
            <span><?php
              echo $_SESSION['username'];?></span>
            <p><?php echo $name;?></p>
          </div>
        </div>
        <a href="/Pages/Logout" class="logout">Đăng xuất</a>
      </header>
      <div class="search">
        <span class="text">Bắt đầu trò chuyện</span>
        <input type="text" placeholder="Nhập tên để tìm kiếm...">
        <button ><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      </div>
    </section>
  </div>


<!--  -->
<script>
const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");


searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeypress = (event) => {
  if (event.key === "Enter") {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
      searchBar.classList.add("active");
    } else {
      searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/Chat/PhpSearch", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          usersList.innerHTML = data;
        }
      }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
  }
}


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
<?= $this->endSection() ?>