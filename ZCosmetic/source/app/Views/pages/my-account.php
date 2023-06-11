<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<?php
ob_start();
session_start();
$orders_all = "";
$orders_DaDuyet = "";
$orders_ChoKiemDuyet = "";
$orders_HuyDon = "";
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $id_user = $_SESSION["MaTaiKhoan"];
    $mail = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $role = $_SESSION['role'];
    $db = new DatabaseHelper();
    $orders = $db->executeReader('CALL sp_getOrders(?)', array($id_user));

    foreach ($orders as $order) {
        $orders_all .= '<tr class="alert" role="alert"><td><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text"><img style="width: 50px; object-fit:contain;" class="img" src="../../assets/Product_Images/' . $order->MaHinh . '.jpg"></img></a></td><td style="text-align: left;"><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text">' . $order->TenSanPham . '</a></td><td colspan="3"><div style="display: flex; align-items: center;">' . (($order->GiamGia != 0) ? '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">' . number_format($order->GiaGoc, 0, ',', '.') . '</span>' : "") . '<span style="color:red">' . number_format($order->GiaDaGiam, 0, ',', '.') . '</span>' . '<span style="margin-left:4px; margin-right:4px;">x</span>' . '<span>' . $order->SoLuong . '</span></div></td><td><span style="color:' . ($order->KiemDuyet == "Chờ kiểm duyệt" ? 'red' : ($order->KiemDuyet == "Đã duyệt" ? 'green' : 'orange')) . '">' . $order->KiemDuyet . '</span></td></tr>';
        if ($order->KiemDuyet == "Đã duyệt") {
            $orders_DaDuyet .= '<tr class="alert" role="alert"><td><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text"><img style="width: 50px; object-fit:contain;" class="img" src="../../assets/Product_Images/' . $order->MaHinh . '.jpg"></img></a></td><td style="text-align: left;"><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text">' . $order->TenSanPham . '</a></td><td colspan="3"><div style="display: flex; align-items: center;">' . (($order->GiamGia != 0) ? '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">' . number_format($order->GiaGoc, 0, ',', '.') . '</span>' : "") . '<span style="color:red">' . number_format($order->GiaDaGiam, 0, ',', '.') . '</span>' . '<span style="margin-left:4px; margin-right:4px;">x</span>' . '<span>' . $order->SoLuong . '</span></div></td><td><span style="color:' . ($order->KiemDuyet == "Chờ kiểm duyệt" ? 'red' : ($order->KiemDuyet == "Đã duyệt" ? 'green' : 'orange')) . '">' . $order->KiemDuyet . '</span></td></tr>';
        } else if ($order->KiemDuyet == "Chờ kiểm duyệt") {
            $orders_ChoKiemDuyet .= '<tr class="alert" role="alert"><td><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text"><img style="width: 50px; object-fit:contain;" class="img" src="../../assets/Product_Images/' . $order->MaHinh . '.jpg"></img></a></td><td style="text-align: left;"><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text">' . $order->TenSanPham . '</a></td><td colspan="3"><div style="display: flex; align-items: center;">' . (($order->GiamGia != 0) ? '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">' . number_format($order->GiaGoc, 0, ',', '.') . '</span>' : "") . '<span style="color:red">' . number_format($order->GiaDaGiam, 0, ',', '.') . '</span>' . '<span style="margin-left:4px; margin-right:4px;">x</span>' . '<span>' . $order->SoLuong . '</span></div></td><td><span style="color:' . ($order->KiemDuyet == "Chờ kiểm duyệt" ? 'red' : ($order->KiemDuyet == "Đã duyệt" ? 'green' : 'orange')) . '">' . $order->KiemDuyet . '</span></td></tr>';
            '<tr class="alert" role="alert"><td><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text"><img style="width: 50px; object-fit:contain;" class="img" src="../../assets/Product_Images/' . $order->MaHinh . '.jpg"></img></a></td><td style="text-align: left;"><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text">' . $order->TenSanPham . '</a></td><td colspan="3"><div style="display: flex; align-items: center;">' . (($order->GiamGia != 0) ? '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">' . number_format($order->GiaGoc, 0, ',', '.') . '</span>' : '<span style="color:red">' . number_format($order->GiaDaGiam, 0, ',', '.') . '</span>') . '<span style="margin-left:4px; margin-right:4px;">x</span>' . '<span>' . $order->SoLuong . '</span></div></td><td><span style="color:' . ($order->KiemDuyet == "Chờ kiểm duyệt" ? 'red' : ($order->KiemDuyet == "Đã duyệt" ? 'green' : 'orange')) . '">' . $order->KiemDuyet . '</span></td></tr>';
        } else {
            $orders_HuyDon .= '<tr class="alert" role="alert"><td><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text"><img style="width: 50px; object-fit:contain;" class="img" src="../../assets/Product_Images/' . $order->MaHinh . '.jpg"></img></a></td><td style="text-align: left;"><a href="../Home/Product?id=' . $order->Ma . '" class="shorten-text">' . $order->TenSanPham . '</a></td><td colspan="3"><div style="display: flex; align-items: center;">' . (($order->GiamGia != 0) ? '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">' . number_format($order->GiaGoc, 0, ',', '.') . '</span>' : "") . '<span style="color:red">' . number_format($order->GiaDaGiam, 0, ',', '.') . '</span>' . '<span style="margin-left:4px; margin-right:4px;">x</span>' . '<span>' . $order->SoLuong . '</span></div></td><td><span style="color:' . ($order->KiemDuyet == "Chờ kiểm duyệt" ? 'red' : ($order->KiemDuyet == "Đã duyệt" ? 'green' : 'orange')) . '">' . $order->KiemDuyet . '</span></td></tr>';
        }
    }
} else {
    header('location:/Pages/AccountLogin');
    die;
}

$tr_null = '<tr><td colspan="6" style="text-align: center;">Không có đơn nào ở trạng thái này</td></tr>';
if ($orders_all == "") {
    $orders_all = $tr_null;
}
if ($orders_DaDuyet == "") {
    $orders_DaDuyet = $tr_null;
}
if ($orders_ChoKiemDuyet == "") {
    $orders_ChoKiemDuyet = $tr_null;
}
if ($orders_HuyDon == "") {
    $orders_HuyDon = $tr_null;
}

$MaTaiKhoan = $_SESSION['MaTaiKhoan'];

$uname = "";
// $id_user = 2;
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
?>



<body>
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
                    <div class="col-lg-3 col-md-4">
                        <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab" data-bs-target="#dashboad" type="button" role="tab" aria-controls="dashboad" aria-selected="false">Tài Khoản Của Tôi</button>
                            <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                                Đơn Mua</button>
                            <!-- <button class="nav-link" id="payment-method-tab" data-bs-toggle="tab"
                        data-bs-target="#payment-method" type="button" role="tab"
                        aria-controls="payment-method" aria-selected="false">Phương thức thanh toán</button> -->
                            <button class="nav-link" id="address-edit-tab" data-bs-toggle="tab" data-bs-target="#address-edit" type="button" role="tab" aria-controls="address-edit" aria-selected="false">Thay đổi mật khẩu</button>
                            <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="true">Chi tiết tài khoản</button>
                            <button class="nav-link" onclick="window.location.href='/Pages/Logout'" type="button">Đăng xuất</button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                                <div class="myaccount-content">
                                    <h3>Tài Khoản Của Tôi</h3>
                                    <div class="welcome">
                                        <p>Xin chào, <strong>
                                                <?php echo $mail ?>
                                            </strong> (Bạn có thể đăng xuất <strong></strong><a href="/Pages/Logout" class="logout"> Tại đây</a>)</p>
                                    </div>
                                    <p>Tại trang quản lý tài khoản bạn có thể dễ dàng kiểm tra và xem các đơn đặt
                                        hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán cũng như
                                        chỉnh sửa mật khẩu và chi tiết tài khoản của bạn..</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="myaccount-content">
                                    <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px dashed #ccc; padding-bottom: 10px; margin-bottom: 25px;">
                                        <span style="font-weight: 500; font-size: 20px;">Đơn Mua</span>
                                        <select id="status-order-select" style="border-radius: 10px; padding: 4px 20px;">
                                            <option value="null">Tất cả</option>
                                            <option value="1">Đã duyệt</option>
                                            <option value="0">Chờ kiểm duyệt</option>
                                            <option value="-1">Hủy đơn</option>
                                        </select>
                                    </div>
                                    <?php if (1 == 0) { ?>

                                    <?php } else { ?>
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
                                                    <tbody id="order-body">
                                                        <?php
                                                        foreach ($orders as $order) {
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
                                                                        if ($order->GiamGia != 0) {
                                                                            echo '<span style="text-decoration: line-through; font-size: 10px; margin-right:4px;">' . number_format($order->GiaGoc, 0, ',', '.') . '</span>';
                                                                        }
                                                                        echo '<span style="color:red">' . number_format($order->GiaDaGiam, 0, ',', '.') . '</span>' . '<span style="margin-left:4px; margin-right:4px;">x</span>' . '<span>' . $order->SoLuong . '</span>'
                                                                        ?>
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <span style="color:<?= $order->KiemDuyet == "Chờ kiểm duyệt" ? 'red' : ($order->KiemDuyet == "Đã duyệt" ? 'green' : 'orange') ?>">
                                                                        <?= $order->KiemDuyet ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>
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
                                    <h3>Cập nhật mật khẩu</h3>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="f_name_password">Họ tên <abbr class="required" title="required">*</abbr></label>
                                                    <input id="f_name_password" value="<?php echo $user->HoVaTen ?>" name="f_name_password" type="text" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="f_passwordold">Mật khẩu hiện tại<abbr class="required" title="required">*</abbr></label>
                                                    <input id="f_passwordold" name="f_passwordold" type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="f_password">Mật khẩu mới<abbr class="required" title="required">*</abbr></label>
                                                    <input id="f_password" name="f_password" type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="f_confpassword">Nhập lại mật khẩu <abbr class="required" title="required">*</abbr></label>
                                                    <input id="f_confpassword" name="f_confpassword" type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group text-align-center">
                                                <button type="submit" class="btn btnSubmit save" name="btnSubmitPassword" id="btnSubmitPassword">Lưu thay
                                                    đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                                <div class="myaccount-content">
                                    <h3>Chi tiết Tài Khoản</h3>
                                    <div class="account-details-form">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="f_name">Họ tên <abbr class="required" title="required">*</abbr></label>
                                                        <input id="f_name" name="f_name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="dob">Ngày sinh <abbr class="required" title="required">*</abbr></label>
                                                        <input id="dob" value="<?php echo $user->NgaySinh ?>" name="dob" type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div>

                                                        <fieldset data-role="controlgroup">
                                                            <label>Giới tính<abbr class="required" title="required">*</abbr></label>
                                                            <label for="male">Male</label>
                                                            <input type="radio" class="sex" name="sex" id="sexMale" value="male" checked>
                                                            <label for="female">Female</label>
                                                            <input type="radio" class="sex" name="sex" id="sexFemale" value="female">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="city">Tỉnh / Thành Phố <abbr class="required" title="required">*</abbr></label>
                                                        <select id="city" class="form-control wide">
                                                            <option value="null" selected>Chọn</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-group">
                                                        <label for="district">Quận / Huyện <abbr class="required" title="required">*</abbr></label>
                                                        <select id="district" class="form-control wide">
                                                            <option value="null" selected>Chọn</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-group">
                                                        <label for="ward">Phường / Xã <abbr class="required" title="required">*</abbr></label>
                                                        <select id="ward" class="form-control wide">
                                                            <option value="null" selected>Chọn</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="street-address">Địa chỉ</label>
                                                        <input id="street-address" type="text" value="<?php echo $user->DiaChi ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="phone">SĐT <abbr class="required" title="required">*</abbr></label>
                                                        <input id="phone" value="<?php echo $user->SDT ?>" name="phone" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Chứng Minh Nhân Dân <abbr class="required" title="required">*</abbr></label>
                                                        <input id="identity" value="<?php echo $user->CMND ?>" name="identity" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group text-align-center">
                                                    <a type="submit" class="btn btnSubmit save" name="btnSubmit" id="btnSubmit">Lưu thay đổi</a>
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
    

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nice-select').remove();
            $('select').show();
            $.ajax({
                type: 'GET',
                url: 'https://provinces.open-api.vn/api/',
                dataType: 'json',
                success: function(data) {
                    $default = '<option value="null" selected>Chọn</option>';
                    $resultCity = $default;
                    $(data).each(function(index) {
                        $resultCity += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                    });
                    $('#city').html($resultCity);

                    $('#city option').each(function() {
                        if ($(this).text().toLowerCase() == '<?= $city ?>'.toLowerCase()) {
                            updateCity($(this).val());
                        }
                    });


                    $('#street-address').val('<?= $detailsAddress ?>');
                }
            });

            $('#city').on('change', function() {
                updateCity($('#city').val());
            });
            $('#district').on('change', function() {
                updateDistrict($(this).val());
            });
            $('#ward').on('change', function() {
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
                success: function(data) {
                    $default = '<option value="null" selected>Chọn</option>';
                    $resultDistrict = $default;
                    $(data).each(function(index) {
                        if (data[index].province_code == $idCity) {
                            $resultDistrict += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                        }
                    });
                    $('#district').html($resultDistrict);
                    $('#district option').each(function() {
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
                success: function(data) {
                    $default = '<option value="null" selected>Chọn</option>';
                    $resultWard = $default;
                    $(data).each(function(index) {
                        if (data[index].district_code == $idDistrict) {
                            $resultWard += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                        }
                    });
                    $('#ward').html($resultWard);
                    $('#ward option').each(function() {
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

        function AlertErrorPassword($text) {
            Swal.fire({
                icon: 'error',
                title: $text,
                showConfirmButton: false,
                timer: 2000
            });
            //$('swal-select').remove();
        }
    </script>
    <script>
        $('#btnSubmit').on('click', function() {
            const checkboxes = document.getElementsByName("sex");
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    $sex = checkboxes[i].value;
                }
            }
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
            } else {
                if ($detailsAddress_new.length > 0) {
                    $address = $detailsAddress_new + ', ';
                } else {
                    $address = '';
                }
                $address += $ward_new + ', ' + $district_new + ', ' + $city_new;
                updateAccount(<?= $MaTaiKhoan ?>, $name, $dob, $sex, $address, $phone, $cmnd);
            }
        });

        $('#btnSubmitPassword').on('click', function() {
            $passwordold = $('#f_passwordold').val();
            $password = $('#f_password').val();
            $confpassword = $('#f_confpassword').val();
            if ($password.length <= 0) {
                AlertErrorPassword('Mật khẩu không được để trống');
            } else if ($confpassword.length <= 0) {
                AlertErrorPassword('Mật khẩu không được để trống');
            } else if ($confpassword !== $password) {
                AlertErrorPassword('Mật khẩu không trùng');
            } else if (<?php echo $pass ?> != $passwordold) {
                AlertErrorPassword('Mật khẩu hiện tại không được để trống');
            } else {
                updatePassword('<?= $MaTaiKhoan ?>', $password);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#status-order-select').on('change', function() {
                $val_select = $('#status-order-select').val();
                console.log($val_select);
                $size = <?= count($orders) ?>;
                if ($val_select == "null") {
                    $('#order-body').html('<?= str_replace("'", "", $orders_all) ?>');
                } else if ($val_select == "1") {
                    $('#order-body').html('<?= str_replace("'", "", $orders_DaDuyet) ?>');
                } else if ($val_select == "0") {
                    $('#order-body').html('<?= str_replace("'", "", $orders_ChoKiemDuyet) ?>');
                } else if ($val_select == "-1") {
                    $('#order-body').html('<?= str_replace("'", "", $orders_HuyDon) ?>');
                }
            });
        });
    </script>
    <style>
        .save {
            margin-top: 20px;
        }

        .text-align-center {
            text-align: center;
        }
    </style>

    <?= $this->endSection() ?>