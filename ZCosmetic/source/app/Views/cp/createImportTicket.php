<?= $this->extend('layouts/admin_layout') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<style>
    .form-group {
        display: flex;
    }

    .tt {
        border: 1px solid #fccc;
        height: auto;
        margin: 10px 0px 10px 0px;
        padding: 10px 0px 10px 10px;
    }

    .control-label {
        font-size: 16px;
    }

    .table>thead>tr>th {
        background: #f1f5f9;
        color: #56688A;
        font-size: 16px;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .products input {
        border: 1px solid #ddd;
        width: 100%;
        padding: 5px 10px;
        font-size: 14px;
        line-height: 10px;
    }
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
<?php

use App\Models\NhanVienModel;
use App\Models\NhomQuyenModel;
session_start();
?>
<div>
    <div class="test">
        <div class="header ml-0">
            <h2 class="position-relative" style="color: #440ccb; text-transform: uppercase; "><?= $title ?></h2>
            <hr class="bg-dark">
            </hr>
        </div>
    </div>
    <form id="frmTicket">
        <input type="hidden" name="MaNVTL" value="<?= $_SESSION['MaTaiKhoan'] ?>">
        <div class="container" style="margin-bottom: 20px">
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Nhân viên tạo lập</label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" maxlength="50" disabled name="NLTL" type="text" value="<?= (new NhanVienModel())->getNVByID($_SESSION['MaTaiKhoan'])['HoVaTen'] ?>" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Nhà cung cấp<span style="color: red">(*)</span></label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" maxlength="50" required name="NhaCungCap" type="text" value="" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Ngày tạo lập</label>
                <div class="col-md-6 col-xs-12">
                    <input class="form-control valid" maxlength="50" disabled name="NgayTaoLap" type="date" value="" aria-invalid="false">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-group table-responsive">
                <table class="products table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20px">Xóa</th>
                            <th style="min-width:100px">Tên hàng hóa, dịch vụ</th>
                            <th style="width: 90px">ĐVT (Unit)</th>
                            <th style="width: 60px">Số lượng (Quantity)</th>
                            <th style="width: 90px">Đơn giá (Price)</th>
                            <th style="width: 100px">Thành tiền (Total) VNĐ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 5; $i++) {
                        ?>
                            <tr>
                                <td class="delr" style="text-align: center"><i class="fa fa-times"></i></td>
                                <td>
                                    <input type="text" class="name" maxlength="500" />
                                </td>
                                <td>
                                    <input type="text" class="unit" maxlength="50" />
                                </td>
                                <td>
                                    <input type="text" class="quantity align-right textr" maxlength="18" />
                                </td>
                                <td>
                                    <input type="text" class="price align-right textr" maxlength="18" />
                                </td>
                                <td>
                                    <input type="text" class="discount align-right textr" maxlength="5" />
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>               
            </div>
            <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Tổng tiền</label>
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control valid" maxlength="50" disabled name="TongTien" type="text" value="0" aria-invalid="false">
                    </div>
                </div>
            <div class="form-group">
                <a class="btn btn-primary" style="font-family: Tahoma; justify-content: space-around;" onclick="saveAccount()">Lưu</a>
            </div>
    </form>
</div>
<script>
    $('input[name="NgayTaoLap"]')[0].valueAsDate = new Date()


</script>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>