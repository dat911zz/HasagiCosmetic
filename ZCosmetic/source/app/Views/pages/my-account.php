<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<?php
// include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
ob_start();
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $id_user = $_SESSION["MaTaiKhoan"];
    $mail = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $role = $_SESSION['role'];
    $db = new DatabaseHelper();
    $orders = $db->executeReader('CALL sp_getOrders(?)', array($id_user));
} else {
    header('location:/Pages/AccountLogin');
    die;
}
?>

<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="page-header-st3-content text-center text-md-start">
                        <ol class="breadcrumb justify-content-center justify-content-md-start">
                            <li class="breadcrumb-item"><a class="text-dark" href="\">Home</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Tài Khoản</li>
                        </ol>
                        <h2 class="page-header-title">Tài Khoản</h2>
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
                <div class="col-lg-3 col-md-12">
                    <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab" data-bs-target="#dashboad" type="button" role="tab" aria-controls="dashboad" aria-selected="false">Dashboard</button>
                        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">Đơn Mua</button>
                        <!-- <button class="nav-link" id="download-tab" data-bs-toggle="tab" data-bs-target="#download" type="button" role="tab" aria-controls="download" aria-selected="false">Download</button> -->
                        <!-- <button class="nav-link" id="payment-method-tab" data-bs-toggle="tab" data-bs-target="#payment-method" type="button" role="tab" aria-controls="payment-method" aria-selected="false">Payment Method</button> -->
                        <!-- <button class="nav-link" id="address-edit-tab" data-bs-toggle="tab" data-bs-target="#address-edit" type="button" role="tab" aria-controls="address-edit" aria-selected="false">address</button> -->
                        <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="true">Thông Tin Tài Khoản</button>
                        <button class="nav-link" onclick="window.location.href='/Pages/Logout'" type="button">Đăng Xuất</button>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                            <div class="myaccount-content">
                                <h3>Dashboard</h3>
                                <div class="welcome">
                                    <p>Chào, <strong>
                                            <?php echo $mail ?></strong>
                                </div>
                                <p>Từ bảng dashboard tài khoản của bạn. bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của bạn.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="myaccount-content">
                                <h3>Đơn Mua</h3>
                                <?php
                                if(1 == 0) {

                                } else {
                                    ?>
                                    <div class="myaccount-table table-responsive text-center">
                                            <div class="table-wrap">
                                                <table class="table">
                                                    <thead class="thead-primary">
                                                        <tr>
                                                            <th>Sản Phẩm</th>
                                                            <th>Tên Sản Phẩm</th>
                                                            <th colspan="3">Thông Tin</th>
                                                            <th>Trạng Thái</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach($orders as $order) {
                                                            ?>
                                                            <tr class="alert" role="alert">
                                                                <td>
                                                                    <a href="../Home/Product?id=<?= $order->Ma ?>" class="shorten-text">
                                                                    <img style="width: 50px; object-fit:contain;" class="img" src="../../assets/Product_Images/<?= $order->MaHinh . '.jpg' ?>"></img>
                                                                    </a>
                                                                </td>
                                                                <td style="text-align: left;">
                                                                    <a href="../Home/Product?id=<?= $order->Ma ?>" class="shorten-text">
                                                                        <?= $order->TenSanPham ?>
                                                                    </a>
                                                                </td>
                                                                <td colspan="3">
                                                                    <div style="display: flex; align-items: center;">
                                                                    <?php 
                                                                        if($order->GiamGia != 0) {
                                                                            echo '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">'.number_format($order->GiaGoc, 0, ',', '.').'</span>';
                                                                        }
                                                                        echo '<span style="color:red">'.number_format($order->GiaDaGiam, 0, ',', '.').'</span>'.'<span style="margin-left:4px; margin-right:4px;">x</span>'.'<span>'.$order->SoLuong.'</span>'
                                                                    ?>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <?= $order->MaNhanVien == "" ? '<span style="color:red">Chờ kiểm duyệt</span>' : '<span style="color:green">Đã duyệt</span>' ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php
                                }
                                ?>
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
                                                <td><a href="#/" class="check-btn sqr-btn"><i class="fa fa-cloud-download"></i> Download File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HasTech - Profolio Business Template</td>
                                                <td>Sep 12, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#/" class="check-btn sqr-btn"><i class="fa fa-cloud-download"></i> Download File</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment-method" role="tabpanel" aria-labelledby="payment-method-tab">
                            <div class="myaccount-content">
                                <h3>Payment Method</h3>
                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address-edit" role="tabpanel" aria-labelledby="address-edit-tab">
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
                        <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                            <div class="myaccount-content">
                                <h3>Account Details</h3>
                                <div class="account-details-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="first-name" class="required">First Name</label>
                                                    <input type="text" id="first-name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="last-name" class="required">Last Name</label>
                                                    <input type="text" id="last-name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-input-item">
                                            <label for="display-name" class="required">Display Name</label>
                                            <input type="text" id="display-name" />
                                        </div>
                                        <div class="single-input-item">
                                            <label for="email" class="required">Email Addres</label>
                                            <input type="email" id="email" />
                                        </div>
                                        <fieldset>
                                            <legend>Password change</legend>
                                            <div class="single-input-item">
                                                <label for="current-pwd" class="required">Current
                                                    Password</label>
                                                <input type="password" id="current-pwd" />
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="new-pwd" class="required">New
                                                            Password</label>
                                                        <input type="password" id="new-pwd" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="confirm-pwd" class="required">Confirm
                                                            Password</label>
                                                        <input type="password" id="confirm-pwd" />
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="single-input-item">
                                            <button class="check-btn sqr-btn">Save Changes</button>
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
<?= $this->endSection() ?>