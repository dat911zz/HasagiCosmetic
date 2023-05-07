<?php
    $idKH = 1;
    if(isset($idKH) && $idKH > 0) {
        include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
        $db = new DatabaseHelper();
        $gio_hang = $db->executeReader('CALL sp_getCart(?)', array($idKH));
    }
    else {
        header('location:/');
        die;
    }
?>

<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<main class="main-content">

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
        if(count($gio_hang) > 0) {
            ?>
            <section class="section-space">
                <div class="container">
                    <div class="shopping-cart-form table-responsive">
                        <form action="#" method="post">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($gio_hang as $sp) {
                                        $gia = $sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia;
                                        ?>
                                        <tr class="tbody-item">
                                            <td class="product-remove">
                                                <a class="remove" href="javascript:void(0)">×</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <div class="thumb">
                                                    <a href="single-product.php">
                                                        <img src="../../assets/Product_Images/<?= $sp->MaHinh.'.jpg' ?>" width="68" height="84" alt="Image-HasTech">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <a class="title" href="/Home/Product?id=<?= $sp->Ma ?>"><?= $sp->TenSanPham ?></a>
                                            </td>
                                            <td class="product-price">
                                                <span class="price"><?= number_format($gia, 0, ',', '.').' VNĐ' ?></span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" title="Quantity" value="<?= $sp->SoLuong ?>">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="price"><?= number_format($gia * $sp->SoLuong, 0, ',', '.').' VNĐ' ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                    <tr class="tbody-item-actions">
                                        <td colspan="6">
                                            <button type="submit" class="btn-update-cart disabled" disabled>Cập nhật giỏ hàng</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="coupon-wrap">
                                <h4 class="title">Coupon</h4>
                                <p class="desc">Thêm mã khuyến mãi</p>
                                <input type="text" class="form-control" placeholder="Coupon code">
                                <button type="button" class="btn-coupon">Áp dụng mã khuyến mãi</button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="cart-totals-wrap">
                                <h2 class="title">Tổng giỏ hàng</h2>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td>
                                                <span class="amount">$499.00</span>
                                            </td>
                                        </tr>
                                        <tr class="shipping-totals">
                                            <th>Shipping</th>
                                            <td>
                                                <ul class="shipping-list">
                                                    <li class="radio">
                                                        <input type="radio" name="shipping" id="radio1" checked>
                                                        <label for="radio1">Flat rate: <span>$3.00</span></label>
                                                    </li>
                                                    <li class="radio">
                                                        <input type="radio" name="shipping" id="radio2">
                                                        <label for="radio2">Miễn phí vận chuyển</label>
                                                    </li>
                                                    <li class="radio">
                                                        <input type="radio" name="shipping" id="radio3">
                                                        <label for="radio3">Địa chỉ giao hàng</label>
                                                    </li>
                                                </ul>
                                                <p class="destination">Vận chuyển đến <strong>USA</strong>.</p>
                                                <a href="javascript:void(0)" class="btn-shipping-address">Thay đổi địa chỉ</a>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td>
                                                <span class="amount">$504.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-end">
                                    <a href="product-checkout.php" class="checkout-button">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
        else {
            ?>
            <div style="text-align: center; color:orange; font-weight: bold; min-height: 400px; margin-top: 40px; user-select: none;">
                Giỏ hàng đang rỗng
            </div>
            <?php
        }
    ?>
    <!--== End Product Area Wrapper ==-->

</main>
<?= $this->endSection() ?>