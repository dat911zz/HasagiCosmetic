<?= $this->extend('layouts/admin_layout') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<style>
    .dataTables_filter>label,
    .dataTables_length>label {
        font-size: 1rem;
    }

    table.dataTable {
        /*table-layout: fixed;*/
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

    table.dataTable thead>tr>th {
        text-align: center;
        background-color: #333333;
        color: #ffffff;
    }
</style>
<h2 style="text-align: center">Danh sách người dùng</h2>
<div class="container" style="min-height: 500px">
    <?php

    use App\Models\LoaiTaiKhoanModel;
    use App\Models\NguoiDungModel;
    use App\Models\NhanVienModel;

    if (count($tks) == 0) { ?>
        <h5 style="color: orangered; text-align: center">Không có thông tin</h5>
    <?php } else { ?>
        <div class="table">
            <table class="table table-striped" id="table_id" width="100%" cellspacing="0">
                <colgroup>
                    <col style="width: 3%;">
                    <col style="width: 15%;">
                    <col style="width: 25%;">
                    <col style="width: 15%;">
                </colgroup>
                <thead>
                    <tr style="text-align: center">
                        <th>
                            Mã tài khoản
                        </th>
                        <th>
                            Tên đăng nhập
                        </th>
                        <th>
                            Tên người dùng
                        </th>
                        <th>
                            Nhóm
                        </th>
                        <th>
                            Hành động
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tks as $tk) { ?>
                        <tr style="text-align: center;">
                            <td>
                                <?= $tk['Ma'] ?>
                            </td>
                            <td>
                                <?= $tk['TenDangNhap'] ?>
                            </td>
                            <td>
                                <?php
                                switch ($tk['LoaiTaiKhoan']) {
                                    case 1:
                                        $nv = (new NhanVienModel())->findAll();
                                        if (isset((new NhanVienModel())->getNVByID($tk['Ma'])['HoVaTen'])) {
                                            echo (new NhanVienModel())->getNVByID($tk['Ma'])['HoVaTen'];
                                        }
                                        break;
                                    case 2:
                                        $nd = (new NguoiDungModel())->findAll();
                                        if (isset((new NguoiDungModel())->getNDByID($tk['Ma'])['HoVaTen'])) {
                                            echo (new NguoiDungModel())->getNDByID($tk['Ma'])['HoVaTen'];
                                        }
                                        break;
                                }
                                ?>
                            </td>
                            <td style="text-align: left">
                                <div style="text-align: center">
                                    <?= (new LoaiTaiKhoanModel())->getLoaiByID($tk['LoaiTaiKhoan'])['Ten'] ?>
                                </div>
                            </td>
                            <td>
                                <a href="/CP/Account/<?= $tk['Ma'] ?>" class="btn" style="background-color: #84bcff; color: #fff; font-size: 1rem; "><i class="bi bi-card-list"></i></a>
                                <a onclick="delAcc(<?= $tk['Ma'] ?>)" class="btn" style="background-color: #ff4646; color: #fff; font-size: 1rem; "><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

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