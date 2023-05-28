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

    input {
        width: 100%;
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
    <div style="float: right; margin-bottom: 10px;">
        <a href="#" class="btn btn-success m-1">
            <span>
                <span><img src="https://img.icons8.com/office/22/null/add--v1.png" /></span> Thêm SP
            </span>
        </a>
        <a href="#" class="btn btn-success m-1"><span><img src="https://img.icons8.com/doodle/22/null/microsoft-excel-2019.png" /></span> Thêm Từ File</a>
        <a href="#" class="btn btn-success m-1"><span><img src="https://img.icons8.com/arcade/22/null/print.png" /></span> Xuất File</a>

    </div>
    <div class="container">
        <div class="table">
            <table class="table" id="table_id" width="100%" cellspacing="0">
                <colgroup>
                    <col style="width: 15%;">
                    <col style="width: 8%;">
                    <col style="width: 15%;">
                    <col style="width: 8%;">
                    <col style="width: 8%;">
                    <col style="width: 7%;">
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
                                <td class="text-center MaHinh"><img src="../../assets/Product_Images/<?= $sp->MaHinh ?>.jpg" style="height: 10rem; width: 100%" /></td>
                                <td class="text-center"><?= $sp->Ma ?></td>
                                <td class="text-center">
                                    <input type="text" readonly name="TenSanPham" value="<?= $sp->TenSanPham ?>">
                                </td>
                                <td class="text-center">
                                    <input type="text" name="SoLuongTon" value="<?= $sp->SoLuongTon ?>">
                                </td>
                                <td class="text-center">
                                    <input type="text" name="XuatXu" value="<?= $sp->XuatXu ?>">
                                </td>
                                <td class="text-center">
                                    <input type="text" name="ThuongHieu" value="<?= $sp->ThuongHieu ?>">
                                </td>
                                <td class="text-center">
                                    <?php
                                    echo $db->executeReader("SELECT * FROM tbl_loaisanpham WHERE Ma = ?", array($sp->MaLoai))[0]->Ten;
                                    // (new LoaiSPModel())->find($sp->MaLoai)['Ten']
                                    ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $db->executeReader("SELECT * FROM tbl_dvt WHERE Ma = ?", array($sp->MaDVT))[0]->Ten;
                                    //  (new DVTModel())->find($sp->MaDVT)['Ten'] 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <input type="number" name="GiamGia" value="<?= $sp->GiamGia ?>">
                                </td>
                                <td>
                                    <div class="text-center short-tent">
                                        <textarea name="MoTa" cols="30" rows="5"><?= $sp->MoTa ?></textarea>
                                    </div>
                                </td>
                                <!-- <td>
                                    <a href="/CP/Account/<?= 1 ?>" class="btn" style="background-color: #84bcff; color: #fff; font-size: 1rem; "><i class="bi bi-card-list"></i></a>
                                    <a onclick="delAcc(<?= 1 ?>)" class="btn" style="background-color: #ff4646; color: #fff; font-size: 1rem; "><i class="bi bi-trash"></i></a>
                                </td> -->
                            </tr>
                        <?php }
                        ?>

                    <?php }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</body>
<script>
    $('input[name="TenSanPham"]').on('keydown', function(e) {
        console.log(e.keyCode);
        // updateCart($(this).data('id-product'), $(this).val(), $(this).data('id-user'), $(this).data('price'));
    });
    // $('.TenSanPham').on('focusout', function() {
    //     if ($(this).val().length == 0 || $(this).val() == 0) {
    //         $(this).val(1);
    //     }
    //     // updateCart($(this).data('id-product'), $(this).val(), $(this).data('id-user'), $(this).data('price'));
    // })
    $(document).ready(function() {
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
            fnInitComplete: function() {
                /*$('div.toolbar').html('Custom tool bar!')   */
            }
        });
    });
</script>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>