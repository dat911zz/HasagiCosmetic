<?php
include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
?>

<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<script>
    $(document).ready(function() {
        var data = JSON.parse(sessionStorage.getItem('checkout'));
        sessionStorage.clear();
        console.log(data);
        if(data == null) {
            
        }
        $result = '';
        $values = data.value;
        $total = 0;
        $($values).each(function(index) {
            $gia = $values[index].Gia - ($values[index].GiamGia / 100.0) * $values[index].Gia;
            $total += $gia * $values[index].SoLuong;
            $result += '<tr class="cart-item">\
                            <td class="product-name" style="display: flex; align-items: center; justify-content: space-between;"><Span class="shorten-text two-row" style="width:80%; text-align: justify;">' + $values[index].TenSanPham + '</Span><span class="product-quantity" style="width: 20%; font-size: 14px; color:red; margin-left: 10px;">× ' + $values[index].SoLuong + '</span></td>\
                            <td class="product-total">' + convertLongToMoney($gia * $values[index].SoLuong, 'VNĐ') + '</td>\
                        </tr>';
        });
        $('.table-body').html($result);
        $('.cart-subtotal > td').html(convertLongToMoney($total, 'VNĐ'));
        $('.order-total > td').html(convertLongToMoney($total, 'VNĐ'));
        if (data.change_quantity) {
            Swal.fire({
                icon: 'warning',
                title: 'Số lượng đặt hàng có thay đổi\n(số lượng tồn không đủ)\nVui lòng xem lại.',
                showConfirmButton: true,
                timer: 2000
            });
            $('.swal2-select').remove();
        }
    });
</script>

<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </div>
    </nav>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Shopping Checkout Area Wrapper ==-->
    <section class="shopping-checkout-wrap section-space">
        <div class="container">
            <div class="checkout-page-coupon-wrap">
                <!--== Start Checkout Coupon Accordion ==-->
                <div class="coupon-accordion" id="CouponAccordion">
                    <div class="card">
                        <h3>
                            <i class="fa fa-info-circle"></i> Bạn có mã giảm giá?
                            <a href="#/" data-bs-toggle="collapse" data-bs-target="#couponaccordion">Nhấp vào đây để áp dụng mã</a>
                        </h3>
                        <div id="couponaccordion" class="collapse" data-bs-parent="#CouponAccordion">
                            <div class="card-body">
                                <div class="apply-coupon-wrap">
                                    <p>Nếu có mã, vui lòng nhập vào bên dưới.</p>
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Mã giảm giá">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn-coupon">Áp dụng mã giảm giá</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== End Checkout Coupon Accordion ==-->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!--== Start Billing Accordion ==-->
                    <div class="checkout-billing-details-wrap">
                        <h2 class="title">Chi tiết thanh toán</h2>
                        <div class="billing-form-wrap">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="f_name">Họ tên lót <abbr class="required" title="required">*</abbr></label>
                                            <input id="f_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="l_name">Tên <abbr class="required" title="required">*</abbr></label>
                                            <input id="l_name" type="text" class="form-control">
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
                                            <input id="street-address" type="text" class="form-control" placeholder="Số nhà, ...">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone">SĐT <abbr class="required" title="required">*</abbr></label>
                                            <input id="phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email <abbr class="required" title="required">*</abbr></label>
                                            <input id="email" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label for="order-notes">Ghi chú</label>
                                            <textarea id="order-notes" class="form-control" placeholder="Ghi chú về hóa đơn, phương thức vận chuyển ... những điều cần lưu ý cho shipper."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--== End Billing Accordion ==-->
                </div>
                <div class="col-lg-6">
                    <!--== Start Order Details Accordion ==-->
                    <div class="checkout-order-details-wrap">
                        <div class="order-details-table-wrap table-responsive">
                            <h2 class="title mb-25">Đơn Của Bạn</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-total">Tổng Cộng</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr class="cart-item">
                                        <td class="product-name"><span>Satin gown</span><span class="product-quantity">× 1</span></td>
                                        <td class="product-total">£69.99</td>
                                    </tr>
                                    <tr class="cart-item">
                                        <td class="product-name">Printed cotton t-shirt <span class="product-quantity">× 1</span></td>
                                        <td class="product-total">£20.00</td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-foot">
                                    <tr class="cart-subtotal">
                                        <th>Tạm tính</th>
                                        <td>£89.99</td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Phí vận chuyển</th>
                                        <td>Flat rate: 0 VNĐ</td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng</th>
                                        <td>£91.99</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="shop-payment-method">
                                <div id="PaymentMethodAccordion">
                                    <div class="card">
                                        <div class="card-header" id="check_payments">
                                            <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemOne" aria-controls="itemOne" aria-expanded="true">THANH TOÁN KHI GIAO HÀNG</h5>
                                        </div>
                                        <div id="itemOne" class="collapse show" aria-labelledby="check_payments" data-bs-parent="#PaymentMethodAccordion">
                                            <div class="card-body">
                                                <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="check_payments3">
                                            <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemTwo" aria-expanded="false">CHUYỂN KHOẢN TRỰC TIẾP</h5>
                                        </div>
                                        <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                                            <div class="card-body">
                                                <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi số tiền trong tài khoản của chúng tôi được thanh toán.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="p-text">Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của bạn trên trang web này và cho các mục đích khác được mô tả trong <a href="#/">chính sách bảo mật</a> của chúng tôi.</p>
                                <!-- <div class="agree-policy">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                                        <label for="privacy" class="custom-control-label">Tôi đã đọc và đồng ý với các điều khoản và điều kiện của trang web <span class="required">*</span></label>
                                    </div>
                                </div> -->
                                <a href="account-login.php" class="btn-place-order">Đặt Hàng</a>
                            </div>
                        </div>
                    </div>
                    <!--== End Order Details Accordion ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Shopping Checkout Area Wrapper ==-->

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

                    $('#district').html($default);
                    $('#ward').html($default);
                }
            });

            $('#city').on('change', function() {
                $('#city > option[Selected]').attr('Selected', false);
                $('#city > option[value=' + $('#city').val() + ']').attr('Selected', true);
                changeDistrict($(this).val());
            });
            $('#district').on('change', function() {
                $('#district > option[Selected]').attr('Selected', false);
                $('#district > option[value=' + $('#district').val() + ']').attr('Selected', true);
                changeWard($(this).val());
            });
            $('#ward').on('change', function() {
                $('#ward > option[Selected]').attr('Selected', false);
                $('#ward > option[value=' + $('#ward').val() + ']').attr('Selected', true);
                console.log($('#ward > option[Selected]').text() + ', ' + $('#district > option[Selected]').text() + ', ' + $('#city > option[Selected]').text());
            })
        });

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
                    $('#ward').html($default);
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
                }
            });
        }
        $('#phone').on('keydown', function(e) {
            if ((/[a-zA-Z]/gm.test(String.fromCharCode(e.keyCode)))) {
                e.preventDefault();
            }
        });
    </script>
</main>
<?= $this->endSection() ?>