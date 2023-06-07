<?= $this->extend('layouts/admin_layout') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<style>
    .form-group {
        display: flex;
    }

    .align-right {
        text-align: right;
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

    .dataTables_filter>label,
    .dataTables_length>label {
        font-size: 1rem;
    }

    table {
        border-collapse: collapse;
        table-layout: fixed;
        width: 310px;
    }

    .table th {
        text-align: center !important;
        vertical-align: middle !important;
    }

    .table td,
    .table th {
        white-space: normal !important;
    }

    .short-tent {
        text-overflow: ellipsis;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        word-break: break-word;
        min-height: 3em;
    }

    a.btn.btn-secondary.btn-edit.m-l-0.px-075,
    a.btn.btn-danger.px-075 {
        padding-left: 0.75rem !important;
    }

    table.dataTable thead>tr>th {
        text-align: center;
        background-color: #333333;
        color: #ffffff;
    }

    button.dt-button,
    div.dt-button,
    a.dt-button,
    input.dt-button {
        position: relative;
        display: inline-block;
        box-sizing: border-box;
        margin-left: 0.167em;
        margin-right: 0.167em;
        margin-bottom: 0.333em;
        padding: 0.5em 1em;
        border: 1px solid rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        cursor: pointer;
        font-size: .88em;
        line-height: 1.6em;
        color: black;
        white-space: nowrap;
        overflow: hidden !important;
        background-color: rgba(0, 0, 0, 0.1) !important;
        background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, StartColorStr="rgba(230, 230, 230, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)") !important;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        text-decoration: none;
        outline: none;
        text-overflow: ellipsis;
    }

    button.dt-button:hover:not(.disabled),
    div.dt-button:hover:not(.disabled),
    a.dt-button:hover:not(.disabled),
    input.dt-button:hover:not(.disabled) {
        border: 1px solid #666 !important;
        background-color: rgba(0, 0, 0, 0.1) !important;
        background: linear-gradient(to bottom, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, StartColorStr="rgba(153, 153, 153, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)") !important;
    }
</style>
<?php

use App\Models\LoaiSPModel;
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
            <div class="table sys_products">
                <table class="table" id="table_id" width="100%" cellspacing="0">
                    <colgroup>
                        <col style="width: 8%;">
                        <col style="width: 5%;">
                        <col style="width: 20%;">
                        <col style="width: 8%;">
                        <col style="width: 8%;">
                        <col style="width: auto;">
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr class="text-center">
                            <th>Ảnh</th>
                            <th>Mã SP</th>
                            <th>Tên SP</th>
                            <th>SL tồn</th>
                            <th>Xuất xứ</th>
                            <th>Thương hiệu</th>
                            <th>Loại</th>
                            <th>Đơn vị tính</th>
                            <th>Giảm giá</th>
                            <th>Mô Tả</th>
                            <th></th>
                            <!-- <th class="text-center">Công Cụ</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <a class="btn btn-primary" onclick="">Thêm sản phẩm mới</a>
        <div class="container">
            <div class="form-group table-responsive">
                <table class="products table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 4%">Xóa</th>
                            <th style="width: 4%">STT</th>
                            <th style="width: 8%">Mã hàng</th>
                            <th style="width: 15%">Tên hàng hóa, dịch vụ</th>
                            <th style="width: 8%">ĐVT (Unit)</th>
                            <th style="width: 8%">Số lượng (Quantity)</th>
                            <th style="width: 8%">Đơn giá (Price)</th>
                            <th style="width: 10%">Thành tiền (Total) VNĐ</th>
                        </tr>
                    </thead>
                    <tbody>

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
    <div id="selectLoai" hidden>
        <select disabled class="Loai">
            <?php foreach ((new LoaiSPModel())->findAll() as $loai) {
                echo '<option value="' . $loai['Ma'] . '">' . $loai['Ten'] . '</option>';
            } ?>
        </select>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="../assets/js/importTicket.js"></script>
<script>
    $('input[name="NgayTaoLap"]')[0].valueAsDate = new Date();
    var jtable = null;
    $(document).ready(function() {
        // $('#table_id').DataTable().destroy();
        jtable = $('#table_id').DataTable({
            pageResize: false,
            scrollY: 500,
            scrollX: true,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'Tất cả'],
            ],
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                'colvis'
            ],
            language: {
                "lengthMenu": "Hiện _MENU_ trường",
                "zeroRecords": "Không tìm thấy dữ liệu!",
                "info": "_PAGE_ / _PAGES_",
                "infoEmpty": "Không có dữ liệu!",
                "infoFiltered": "(Lọc dữ liệu từ _MAX_ bản ghi)",
                "paginate": {
                    "first": "<<",
                    "last": ">>",
                    "next": ">",
                    "previous": "<"
                },
                "loadingRecords": "Đang tải...",
                "processing": "",
                "search": "Tìm kiếm:",
            },
            displayLength: 5,
            dom: "<'toolbar'><'row'<'col-sm-9'l><'col-sm-3 t_filter'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-6'p>>",
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: "<?php echo site_url('CP/GetProducts'); ?>",
            },
            order: [
                [1, 'desc']
            ],
            columnDefs: [{
                    defaultContent: "-",
                    targets: "_all",
                },
                {
                    orderable: false,
                    targets: [0, 10]
                }
            ],
            columns: [{
                    "data": 0,
                    render: function(data) {
                        return '<img src="../../assets/Product_Images/' + data + '.jpg" style="width: 50px; object-fit:contain" />'
                    }
                },
                {
                    "data": 1
                },
                {
                    "data": 2,
                    render: function(data) {
                        return '<div class="text-center">' + data + '</div>';
                    }
                },
                {
                    "data": 3,
                    render: function(data) {
                        return '<div class="text-center">' + data + '</div>';
                    }
                },
                {
                    "data": 4,
                    render: function(data) {
                        return '<div class="text-center">' + data + '</div>';
                    }
                },
                {
                    "data": 5,
                    render: function(data) {
                        return '<div class="text-center">' + data + '</div>';
                    }
                },
                {
                    "data": 6,
                    render: function(data) {
                        return '<div class="text-center">' + data + '</div>';
                    }
                },
                {
                    "data": 7,
                    render: function(data) {
                        return '<div class="text-center">' + data + '</div>';
                    }
                },
                {
                    "data": 8,
                    render: function(data) {
                        if (data > 0) {
                            return '<div class="text-center text-danger">' + data + '%</div>';
                        }
                        return '<div class="text-center">' + data + '%</div>';
                    }
                },
                {
                    "data": 9,
                    render: function(data) {
                        return '<div style="text-align: justify;" class="short-tent">' + data + '</div>';
                    }
                },
                {
                    "data": "Thao tác",
                    render: function(data, type, row) {
                        return '<a onclick="addSP(' + row[1] + ')" class="btn btn-primary action-btn-add-product" id="prod_' + row[1] + '""><i class="bi bi-cart-plus"></i></a>';
                    }
                },
            ]
        });
    });
    $('.action-btn-add-product').on('click', function() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Ajax/GetProduct') ?>",
            dataType: 'json',
            data: {
                id_product: $(this).data('id-product')
            },
            success: function(data) {
                console.log(data);
                $('.product-details-cart-wishlist .add-cart').data('id-product', data.value[0].Ma);
                $('.product-single-thumb > img').attr('src', '../../assets/Product_Images/' + data.value[0].MaHinh + '.jpg');
                $('.product-details-title').html(data.value[0].TenSanPham);
                $('.product-details-title ~ p').html(data.value[0].MoTa);
                $('.pro-qty > input').val(1);
                var giamGia = (data.value[0].GiamGia / 100.0) * data.value[0].Gia;
                $('.product-details-action .price').html(convertLongToMoney(data.value[0].Gia - giamGia, 'VNĐ'));

            }
        });
    });

    function findSPByID(id) {
        var data;
        $(".sys_products #table_id tbody tr td:nth-child(2)").each(function(i, item) {
            if ($(item).text() == id){
                console.log($(item).parent().find(":nth-child(3)").text());
                data = {
                    Ma: $(item).parent().find(":nth-child(2)").text(),
                    Ten: $(item).parent().find(":nth-child(3)").text(),
                    DVT: $(item).parent().find(":nth-child(8)").text()
                };
            }
        });
        return data;
    }

    function addSP(id) {
        addNewRow(findSPByID(id));

        // $.ajax({
        //     type: 'GET',
        //     url: "<?= base_url('CP/GetProductByIdJSON') ?>\\" + id,
        //     dataType: 'json',
        //     success: function(d) {
        //         console.log(d.data.Ma + "|" + d.data.TenSanPham + "|" + d.data.SoLuongTon);
        //         console.log(d);
        //         if (d.msg == "success") {
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Thêm vào phiếu trả thành công',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             });
        //         } else {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Thêm vào phiếu trả thất bại',
        //                 showConfirmButton: false,
        //             });
        //         }
        //     }
        // });
    }
</script>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>