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

use App\Models\NhomQuyenModel;

?>
<div>
    <div class="test">
        <div class="header ml-0">
            <h2 class="position-relative" style="color: #440ccb; text-transform: uppercase; "><?= $title ?></h2>
            <hr class="bg-dark">
            </hr>
        </div>
    </div>
    <form id="frmDetails">
        <div class="container">
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Tên tài khoản <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="TenDangNhap" maxlength="50" required name="TenDangNhap" type="text" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Họ tên đầy đủ <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="HoVaTen" maxlength="50" required name="HoVaTen" type="text" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Ngày sinh <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="NgaySinh" maxlength="50" required name="NgaySinh" type="date" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Địa chỉ <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="DiaChi" maxlength="500" required name="DiaChi" type="text" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">SĐT <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="SDT" maxlength="50" required name="SDT" type="text" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Số chứng minh/ căn cước công dân<span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="CMND" maxlength="50" required name="CMND" type="text" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Giới tính <span style="color: red">(*)</span></label>
                <label class="col-md-1">
                    <input style="margin-left: 10px" type="radio" required name="GioiTinh" value="Nam">
                    <span>Nam</span>
                </label>
                <label class="col-md-1">
                    <input style="margin-left: 10px" type="radio" required name="GioiTinh" value="Nữ">
                    <span>Nữ</span>
                </label>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Mật khẩu <span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" id="MatKhau" maxlength="50" required name="MatKhau" type="password" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Nhóm quyền truy cập</label>
                <div class="col-md-8 tt">
                    <?php
                    foreach ((new NhomQuyenModel())->findAll() as $nq) { ?>
                        <label class="col-md-2">
                            <input style="margin-left: 10px" type="radio" name="NhomQuyen" value="<?= $nq['Ma'] ?>">
                            <span><?= $nq['Ten'] ?></span>
                        </label>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" name="isCreate" value="1">
            <input type="hidden" name="Ma" value="">
            <input type="hidden" name="LoaiTaiKhoan" value="1">
            <div class="form-group">
                <a class="btn btn-primary" style="font-family: Tahoma; justify-content: space-around;" onclick="saveAccount()">Lưu</a>
            </div>
        </div>
    </form>
</div>

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