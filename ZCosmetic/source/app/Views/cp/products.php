<?= $this->extend('layouts/admin_layout') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<style>
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
        text-align: center;
        vertical-align: middle;
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

<body>
    <div class="test">
        <div class="header ml-0">
            <h2 class="position-relative" style="color: #440ccb; text-transform: uppercase; "><?= $title ?></h2>
            <hr class="bg-dark">
            </hr>
        </div>
    </div>
    <!-- <div style="float: right; margin-bottom: 10px;">
        <a href="#" class="btn btn-success m-1">
            <span>
                <span><img src="https://img.icons8.com/office/22/null/add--v1.png" /></span> Thêm SP
            </span>
        </a>
        <a href="#" class="btn btn-success m-1"><span><img src="https://img.icons8.com/doodle/22/null/microsoft-excel-2019.png" /></span> Thêm Từ File</a>
        <a href="#" class="btn btn-success m-1"><span><img src="https://img.icons8.com/arcade/22/null/print.png" /></span> Xuất File</a>

    </div> -->
    <div class="container">
        <div class="table">
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
                <tbody>
                    <?php

                    use App\Models\DVTModel;
                    use App\Models\LoaiSPModel;
                    use App\Models\SanPhamModel;

                    $db = new DatabaseHelper();

                    // $sps = (new SanPhamModel())->findAll();
                    if (count($prods) == 0) {
                        echo '<h5 style="color: orangered; text-align: center">Không có thông tin</h5>';
                    } else {
                        foreach ($prods as $sp) { ?>
                            <tr>
                                <td class="text-center MaHinh"><img src="../../assets/Product_Images/<?= $sp->MaHinh ?>.jpg" style="width: 50px; object-fit:contain" /></td>
                                <td class="text-center"><?= $sp->Ma ?></td>
                                <td style="text-align: justify;">
                                    <span class="short-tent">
                                        <?= $sp->TenSanPham ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?= $sp->SoLuongTon ?>
                                </td>
                                <td class="text-center">
                                    <?= $sp->XuatXu ?>
                                </td>
                                <td class="text-center">
                                    <?= $sp->ThuongHieu ?>
                                </td>
                                <td class="text-center">
                                    <?php

                                    // (new LoaiSPModel())->find($sp->MaLoai)['Ten']
                                    ?></td>
                                <td class="text-center">
                                    <?php
                                    //  (new DVTModel())->find($sp->MaDVT)['Ten'] 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?= $sp->GiamGia ?>
                                </td>
                                <td>
                                    <div style="text-align: justify;" class="short-tent">
                                        <?= $sp->MoTa ?>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-primary action-btn-add-product" data-id-product="<?= $sp->Ma ?>" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal"><i class="bi bi-cart-plus"></i></button>
                                    <!-- <a href="/CP/Account/<?= 1 ?>" class="btn" style="background-color: #84bcff; color: #fff; font-size: 1rem; "><i class="bi bi-card-list"></i></a>
                                    <a onclick="delAcc(<?= 1 ?>)" class="btn" style="background-color: #ff4646; color: #fff; font-size: 1rem; "><i class="bi bi-trash"></i></a> -->
                                </td>
                            </tr>
                        <?php }
                        ?>

                    <?php }
                    ?>
                </tbody>
            </table>

            <aside class="product-cart-view-modal modal fade" id="action-QuickViewModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body" style="background-color: #fff;">
                            <div class="product-quick-view-content">
                                <button style="color:#000;" type="button" class="btn-close" data-bs-dismiss="modal">
                                    <span class="fa fa-close"></span>
                                </button>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--== Start Product Thumbnail Area ==-->
                                            <div class="product-single-thumb">
                                                <img src="../../assets/images/shop/quick-view1.webp" width="544" height="560" alt="Image-HasTech">
                                            </div>
                                            <!--== End Product Thumbnail Area ==-->
                                        </div>
                                        <div class="col-lg-6">
                                            <!--== Start Product Info Area ==-->
                                            <div class="product-details-content">
                                                <h3 class="product-details-title shorten-text--two-row">Offbline Instant Age Rewind Eraser.</h3>
                                                <div class="product-details-review mb-5">
                                                    <div class="product-review-icon">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                    <button type="button" class="product-review-show">150 reviews</button>
                                                </div>
                                                <p class="mb-6 shorten-text--three-row" style="text-align: justify;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, repellendus. Nam voluptate illo ut quia non sapiente provident alias quos laborum incidunt, earum accusamus, natus. Vero pariatur ut veniam
                                                    sequi amet consectetur.</p>
                                                <div class="product-details-pro-qty" style="display: flex; align-items: center; justify-content: space-between;">
                                                    <div class="row" style="width:100%;">
                                                        <div class="pro-qty col-5">
                                                            <input type="text" title="Quantity" value="1">
                                                        </div>
                                                        <div class="col-7">
                                                            <select style="    width: 100%; height: 100%; border-radius: 10px; padding: 10px;">
                                                                <?php
                                                                $ctys = $db->executeReader('SELECT * FROM tbl_nhacungcap');
                                                                foreach ($ctys as $cty) {
                                                                ?>
                                                                    <option value="<?= $cty->Ma ?>"><?= $cty->Ten ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details-action">
                                                    <div class="prices">
                                                        <span class="price" style="font-size: 20px;">100.000 VNĐ</span>
                                                    </div>
                                                </div>
                                                <div class="product-details-cart-wishlist" style="    margin-top: 10px; margin-left: 0;">
                                                    <button type="button" class="btn btn-primary add-cart" style="background-color: blue; border-color: blue; min-width:160px; width: 50%;" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Nhập hàng</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--== End Product Info Area ==-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

    </div>
</body>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
    $('input[name="TenSanPham"]').on('keydown', function(e) {
        console.log(e.keyCode);
        // updateCart($(this).data('id-product'), $(this).val(), $(this).data('id-user'), $(this).data('price'));
    });
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
                        return '<div class="text-center"><?= $db->executeReader("SELECT * FROM tbl_loaisanpham WHERE Ma = ?", array($sp->MaLoai))[0]->Ten; ?></div>';
                    }
                },
                {
                    "data": 7,
                    render: function(data) {
                        return '<div class="text-center"><?= $db->executeReader("SELECT * FROM tbl_dvt WHERE Ma = ?", array($sp->MaDVT))[0]->Ten; ?></div>';
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
                        console.log(data, type, row);
                        return '<button class="btn btn-primary action-btn-add-product" data-id-product="' + row[1] + '" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal"><i class="bi bi-cart-plus"></i></button>';
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
</script>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>