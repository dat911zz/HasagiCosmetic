<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<?php
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    session_start();
    $id_user = isset($_SESSION["MaTaiKhoan"]) ? $_SESSION["MaTaiKhoan"] : 0;
    $db = new DatabaseHelper();

    $search = isset($search) ? $search : "";
    $search = strtolower($db->convertVietnameseToLatin($search));

    $sps = $db->executeReader("SELECT tbl_sanpham.*, tbl_gia.Gia, tbl_giasanpham.* FROM tbl_sanpham, tbl_giasanpham, tbl_gia WHERE tbl_sanpham.Ma = tbl_giasanpham.MaSanPham and tbl_giasanpham.MaGia = tbl_gia.Ma and tbl_giasanpham.NgayHetHieuLuc is null and Search like '%".$search."%' ");
?>

<section class="section-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm tìm kiếm</h2>
                </div>
            </div>
        </div>
        <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
            <?php
            if (count($sps) > 0) {
                foreach ($sps as $sp) {
            ?>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <div class="product-item">
                        <div class="product-thumb">
                            <a class="d-block" href="<?= base_url('/Home/Product?id='.$sp->Ma) ?>">
                                <img src="../../assets/Product_Images/<?= $sp->MaHinh.'.jpg' ?>" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">Mới</span>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-quick-view" data-id-product="<?= $sp->Ma ?>" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" onclick="addCart(<?= $sp->Ma ?>, 1, <?= $id_user ?>)" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                    <span>Thêm vào giỏ</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 xem</div>
                            </div>
                            <h4 class="title shorten-text"><a href="Home/Product?id=<?= $sp->Ma ?>"><?php echo (strlen($sp->TenSanPham) > 50) ? substr($sp->TenSanPham, 0, 50).'...' : $sp->TenSanPham ?></a></h4>
                            <div class="prices">
                                <span class="price"><?php echo number_format($sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                <?php
                                if($sp->GiamGia != 0) {
                                    ?>
                                    <span class="price-old"><?php echo number_format($sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            else {
                ?>
                <div style="text-align: center; color: red;">Không có kết quả phù hợp</div>
                <?php
            }
            ?>

        </div>
    </div>
</section>

<?= $this->endSection() ?>