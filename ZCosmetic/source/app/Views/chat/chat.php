<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['username'])){
    header("location: account-login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          if($_SESSION['LoaiTK'] == 3){
            $sql = mysqli_query($conn, "SELECT * FROM tbl_nhanvien WHERE Ma = {$user_id}");

          }
          else{
            $sql = mysqli_query($conn, "SELECT * FROM tbl_nguoidung WHERE Ma = {$user_id}");

          }
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <!-- <img src="php/images/<?php // echo $row['img']; ?>" alt=""> -->
         <img src="php/images/1683947506828c84d2d40cb678508acf9ff1fad90a.jpg" alt="">
        <div class="details">
          <span><?php echo $row['HoVaTen']?></span>
          <p><?php echo $row['GioiTinh']; ?></p>
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

  <script src="javascript/chat.js"></script>

</body>
</html>
