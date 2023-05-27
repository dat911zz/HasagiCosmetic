<?= $this->extend('layouts/admin_layout') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>
<style>
    .form-group {
        display: flex;
    }

    .tt {
        border: 1px solid #ccc;
        height: auto;
        margin: 10px 0px 10px 0px;
        padding: 10px 0px 10px 10px;
    }

    .control-label {
        font-size: 16px;
    }
</style>
<?php
if (!isset($tk)) {
    echo '<span class="text-danger">Không tìm thấy tài khoản!</span>';
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
} else {
?>
    <div>
        <div class="test">
            <div class="header ml-0">
                <h2 class="position-relative" style="color: #440ccb ">CHI TIẾT TÀI KHOẢN</h2>
                <hr class="bg-dark">
                </hr>
            </div>
        </div>
        <div class="container">
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Tên tài khoản <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="TenDangNhap" maxlength="50" name="TenDangNhap" type="text" value="<?= $tk['TenDangNhap'] ?>" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Họ tên đầy đủ <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="HoVaTen" maxlength="50" name="HoVaTen" type="text" value="<?= $tk['LoaiTaiKhoan'] == 1 ? $nv['HoVaTen'] : $nd['HoVaTen'] ?>" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Ngày sinh <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="NgaySinh" maxlength="50" name="NgaySinh" type="date" value="<?= $tk['LoaiTaiKhoan'] == 1 ? $nv['NgaySinh'] : $nd['NgaySinh'] ?>" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">SĐT <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="SDT" maxlength="50" name="SDT" type="text" value="<?= $tk['LoaiTaiKhoan'] == 1 ? $nv['SDT'] : $nd['SDT'] ?>" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Số chứng minh/ căn cước công dân<span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="CMND" maxlength="50" name="CMND" type="text" value="<?= $tk['LoaiTaiKhoan'] == 1 ? $nv['CMND'] : $nd['CMND'] ?>" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Giới tính <span style="color: red">(*)</span></label>
                <?php 
                    $gt = $tk['LoaiTaiKhoan'] == 1 ? $nv['GioiTinh'] : $nd['GioiTinh'];
                ?>
                <label class="col-md-1">
                    <input style="margin-left: 10px" type="radio" name="GioiTinh" value="Nam" <?php if ($gt === 'Nam') {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                    <span>Nam</span>
                </label>
                <label class="col-md-1">
                    <input style="margin-left: 10px" type="radio" name="GioiTinh" value="Nữ" <?php if ($gt === 'Nữ') {
                                                                                                    echo 'checked';
                                                                                                } ?>>
                    <span>Nữ</span>
                </label>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Mật khẩu <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="MatKhau" maxlength="50" name="MatKhau" type="password" value="<?= $tk['MatKhau'] ?>" aria-invalid="false">
                </div>
            </div>
            <?php
            if ($tk['LoaiTaiKhoan'] == 1) { ?>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Phân quyền truy cập</label>
                    <div class="col-md-8 tt">
                        <?php 
                            // foreach (){

                            // }
                        ?>
                        <label class="col-md-2">
                            <input style="margin-left: 10px" type="checkbox" name="UserRoles" value="Admin">
                            <span>Quản trị</span>
                        </label>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="form-group">
                <a class="btn btn-primary" style="font-family: Tahoma; justify-content: space-around;" onclick="saveAccount()">Lưu</a>
            </div>
        </div>
    </div>
<?php
}
?>

<style>
    .test {
        max-width: max-content;
        display: block;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #440CCB;
        color: white;
        margin: auto;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        max-width: 250px;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 20%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>