<?= $this->extend('layouts/admin_layout') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<head>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
        </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
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
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    table.table th:nth-child(2),
    table.table td:nth-child(2) {
        width: 200px;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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

    .table-title .btn:hover,
    .table-title .btn:focus {
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

    table.table tr th,
    table.table tr td {
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

    .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 5px;
        margin-bottom: 10px;
    }

    .dt-buttons .dt-button {
        padding: 5px 10px;
        font-size: 13px;
    }

    .dt-button {
        align-items: center;
        appearance: none;
        background-color: #fff;
        border-radius: 24px;
        border-style: none;
        box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px, rgba(0, 0, 0, .14) 0 6px 10px 0, rgba(0, 0, 0, .12) 0 1px 18px 0;
        box-sizing: border-box;
        color: #3c4043;
        cursor: pointer;
        fill: currentcolor;
        font-family: "Google Sans", Roboto, Arial, sans-serif;
        font-weight: 500;
        height: 48px;
        letter-spacing: .25px;
        line-height: normal;
        max-width: 100%;
        overflow: visible;
        position: relative;
        text-align: center;
        text-transform: none;
        transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1), opacity 15ms linear 30ms, transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: auto;
        will-change: transform, opacity;
        z-index: 0;
    }

    .dt-button:hover {
        background: #F6F9FE;
        color: #174ea6;
    }

    .dt-button:active {
        box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
        outline: none;
    }

    .dt-button:focus {
        outline: none;
        border: 2px solid #4285f4;
    }

    .dt-button:not(:disabled) {
        box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

    .dt-button:not(:disabled):hover {
        box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
    }

    .dt-button:not(:disabled):focus {
        box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

    .dt-button:not(:disabled):active {
        box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
    }

    .dt-button:disabled {
        box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
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
        border: none;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: black;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: black;
        background-color: white;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: black;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none !important;
        border: none;
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
body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Báo Cáo Tiêu Thụ</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                    class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="start_date" placeholder="  Từ ngày" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                    class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="end_date" placeholder="  Đến ngày" readonly>
                    </div>
                </div>
            </div>
            <div>
                <button id="filter" class="btn btn-outline-info ">Filter</button>
                <button id="reset" class="btn btn-outline-warning">Reset</button>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless display nowrap" id="records" style="width:100%">
                            <thead>
                                <tr>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
</script>z
<script>
    function fetch(start_date, end_date) {
        console.log(222222222)
        $.ajax({
            url: "<?= base_url('/Ajax/fetch') ?>",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function (data) {
                console.log(data)
                var buttons = $.fn.dataTable.Buttons.defaults.dom.button;
                // Datatables
                var i = "1";
                $(buttons).addClass('dt-button');


                $('#records').DataTable({
                    "data": data,
                    language: {
                "lengthMenu": "Hiện _MENU_ trường",
                "zeroRecords": "Không tìm thấy dữ liệu!",
                "info": "_PAGE_ / _PAGES_",
                "infoEmpty": "Không có dữ liệu!",
                "infoFiltered": "(Lọc dữ liệu từ _MAX_ bản ghi)",
                "loadingRecords": "Đang tải...",
                "processing": "",
                "search": "Tìm kiếm:",
            },
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        {
                            extend: 'copy',
                            text: 'Copy',
                            className: 'dt-button'
                        },
                        {
                            extend: 'csv',
                            text: 'CSV',
                            className: 'dt-button'
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            className: 'dt-button'
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF',
                            className: 'dt-button'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            className: 'dt-button'
                        }
                    ],
                    // responsive
                    "responsive": true,
                    "columns": [{
                        "data": "Ma",
                        "render": function (data, type, row, meta) {
                            return `${row.Ma}`;
                        }
                    },
                    {
                        "data": "TenSanPham",
                        "render": function (data, type, row, meta) {
                            return `${row.TenSanPham}`;
                        }
                    },
                    {
                        "data": "GiaNhap",
                        "render": function (data, type, row, meta) {
                            return `${row.GiaNhap}`;
                        }
                    },
                    {
                        "data": "Gia",
                        "render": function (data, type, row, meta) {
                            return `${row.Gia}`;
                        }
                    },
                    {
                        "data": "Ten"
                        ,
                        "render": function (data, type, row, meta) {
                            return `${row.Ten}`;
                        }
                    },
                    {
                        "data": "SoLuong",
                        "render": function (data, type, row, meta) {
                            return `${row.SoLuong}`;
                        }
                    },
                    {
                        "data": "BANRA",
                        "render": function (data, type, row, meta) {
                            return `${row.BANRA}`;
                        }
                    },
                    {
                        "data": "SoLuongTon",
                        "render": function (data, type, row, meta) {
                            return `${row.SoLuongTon}`;
                        }
                    },
                    {
                        "data": "TONGTIENNHAPVAO",
                        "render": function (data, type, row, meta) {
                            return `${row.TONGTIENNHAPVAO}`;
                        }
                    },
                    {
                        "data": "TONGTIENBANRA",
                        "render": function (data, type, row, meta) {
                            return `${row.TONGTIENBANRA}`;
                        }
                    },
                    {
                        "data": "DOANHTHU",
                        "render": function (data, type, row, meta) {
                            return `${row.DOANHTHU}`;
                        }
                    }
                    ]
                });
            }
        });
    }
    fetch();

    // Filter

    $(document).on("click", "#filter", function (e) {
        e.preventDefault();

        $start_date = $("#start_date").val();
        $end_date = $("#end_date").val();

        if ($start_date == "" || $end_date == "") {
            alert("Chưa chọn ngày bắt đầu hoặc ngày kết thúc");
        } else {
            $('#records').DataTable().destroy();
            console.log(111111111)
            fetch($start_date, $end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function (e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().destroy();
        fetch();
    });
</script>

<!--== End News Letter Area Wrapper ==-->
<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>