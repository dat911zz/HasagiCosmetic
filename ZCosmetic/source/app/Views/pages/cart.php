<?php
session_start();
$id_user = isset($_SESSION["MaTaiKhoan"]) ? $_SESSION["MaTaiKhoan"] : 0;
if (isset($id_user) && $id_user > 0) {
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    $db = new DatabaseHelper();
    $gio_hang = $db->executeReader('CALL sp_getCart(?)', array($id_user));
} else {
    header('location:/Pages/Login');
    die;
}
?>

<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<style>
    th {
        white-space: nowrap;
    }
</style>

<main class="main-content" id="container-cart">

    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div>
    </nav>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <?php
    if (count($gio_hang) > 0) {
    ?>
        <section class="section-space" id="carts">
            <div class="container">
                <div class="shopping-cart-form table-responsive">
                    <form action="#" method="post">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail" style="display: flex; align-items: center;"><input id="check-all" type="checkbox" /> <span style="margin-left: 4px;">ALL</span></th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th class="product-subtotal">Đơn vị tiền tệ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($gio_hang as $sp) {
                                    $gia = $sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia;
                                    $total += $gia * $sp->SoLuong;
                                ?>
                                    <tr class="tbody-item">
                                        <td class="product-remove">
                                            <a id="<?= 'rm_' . $sp->Ma ?>" class="remove" onclick="removeCart(<?= $sp->Ma ?>, <?= $id_user ?>)">×</a>
                                        </td>
                                        <td class="product-check">
                                            <input data-id-product="<?= $sp->Ma ?>" type="checkbox" />
                                        </td>
                                        <td class="product-thumbnail">
                                            <div class="thumb">
                                                <a href="/Home/Product?id=<?= $sp->Ma ?>">
                                                    <img src="../../assets/Product_Images/<?= $sp->MaHinh . '.jpg' ?>" width="68" height="84" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name" style="text-align: justify;">
                                            <a class="title" href="/Home/Product?id=<?= $sp->Ma ?>"><?= $sp->TenSanPham ?></a>
                                        </td>
                                        <td class="product-price">
                                            <span class="price"><?= number_format($gia, 0, ',', '.') ?></span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="pro-qty">
                                                <div class="dec qty-btn" data-id-product="<?= $sp->Ma ?>" data-id-user="<?= $id_user ?>" data-price="<?= $gia ?>">-</div>
                                                <input type="text" class="quantity" data-id-product="<?= $sp->Ma ?>" data-id-user="<?= $id_user ?>" data-price="<?= $gia ?>" title="Quantity" value="<?= $sp->SoLuong ?>">
                                                <div class="inc qty-btn" data-id-product="<?= $sp->Ma ?>" data-id-user="<?= $id_user ?>" data-price="<?= $gia ?>">+</div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="price" id="<?= 'pr_' . $sp->Ma ?>"><?= number_format($gia * $sp->SoLuong, 0, ',', '.') ?></span>
                                        </td>
                                        <td>
                                            VNĐ
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <!-- <div class="coupon-wrap">
                            <h4 class="title">Coupon</h4>
                            <p class="desc">Thêm mã khuyến mãi</p>
                            <input type="text" class="form-control" placeholder="Coupon code">
                            <button type="button" class="btn-coupon">Áp dụng mã khuyến mãi</button>
                        </div> -->
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="cart-totals-wrap">
                            <h2 class="title">Tổng giỏ hàng</h2>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Tạm tính</th>
                                        <td>
                                            <span class="amount"><?= number_format($total, 0, ',', '.') . ' VNĐ' ?></span>
                                        </td>
                                    </tr>
                                    <tr class="shipping-totals">
                                        <th>Phí vận chuyển</th>
                                        <td>
                                            <ul class="shipping-list">
                                                <li class="radio">
                                                    <input type="radio" name="shipping" id="radio2" checked>
                                                    <label for="radio2">Miễn phí vận chuyển</label>
                                                </li>
                                            </ul>
                                            <!-- <p class="destination">Vận chuyển đến <strong>USA</strong>.</p>
                                                <a href="javascript:void(0)" class="btn-shipping-address">Thay đổi địa chỉ</a> -->
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng cộng</th>
                                        <td>
                                            <span class="amount"><?= number_format($total, 0, ',', '.') . ' VNĐ' ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-end">
                                <span id="checkout" class="checkout-button">Thanh toán</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else {
    ?>
        <div style="text-align: center; color:orange; font-weight: bold; min-height: 400px; margin-top: 40px; user-select: none;">
            Giỏ hàng đang rỗng
        </div>
    <?php
    }
    ?>
    <!--== End Product Area Wrapper ==-->
    <script>
        $('.quantity').on('keydown', function(e) {
            if ((/[a-zA-Z]/gm.test(String.fromCharCode(e.keyCode)))) {
                e.preventDefault();
            } else {
                updateCart($(this).data('id-product'), $(this).val(), $(this).data('id-user'), $(this).data('price'));
            }
        });
        $('.quantity').on('focusout', function() {
            if ($(this).val().length == 0 || $(this).val() == 0) {
                $(this).val(1);
            }
            updateCart($(this).data('id-product'), $(this).val(), $(this).data('id-user'), $(this).data('price'));
        })
        $('#check-all').on('click', function() {
            console.log($(this).is(':checked'));
            if ($(this).is(':checked')) {
                console.log('v true');
                $('.product-check > input').prop('checked', true);
                checkProduct();
            } else {
                console.log('v false');
                $('.product-check > input').prop('checked', false);
                checkProduct();
            }
            console.log($arrCart);
        });

        $(document).ready(function() {
            $arrCart = [];
            $('.product-check > input').each(function(index, e) {
                $(e).change(function() {
                    if ($(this).is(':checked')) {
                        $arrCart.push($(e).data('id-product'));
                        console.log();
                    } else {
                        $indexOf = $arrCart.indexOf($(e).data('id-product'));
                        if ($indexOf > -1) {
                            $arrCart.splice($indexOf, 1);
                        }
                    }
                    console.log($arrCart);
                });
            });

            var js_obj_data = JSON.parse('<?= str_replace("'", "", json_encode($gio_hang)) ?>'.replace(/\n/g, "\\n"));
            console.log(js_obj_data[0].Gia + 1);
        });

        function checkProduct() {
            $arrCart = [];
            $('.product-check > input').each(function(index, e) {
                if ($(this).is(':checked')) {
                    $arrCart.push($(e).data('id-product'));
                } else {
                    $indexOf = $arrCart.indexOf($(e).data('id-product'));
                    if ($indexOf > -1) {
                        $arrCart.splice($indexOf, 1);
                    }
                }
            });
            console.log($arrCart);
        }
    </script>
</main>
<?= $this->endSection() ?>