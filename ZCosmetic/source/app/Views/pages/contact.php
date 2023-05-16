<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>


<?php 
    class Email{
        public $email;
        public $hoTen;
        public $message;
        public $subject;
        public function __construct(){

        }
        
    }
?>


<!--== Wrapper Start ==-->
<div class="wrapper">

    <main class="main-content">

<<<<<<< HEAD
        <!--== Start Contact Area Wrapper ==-->
        <section class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-6 col-lg-6">
                        <div class="section-title position-relative">
                            <h2 class="title">Liên hệ </h2>
                            <p class="m-0">Gửi cho chúng tôi câu hỏi của bạn, chúng tôi sẽ trả lời sớm nhất có thể!</p>
                            <div class="line-left-style mt-4 mb-1"></div>
                        </div>
                        <!--== Start Contact Form ==-->
                        <div class="contact-form">
                            <form id="contact-form" action="mail.dat911zz.x10.mx" method="POST">

=======
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("#header").load("header.php");
            $("#footer").load("footer.php");
        })
    </script>

</head>

<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">
        <header id="header">

        </header>
        <!--== End Header Wrapper ==-->

        <main class="main-content">

            <!--== Start Contact Area Wrapper ==-->
            <section class="contact-area">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-6 col-lg-6">
                            <div class="section-title position-relative">
                                <h2 class="title">Liên hệ </h2>
                                <p class="m-0">Gửi cho chúng tôi câu hỏi của bạn, chúng tôi sẽ trả lời sớm nhất có thể!</p>
                                <div class="line-left-style mt-4 mb-1"></div>
                            </div>
                            <!--== Start Contact Form ==-->
                            <div class="contact-form">
                                <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="con_name" placeholder="Họ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Tên">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="con_email" placeholder="Địa chỉ email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="con_message" placeholder="Tin nhắn"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-0">
                                                <button class="btn btn-sm" type="submit">GỬI LIÊN HỆ</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--== End Contact Form ==-->

                            <!--== Message Notification ==-->
                            <div class="form-message"></div>
                        </div>
                    </div>
                </div>
                <img class="contact-left-img" src="../../assets/images/contact.webp"></img>
            </section>
            <!--== End Contact Area Wrapper ==-->

            <!--== Start Contact Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <img class="icon" src="../../assets/images/14.webp" width="30" height="30" alt="Icon">
                            <a href="tel://+11020303023">+84 795693948</a>
                        </div>
                        <div class="contact-info-item">
                            <img class="icon" src="../../assets/images/24.webp" width="30" height="30" alt="Icon">
                            <a href="mailto://example@demo.com">example@demo.com</a>
                            <a href="mailto://demo@example.com">demo@example.com</a>
                        </div>
                        <div class="contact-info-item mb-0">
                            <img class="icon" src="../../assets/images/34.webp" width="30" height="30" alt="Icon">
                            <p>140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Thành Phố Hồ Chí Minh</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Contact Area Wrapper ==-->

            <div class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
            </div>

        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">
            <!--== Start Footer Main ==-->
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="widget-item">
                                <div class="widget-about">
                                    <a class="widget-logo" href="index.php">
                                        <img src="../../assets/images/mainlogone.png" width="95" height="68" alt="Logo">
                                    </a>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 mt-md-0 mt-9">
                            <div class="widget-item">
                                <h4 class="widget-title">Information</h4>
                                <ul class="widget-nav">
                                    <li><a href="blog.php">Blog</a></li>
                                    <li><a href="about-us.php">About us</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="faq.php">Privacy</a></li>
                                    <li><a href="account-login.php">Login</a></li>
                                    <li><a href="product.php">Shop</a></li>
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="faq.php">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-lg-0 mt-6">
                            <div class="widget-item">
                                <h4 class="widget-title">Social Info</h4>
                                <div class="widget-social">
                                    <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Main ==-->

            <!--== Start Footer Bottom ==-->
             
            <!--== End Footer Bottom ==-->
        </footer>
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

        <!--== Start Product Quick Wishlist Modal ==-->
        <aside class="product-action-modal modal fade" id="action-WishlistModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-action-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="modal-action-messages">
                                <i class="fa fa-check-square-o"></i> Added to wishlist successfully!
                            </div>
                            <div class="modal-action-product">
                                <div class="thumb">
                                    <img src="assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
                                </div>
                                <h4 class="product-name"><a href="product-details.php">Readable content DX22</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick Wishlist Modal ==-->

        <!--== Start Product Quick Add Cart Modal ==-->
        <aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-action-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="modal-action-messages">
                                <i class="fa fa-check-square-o"></i> Added to cart successfully!
                            </div>
                            <div class="modal-action-product">
                                <div class="thumb">
                                    <img src="assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
                                </div>
                                <h4 class="product-name"><a href="product-details.php">Readable content DX22</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick Add Cart Modal ==-->

        <!--== Start Aside Search Form ==-->
        <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="offcanvas-body">
                <div class="container pt--0 pb--0">
                    <div class="search-box-form-wrap">
                        <div class="search-note">
                            <p>Bắt đầu nhập và nhấn Enter để tìm kiếm</p>
                        </div>
                        <form action="#" method="post">
                            <div class="aside-search-form position-relative">
                                <label for="SearchInput" class="visually-hidden">Search</label>
                                <input id="SearchInput" type="search" class="form-control" placeholder="Tìm kiếm toàn bộ cửa hàng…">
                                <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Aside Search Form ==-->

        <!--== Start Product Quick View Modal ==-->
        <aside class="product-cart-view-modal modal fade" id="action-QuickViewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-quick-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <span class="fa fa-close"></span>
                            </button>
                            <div class="container">
>>>>>>> 93b114bd349cd6c9eae5e8e2b9a54a06a8f893b3
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="con_name" placeholder="Họ và tên">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="con_phone" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="con_email" placeholder="Địa chỉ email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="con_message" placeholder="Tin nhắn"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-sm" type="submit">GỬI</button>
                                    </div>
                                </div>
                                </br>
                              
                            </form>
                            <div class="contact-left-img" data-bg-img="../assets/images/photos/contact.webp"></div>

                        </div>

                    </div>
                    <!--== End Contact Form ==-->

                    <!--== Message Notification ==-->
                    <div class="form-message"> 
                        <p>d</p>
                     </div>
                </div>

            </div>

        </section>
        <!--== End Contact Area Wrapper ==-->

        <!--== Start Contact Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <img class="icon" src="../assets/images/icons/1.webp" width="30" height="30" alt="Icon">
                        <a href="tel://+11020303023">+11 0203 03023</a>
                        <a href="tel://+11020303023">+11 0203 03023</a>
                    </div>
                    <div class="contact-info-item">
                        <img class="icon" src="../assets/images/icons/2.webp" width="30" height="30" alt="Icon">
                        <a href="mailto://example@demo.com">example@demo.com</a>
                        <a href="mailto://demo@example.com">demo@example.com</a>
                    </div>
                    <div class="contact-info-item mb-0">
                        <img class="icon" src="../assets/images/icons/3.webp" width="30" height="30" alt="Icon">
                        <p>Sunset Beach, North Carolina(NC), 28468</p>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Contact Area Wrapper ==-->

        <div class="map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
        </div>

    </main>


</div>


<?= $this->endSection() ?>