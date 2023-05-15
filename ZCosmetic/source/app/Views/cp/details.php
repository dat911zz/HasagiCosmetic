<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<div>
    <div class="test">
        <div class="header ml-0">
            <h2 class="position-relative" style="color: #440ccb ">CHI TIẾT TÀI KHOẢN</h2>
            <hr class="bg-dark"></hr>
        </div>
    </div>
    <div class="container">
            <div>
                <span style="font-weight: bold">
                    Mã nhân viên:
                </span>
                <span>
                    @Html.DisplayFor(model => model.MaNhanVien)
                </span>
            </div>
            <div>
                <span style="font-weight: bold">
                    Họ tên:
                </span>
                <span>
                    @userDetail.HoTen
                </span>
            </div>
            <div>
                <span style="font-weight: bold">
                    Ngày sinh:
                </span>
                <span>
                    @userDetail.NgaySinh
                </span>
            </div>
            <div>
                <span style="font-weight: bold">
                    Số điện thoại:
                </span>
                <span>
                    @userDetail.SoDienThoai
                </span>
            </div>
            <div>
                <span style="font-weight: bold">
                    Địa chỉ:
                </span>
                <span>
                    @userDetail.DiaChi
                </span>
            </div>
            <div>
                <span style="font-weight: bold">
                    Email:
                </span>
                <span>
                    @userDetail.Email
                </span>
            </div>
        <div>
            <span style="font-weight: bold">
                Tên đăng nhập:
            </span>
            <span>
                @Html.DisplayFor(model => model.TenDN)
            </span>
        </div>

        <div>
            <span style="font-weight: bold">
                Mật khẩu:
            </span>
            <span>
                *********
                @*@Html.DisplayFor(model => model.MATKHAU)*@
            </span>
        </div>

        <div>
            <span style="font-weight: bold">
                Chức vụ:
            </span>
            <span>
                @Html.DisplayFor(model => model.ChucVu)
            </span>
        </div>

    </div>
</div>
<p>
    @Html.ActionLink("Chỉnh sửa", "Edit", new { id = Model.MaTaiKhoan }) |
    @Html.ActionLink("Trở về", "Index")
</p>
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