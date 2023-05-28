
<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<?php
ob_start();
session_start();

$db = (new DatabaseHelper());
$mail = $_SESSION['username'];
$pass = $_SESSION['password'];
$role = $_SESSION['role'];
$MaTaiKhoan = $_SESSION['MaTaiKhoan'];

$uname = "";
$id_user = 2;
$user = $db->executeReader('SELECT * FROM tbl_NguoiDung WHERE Ma = ?', array($id_user))[0];
$arrAdress = explode(', ', $user->DiaChi);
$len = count($arrAdress);
$city = $arrAdress[$len - 1];
$district = $arrAdress[$len - 2];
$ward = $arrAdress[$len - 3];
$detailsAddress = '';
if (isset($arrAdress[$len - 4])) {
    $detailsAddress = $arrAdress[$len - 4];
}



if (isset($_POST["btnSubmit"])) {
    $detailsAddress = '';
    $birtday = '2002-10-10';
    $sex = null;
    $name = $_POST('f_name');
    $adress = $_COOKIE['address'];
    $phone = $_POST('phone');
    $CMND = $_POST('CMND');
    $param = array($name, $birtday, $sex, $adress, $phone, $CMND, $mail);
    $kq = $db->executeNonQuery('UPDATE tbl_nguoidung SET `HoVaTen` = ?, `NgaySinh` = ? `GioiTinh` = ?,`DiaChi` = ?,`SDT` =? ,`CMND = ?`) WHERE Ma = ?', $param);
}
?>

<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">
        <header id="header">

        </header>
        <!--== End Header Wrapper ==-->

        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">My Account</li>
                                </ol>
                                <h2 class="page-header-title">My Account</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start My Account Area Wrapper ==-->
            <section class="my-account-area section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab"
                                    data-bs-target="#dashboad" type="button" role="tab" aria-controls="dashboad"
                                    aria-selected="false">Tài Khoản Của Tôi</button>
                                <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders"
                                    type="button" role="tab" aria-controls="orders" aria-selected="false">
                                    Danh sách đơn hàng</button>
                                <button class="nav-link" id="download-tab" data-bs-toggle="tab"
                                    data-bs-target="#download" type="button" role="tab" aria-controls="download"
                                    aria-selected="false">Download</button>
                                <button class="nav-link" id="payment-method-tab" data-bs-toggle="tab"
                                    data-bs-target="#payment-method" type="button" role="tab"
                                    aria-controls="payment-method" aria-selected="false">Phương thức thanh toán</button>
                                <button class="nav-link" id="address-edit-tab" data-bs-toggle="tab"
                                    data-bs-target="#address-edit" type="button" role="tab" aria-controls="address-edit"
                                    aria-selected="false">Địa chỉ</button>
                                <button class="nav-link" id="account-info-tab" data-bs-toggle="tab"
                                    data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info"
                                    aria-selected="true">Chi tiết tài khoản</button>
                                <button class="nav-link" onclick="window.location.href='/Pages/Logout'"
                                    type="button">Đăng xuất</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel"
                                    aria-labelledby="dashboad-tab">
                                    <div class="myaccount-content">
                                        <h3>Tài Khoản Của Tôi</h3>
                                        <div class="welcome">
                                            <p>Xin chào, <strong>
                                                    <?php echo $mail ?>
                                                </strong> (Bạn có thể đăng xuất <strong></strong><a href="/Pages/Logout"
                                                    class="logout"> Tại đây</a>)</p>
                                        </div>
                                        <p>Tại trang quản lý tài khoản bạn có thể dễ dàng kiểm tra và xem các đơn đặt
                                            hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán cũng như
                                            chỉnh sửa mật khẩu và chi tiết tài khoản của bạn..</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Pending</td>
                                                        <td>$3000</td>
                                                        <td><a href="shop-cart.php" class="check-btn sqr-btn ">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>July 22, 2018</td>
                                                        <td>Approved</td>
                                                        <td>$200</td>
                                                        <td><a href="shop-cart.php" class="check-btn sqr-btn ">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>June 12, 2017</td>
                                                        <td>On Hold</td>
                                                        <td>$990</td>
                                                        <td><a href="shop-cart.php" class="check-btn sqr-btn ">View</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
                                    <div class="myaccount-content">
                                        <h3>Downloads</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Date</th>
                                                        <th>Expire</th>
                                                        <th>Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Yes</td>
                                                        <td><a href="#/" class="check-btn sqr-btn"><i
                                                                    class="fa fa-cloud-download"></i> Download File</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>HasTech - Profolio Business Template</td>
                                                        <td>Sep 12, 2018</td>
                                                        <td>Never</td>
                                                        <td><a href="#/" class="check-btn sqr-btn"><i
                                                                    class="fa fa-cloud-download"></i> Download File</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="payment-method" role="tabpanel"
                                    aria-labelledby="payment-method-tab">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address-edit" role="tabpanel"
                                    aria-labelledby="address-edit-tab">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                        <a href="#/" class="check-btn sqr-btn"><i class="fa fa-edit"></i> Edit
                                            Address</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-info" role="tabpanel"
                                    aria-labelledby="account-info-tab">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                        <form method="post">
                                        <div class="row">
                                            <div class="form-group mb-6">
                                                <label for="register_username">Username or Email Address
                                                    <sup>*</sup></label>
                                                <input type="text" value="<?php $mail ?>" name="txtUser" id="register_username">
                                            </div>
                                            <div class="form-group mb-6">
                                                <label for="register_pwsd">Password <sup>*</sup></label>
                                                <input type="password" name="txtPassword" id="register_pwsd">
                                            </div>
                                            <div class="form-group mb-6">
                                                <label for="register_confpwsd">Confirm Password <sup>*</sup></label>
                                                <input type="password" name="txtConfirmPassword" id="register_confpwsd">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="f_name">Họ tên <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="f_name" name="f_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="dob">Ngày sinh <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="dob" name="dob" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div>
                                                    <label for="sex">Giới tính <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="sexMale" name="sex" type="checkbox" value="Male">Male
                                                    <input id="sexFemale" name="sex" type="checkbox"
                                                        value="Female">Female
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="city">Tỉnh / Thành Phố <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <select id="city" class="form-control wide">
                                                        <option value="null" selected>Chọn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="district">Quận / Huyện <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <select id="district" class="form-control wide">
                                                        <option value="null" selected>Chọn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="ward">Phường / Xã <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <select id="ward" class="form-control wide">
                                                        <option value="null" selected>Chọn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="street-address">Địa chỉ</label>
                                                    <input id="street-address" type="text" class="form-control"
                                                        placeholder="Số nhà, ...">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">SĐT <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="phone" name="phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Chứng Minh Nhân Dân <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="identity" name="identity" type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a type="submit" class="btnSubmit" name="btnSubmit"
                                                    id="btnSubmit">Lưu thay đổi</a>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End My Account Area Wrapper ==-->

        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer id="footer">

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
                                    <img src="../../assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466"
                                        height="320">
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
                                    <img src="../../assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466"
                                        height="320">
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
        <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch"
            aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="fa fa-close"></i></button>
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
                                <input id="SearchInput" type="search" class="form-control"
                                    placeholder="Tìm kiếm toàn bộ cửa hàng…">
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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!--== Start Product Thumbnail Area ==-->
                                        <div class="product-single-thumb">
                                            <img src="../../assets/images/shop/quick-view1.webp" width="544"
                                                height="560" alt="Image-HasTech">
                                        </div>
                                        <!--== End Product Thumbnail Area ==-->
                                    </div>
                                    <div class="col-lg-6">
                                        <!--== Start Product Info Area ==-->
                                        <div class="product-details-content">
                                            <h5 class="product-details-collection">Premioum collection</h5>
                                            <h3 class="product-details-title">Offbline Instant Age Rewind Eraser.</h3>
                                            <div class="product-details-review mb-5">
                                                <div class="product-review-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <button type="button" class="product-review-show">150 reviews</button>
                                            </div>
                                            <p class="mb-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                Delectus, repellendus. Nam voluptate illo ut quia non sapiente provident
                                                alias quos laborum incidunt, earum accusamus, natus. Vero pariatur ut
                                                veniam
                                                sequi amet consectetur.</p>
                                            <div class="product-details-pro-qty">
                                                <div class="pro-qty">
                                                    <input type="text" title="Quantity" value="01">
                                                </div>
                                            </div>
                                            <div class="product-details-action">
                                                <h4 class="price">$254.22</h4>
                                                <div class="product-details-cart-wishlist">
                                                    <button type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#action-CartAddModal">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Product Info Area ==-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick View Modal ==-->

        <!--== Start Aside Cart ==-->
        <aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
                <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i
                        class="fa fa-chevron-right"></i></button>
            </div>
            <div class="offcanvas-body">
                <ul class="aside-cart-product-list">
                    <li class="aside-product-list-item">
                        <a href="#/" class="remove">×</a>
                        <a href="product-details.php">
                            <img src="../../assets/images/shop/cart1.webp" width="68" height="84" alt="Image">
                            <span class="product-title">Leather Mens Slipper</span>
                        </a>
                        <span class="product-price">1 × £69.99</span>
                    </li>
                    <li class="aside-product-list-item">
                        <a href="#/" class="remove">×</a>
                        <a href="product-details.php">
                            <img src="../../assets/images/shop/cart2.webp" width="68" height="84" alt="Image">
                            <span class="product-title">Quickiin Mens shoes</span>
                        </a>
                        <span class="product-price">1 × £20.00</span>
                    </li>
                </ul>
                <p class="cart-total"><span>Subtotal:</span><span class="amount">£89.99</span></p>
                <a class="btn-total" href="product-cart.php">View cart</a>
                <a class="btn-total" href="product-checkout.php">Checkout</a>
            </div>
        </aside>
        <!--== End Aside Cart ==-->

        <!--== Start Aside Menu ==-->
        <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
                <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i
                        class="fa fa-chevron-left"></i></button>
            </div>
            <div class="offcanvas-body">
                <div id="offcanvasNav" class="offcanvas-menu-nav">
                    <ul>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">home</a>
                            <ul>
                                <li><a href="index.php">Home One</a></li>
                                <li><a href="index-two.php">Home Two</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="about-us.php">about</a>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">shop</a>
                            <ul>
                                <li><a href="#" class="offcanvas-nav-item">Shop Layout</a>
                                    <ul>
                                        <li><a href="product.php">Shop 3 Column</a></li>
                                        <li><a href="product-four-columns.php">Shop 4 Column</a></li>
                                        <li><a href="product-left-sidebar.php">Shop Left Sidebar</a></li>
                                        <li><a href="product-right-sidebar.php">Shop Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="offcanvas-nav-item">Single Product</a>
                                    <ul>
                                        <li><a href="product-details-normal.php">Single Product Normal</a></li>
                                        <li><a href="product-details.php">Single Product Variable</a></li>
                                        <li><a href="product-details-group.php">Single Product Group</a></li>
                                        <li><a href="product-details-affiliate.php">Single Product Affiliate</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="offcanvas-nav-item">Others Pages</a>
                                    <ul>
                                        <li><a href="product-cart.php">Shopping Cart</a></li>
                                        <li><a href="product-checkout.php">Checkout</a></li>
                                        <li><a href="product-wishlist.php">Wishlist</a></li>
                                        <li><a href="product-compare.php">Compare</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Blog</a>
                            <ul>
                                <li><a class="offcanvas-nav-item" href="#">Blog Layout</a>
                                    <ul>
                                        <li><a href="blog.php">Blog Grid</a></li>
                                        <li><a href="blog-left-sidebar.php">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.php">Blog Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog-details.php">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Pages</a>
                            <ul>
                                <li><a href="account-login.php">My Account</a></li>
                                <li><a href="faq.php">Frequently Questions</a></li>
                                <li><a href="page-not-found.php">Page Not Found</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!--== End Aside Menu ==-->

    </div>
    <!--== Wrapper End ==-->

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="../../assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="../../assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="../../assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="../../assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="../../assets/js/plugins/fancybox.min.js"></script>
    <script src="../../assets/js/plugins/jquery.nice-select.min.js"></script>

    <!-- Custom Main JS -->
    <script src="../../assets/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.nice-select').remove();
            $('select').show();
            $.ajax({
                type: 'GET',
                url: 'https://provinces.open-api.vn/api/',
                dataType: 'json',
                success: function (data) {
                    $default = '<option value="null" selected>Chọn</option>';
                    $resultCity = $default;
                    $(data).each(function (index) {
                        $resultCity += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                    });
                    $('#city').html($resultCity);

                    $('#city option').each(function () {
                        if ($(this).text().toLowerCase() == '<?= $city ?>'.toLowerCase()) {
                            updateCity($(this).val());
                        }
                    });


                    $('#street-address').val('<?= $detailsAddress ?>');
                }
            });

            $('#city').on('change', function () {
                updateCity($('#city').val());
            });
            $('#district').on('change', function () {
                updateDistrict($(this).val());
            });
            $('#ward').on('change', function () {
                updateWard($(this).val());
                console.log($('#ward > option[Selected]').text() + ', ' + $('#district > option[Selected]').text() + ', ' + $('#city > option[Selected]').text());
            });
        });

        function updateCity($value) {
            $('#city > option[Selected]').attr('Selected', false);
            $('#city > option[value=' + $value + ']').attr('Selected', true);
            changeDistrict($value);
        }

        function updateDistrict($value) {
            $('#district > option[Selected]').attr('Selected', false);
            $('#district > option[value=' + $value + ']').attr('Selected', true);
            changeWard($value);
        }

        function updateWard($value) {
            $('#ward > option[Selected]').attr('Selected', false);
            $('#ward > option[value=' + $value + ']').attr('Selected', true);
        }

        function changeDistrict($idCity) {
            $.ajax({
                type: 'GET',
                url: 'https://provinces.open-api.vn/api/d/',
                dataType: 'json',
                success: function (data) {
                    $default = '<option value="null" selected>Chọn</option>';
                    $resultDistrict = $default;
                    $(data).each(function (index) {
                        if (data[index].province_code == $idCity) {
                            $resultDistrict += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                        }
                    });
                    $('#district').html($resultDistrict);
                    $('#district option').each(function () {
                        if ($(this).text().toLowerCase() == '<?= $district ?>'.toLowerCase()) {
                            updateDistrict($(this).val());
                        }
                    });
                }
            });
        }

        function changeWard($idDistrict) {
            $.ajax({
                type: 'GET',
                url: 'https://provinces.open-api.vn/api/w/',
                dataType: 'json',
                success: function (data) {
                    $default = '<option value="null" selected>Chọn</option>';
                    $resultWard = $default;
                    $(data).each(function (index) {
                        if (data[index].district_code == $idDistrict) {
                            $resultWard += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                        }
                    });
                    $('#ward').html($resultWard);
                    $('#ward option').each(function () {
                        if ($(this).text().toLowerCase() == '<?= $ward ?>'.toLowerCase()) {
                            updateWard($(this).val());
                        }
                    });
                }
            });
        }

        function AlertError($text) {
            Swal.fire({
                icon: 'error',
                title: $text,
                showConfirmButton: false,
                timer: 1000
            });
            //$('swal-select').remove();
        }
    </script>
    <script>
        $('#btnSubmit').on('click', function () {
            const checkboxes = document.getElementsByName("sex");
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    $sex = checkboxes[i].value;
                }
            }
            $ten_dang_nhap = $('#register_username').val();
            $mat_khau = $('#register_pwsd').val();
            $conf_password = $('#register_confpwsd').val();
            $name = $('#f_name').val();
            $dob = $('#dob').val();
            $phone = $('#phone').val();
            $cmnd = $('#identity').val();
            $city_new = $('#city option[Selected]').text();
            $district_new = $('#district  option[Selected]').text();
            $ward_new = $('#ward  option[Selected]').text();
            $detailsAddress_new = $('#street-address').val();
            if ($name.length <= 0) {
                AlertError('Tên người nhận đang trống');
            } else if ($('#city').val() == null) {
                AlertError('Vui lòng chọn tỉnh / Thành phố');
            } else if ($('#district').val() == null) {
                AlertError('Vui lòng chọn Quận / Huyện');
            } else if ($('#ward').val() == null) {
                AlertError('Vui lòng chọn Phường / Xã');
            }  else if ($('#register_pwsd').val() !== $('#register_confpwsd').val()) {
                AlertError('Vui lòng nhập đúng mật khẩu');
            }  else {
                if ($detailsAddress_new.length > 0) {
                    $address = $detailsAddress_new + ', ';
                } else {
                    $address = '';
                }
                $address += $ward_new + ', ' + $district_new + ', ' + $city_new;
                updateAccount($ten_dang_nhap, $mat_khau, $name, $dob, $sex, $address, $phone, $cmnd);
            }
        });
    </script>

    <?= $this->endSection() ?>