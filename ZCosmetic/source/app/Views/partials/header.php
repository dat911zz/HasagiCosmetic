<?php
ob_start();
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  $user = $_SESSION['username'];
} else {
  $user = "";
}
?>
<header class="header-area sticky-header">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-5 col-sm-6 col-lg-3">
        <div class="header-logo">
          <a href="/">
            <img class="logo-main img-mainlogo" src="../../assets/images/mainlogone.png" width="95" height="68" alt="Logo" />
          </a>
        </div>
      </div>
      <div class="col-lg-6 d-none d-lg-block">
        <div class="header-navigation">
          <ul class="main-nav justify-content-start">
            <li><a href="/">trang chủ</a>

            </li>

            <li class="has-submenu position-static"><a href="/Home/Products">sản phẩm</a>
              <ul class="submenu-nav-mega">
                <li><a href="#/" class="mega-title">Chăm sóc da</a>
                  <ul>
                    <li><a href="ca_faceCleanser.php">Sửa rửa mặt</a></li>
                    <li><a href="ca_faceMask.php">Mặt nạ</a></li>
                    <li><a href="ca_serum.php">Serum</a></li>
                    <li><a href="ca_sunscreen.php">Kem chống nắng</a></li>
                  </ul>
                </li>
                <li><a href="#/" class="mega-title">Trang điểm</a>
                  <ul>
                    <li><a href="makeup_Face.php">Mặt</a></li>
                    <li><a href="makeup_Eye.php">Mắt</a></li>
                    <li><a href="makeup_Lips.php">Môi</a></li>
                    <li><a href="makeup_Tool.php">Dụng cụ trang điểm</a></li>
                  </ul>
                </li>
                <li><a href="#/" class="mega-title">Nước hoa</a>
                  <ul>
                    <li><a href="perfume_Male.php">Nước hoa nam</a></li>
                    <li><a href="perfume_Female.php">Nước hoa nữ</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="/Home/About">Giới thiệu</a></li>
            <li class="has-submenu"><a href="/Home/Blog">Tạp chí làm đẹp</a></li>
            <li class="has-submenu"><a href="/Pages/AccountLogin">Chăm sóc khách hàng</a>
              <ul class="submenu-nav">
                <li><a href="/Pages/Faq">Câu hỏi thường gặp</a></li>
                <!-- <li><a href="page-not-found.php">Liên hệ</a></li> -->
<<<<<<< HEAD
                                <li><a href="/Pages/Contact">Liên hệ</a></li>
                      

=======
                <li><a href="/Pages/Contact">Liên hệ</a></li>
>>>>>>> 93b114bd349cd6c9eae5e8e2b9a54a06a8f893b3
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-7 col-sm-6 col-lg-3">
        <div class="header-action justify-content-end">
          <button class="header-action-btn ms-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
            <span class="icon">
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect class="icon-rect" width="30" height="30" fill="url(#pattern1)" />
                <defs>
                  <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_504:11" transform="scale(0.0333333)" />
                  </pattern>
                  <image id="image0_504:11" width="30" height="30"
                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABiUlEQVRIie2Wu04CQRSGP0G2EUtIbHwA8B3EQisLIcorEInx8hbEZ9DKy6toDI1oAgalNFpDoYWuxZzJjoTbmSXERP7kZDbZ859vdmb27MJcf0gBUAaugRbQk2gBV3IvmDa0BLwA4Zh4BorTACaAU6fwPXAI5IAliTxwBDScvJp4vWWhH0BlTLEEsC+5Fu6lkgNdV/gKDnxHCw2I9rSiNQNV8baBlMZYJtpTn71KAg9SY3dUYn9xezLPgG8P8BdwLteq5X7CzDbnAbXKS42WxtQVUzoGeFlqdEclxXrnhmhhkqR+8KuMqzHA1vumAddl3IwB3pLxVmOyr1NjwKQmURJ4lBp7GmOAafghpg1qdSDeDrCoNReJWmZB4dsAPsW7rYVa1Rx4FbOEw5TEPKmFvgMZX3DCgYeYNniMaQ5piTXghGhPLdTmZ33hYNpem98f/UHRwSxvhqhXx4anMA3/EmhiOlJPJnSBOb3uQcpOE65VhujPpAms/Bu4u+x3swRbeB24mTV4LgB+AFuLedkPkcmmAAAAAElFTkSuQmCC" />
                </defs>
              </svg>
            </span>
          </button>

          <button class="header-action-btn cart" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#AsideOffcanvasCart" aria-controls="AsideOffcanvasCart">
            <span class="count">123</span>
            <span class="icon material-icons">
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect class="icon-rect" width="30" height="30" fill="url(#pattern2)" />
                <defs>
                  <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_504:9" transform="scale(0.0333333)" />
                  </pattern>
                  <image id="image0_504:9" width="30" height="30"
                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABFUlEQVRIie2VMU7DMBSGvwAqawaYuAmKxCW4A1I5Qg4AA93KBbp1ZUVUlQJSVVbCDVhgzcTQdLEVx7WDQ2xLRfzSvzzb+d6zn2MYrkugBBYevuWsHKiFn2JBMwH8Bq6Aw1jgBwHOYwGlPgT4LDZ4I8BJDNiEppl034UEJ8DMAJ0DByHBACPgUYEugePQUKkUWAmnsaB/Ry/YO9aXCwlT72AdrqaWEohwBWxSwc8ReIVtYIr5bM5pXqO+Men7rozGlkVSv4lJj1WQfsbvXVkNVNk1eEK4ik9/yuwzAPhLh5iuU4jtftMDR4ZJJXChxTJ2H3zXGDgWc43/X2Wro8G81a8u2fXU2nXiLVAxvNIKuPGW/r/2SltF+a3Rkw4pmwAAAABJRU5ErkJggg==" />
                </defs>
              </svg>
            </span>
          </button>

          <a class="header-action-btn" href="/Pages/AccountLogin">
            <span class="icon">
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect class="icon-rect" width="30" height="30" fill="url(#pattern3)" />
                <defs>
                  <pattern id="pattern3" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_504:10" transform="scale(0.0333333)" />
                  </pattern>
                  <image id="image0_504:10" width="30" height="30"
                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEUlEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwmChnZZaKZiQ0ljsLkhQM5/5Agr74DX7DfOfgZ1Hoz+qAl30Marcx2H1thCtY4DJN76parKqmAH9DM+6eTcArX2QE3yVAO7lBA8TwMNIw6UgeJI46My+rWCjUQL0LVIUBd8lgEO1UfBZAvg8oXamCuWNRu64nRNMmUo/wReSXLXayoDoKc9miMvqW/ZNG2VRNLla2MYudrCFTvX2intlnl/gGu/zDraGYzyLZ/UTjrD6G2AHpxgnAKc9xgmWo9BNPM4BnPYDNiLg24zQ2oNpyFdZvRKZLlGhnvvKPzXXti/Yy7hEo3+iD9EHtgdqxQnwAAAAAElFTkSuQmCC" />
                </defs>
              </svg>
            </span>
          </a>
          <ul class="main-nav justify-content-start">
            <li class="has-submenu truncate"><a href="/Pages/AccountLogin">
                <?php echo $user ?>
              </a>
              <?php
              if ($user) {
                ?>
                <ul class="submenu-nav">
                  <li><a href="/Pages/MyAccount">Tài Khoản</a></li>
                  <li><a href="/Pages/Logout">Đăng Xuất</a></li>
                </ul>
                <?php
              }
              ?>
            </li>
          </ul>
          <bold class="header-action-btn userName">
          </bold>
          <button class="header-menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu"
            aria-controls="AsideOffcanvasMenu">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>
<style>
<<<<<<< HEAD
.cart {
	 position: relative;
	 display: block;
	 width: 28px;
	 height: 28px;
	 height: auto;
	 overflow: hidden;
}
 .cart .material-icons {
	 position: relative;
	 z-index: 1;
	 font-size: 24px;
	 color: white;
}
 .cart .count {
	 position: absolute;
	 top: 0;
	 right: 0;
	 z-index: 2;
	 font-size: 10px;
	 border-radius: 50%;
	 background: #d60b28;
	 width: 20px;
	 height: 20px;
	 line-height: 16px;
	 display: block;
	 text-align: center;
	 color: white;
	 font-weight: bold;
   padding-top: 2px;
}
 
</style>
<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'nFBhFRWbtcy68WodN';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->
=======
  .cart {
    position: relative;
    display: block;
    width: 28px;
    height: 28px;
    height: auto;
    overflow: hidden;
  }

  .cart .material-icons {
    position: relative;
    z-index: 1;
    font-size: 24px;
    color: white;
  }

  .cart .count {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    font-size: 10px;
    border-radius: 50%;
    background: #d60b28;
    width: 20px;
    height: 20px;
    line-height: 16px;
    display: block;
    text-align: center;
    color: white;
    font-weight: bold;
    padding-top: 2px;
  }

  .selectUserName {
    border: none !important;
  }

  .truncate {
    width: 100px;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .img-mainlogo {
    height: 170px;
    max-width: 100%;
    width: 150px;
  }
</style>
>>>>>>> 93b114bd349cd6c9eae5e8e2b9a54a06a8f893b3
