<?= $this->extend('layouts/admin_layout') ?>

    <!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body {
            color: #ffffff;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #299be4;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn {
            color: #FFFFFF;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn:hover, .table-title .btn:focus {
            color: #FFFFFF;
            background: #f2f2f2;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #FFFFFF;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #FFFFFF;
            display: inline-block;
            text-decoration: none;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.Inserts {
            color: #2196F3;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td a.update {
            color: #FFC107;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }
        .text-success {
            color: #10c469;
        }
        .text-info {
            color: #62c9e8;
        }
        .text-warning {
            color: #FFC107;
        }
        .text-danger {
            color: #ff5b5b;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        .action {
            width: 13%;
        }
    </style>
    <h2 style="text-align: center">Báo Cáo Tiêu Thụ</h2>
    <div class="container" style="min-height: 500px">
    <div class="table">
        <table class="table table-striped" id="table_id" width="100%" cellspacing="0">
            <colgroup>
                <col style="width: 3%;">
                <col style="width: 50%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
            <tr style="text-align: center; background: black; color: wheat;">
                <th>
                    Mã
                </th>
                <th>
                    Tên
                </th>
                <th>
                    Giá nhập
                </th>
                <th>
                    Giá bán
                </th>
                <th>
                    Đơn vị tính
                </th>
                <th>
                    SL nhập vào
                </th>
                <th>
                    SL bán ra
                </th>
                <th>
                    SL tồn
                </th>
                <th>
                    TT nhập vào
                </th>
                <th>
                    TT bán ra
                </th>
                <th>
                    Doanh thu
                </th>
            </tr>
            </thead>
            <tbody>
                <tr style="text-align: center;">
                    <td>123
                    </td>
                    <td style="text-align: left">456
                    </td>
                    <td>789

                    </td>
                    <td>
                        111111
                    </td>
                    <td>2222
                    </td>
                    <td>2222
                    </td>
                    <td>2222
                    </td>
                    <td>2222
                    </td>
                    <td>2222
                    </td>
                    <td>2222
                    </td>
                    <td>2222
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <script>
        var delAcc = (id) => {
            Swal.fire({
                icon: 'warning',
                title: 'Cảnh Báo!',
                html: '<div>Bạn có chắc muốn xóa tại khoản có mã '+ id +' ?</div>',
                showCancelButton: true,
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: '/Ajax/DeleteAccount/' + id,
                        dataType: "json",
                        success: function(data) {
                            console.log(data.msg);
                            if (data.msg == 'ok') {
                                console.log(data.d);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thành Công',
                                    text: 'Xóa tài khoản ' + data.target + ' thành công!',
                                    showConfirmButton: true,
                                    timer: 2500
                                }).then(() =>{
                                    location.reload();
                                })
                            }
                            else {
                                console.log(data.d);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Thất Bại',
                                    html: '<span style="font-weight: bold">Có lỗi đã xảy ra, vui lòng thử lại! <br/>Chi tiết: </span><span style="color: red;">' + data.msg + '</span>',
                                    showConfirmButton: true,
                                    timer: 3500
                                })
                            }
                        }
                    });
                }
            })
        };
        $(document).ready(function () {
            $('#table_id').DataTable().destroy();
            $('#table_id').DataTable({
                pageResize: false,
                scrollY: 500,
                scrollX: true,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'Tất cả'],
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
                dom: "<'toolbar'><'row'<'col-sm-5'l><'col-sm-7 t_filter'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-6'p>>",
                fnInitComplete: function () {
                    /*$('div.toolbar').html('Custom tool bar!')   */
                }
            });
        });
    </script>

    <!--== End News Letter Area Wrapper ==-->
    <!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>