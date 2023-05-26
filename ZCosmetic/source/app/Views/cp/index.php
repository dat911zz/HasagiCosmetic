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
    <?php if (count($dstk) == 0) { ?>
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
                    <?php foreach ($dstk as $tk) { ?>
                        <tr style="text-align: center;">
                            <td>
                                <?= $tk->Ma ?>
                            </td>
                            <td>
                                <?= $tk->TenDangNhap ?>
                            </td>
                            <td>
                                <?= $tk->HoVaTen ?>
                            </td>
                            <td style="text-align: left">
                                <div style="text-align: center">
                                    <?= $tk->MaNhomQuyen ?>
                                </div>
                            </td>
                            <td>
                                <a href="CP/AccountsDetail/<?= $tk->Ma ?>" class="btn" style="background-color: #84bcff; color: #fff; font-size: 1rem; "><i class="bi bi-card-list"></i></a>
                                <a href="CP/AccountsEdit/<?= $tk->Ma ?>" class="btn" style="background-color: #36ff00; color: #fff; font-size: 1rem; "><i class="bi bi-pencil"></i></a>
                                <a onclick="" class="btn" style="background-color: #ff4646; color: #fff; font-size: 1rem; "><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

</div>

<script>
    var confirmApproval = (functionName, objectName, url, stt, maNSD, maPhong, thoiGianMuon, thoiGianTra) => {
        Swal.fire({
            icon: 'warning',
            title: 'Cảnh Báo!',
            html: '<div>Bạn có chắc muốn thực hiện hành động này?</div>' +
                '<div>Chi tiết: <span style="font-weight: bold">' + functionName.toLowerCase() + ' ' + objectName.toLowerCase() + ' có số thứ tự là <span style="color: red">' + stt + '</span></span></div>',
            showCancelButton: true,
            confirmButtonText: functionName,
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        maNSD,
                        maPhong,
                        thoiGianMuon,
                        thoiGianTra
                    },
                    success: function(r) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành Công',
                            text: 'Đã ' + functionName.toLowerCase() + ' ' + objectName.toLowerCase() + ' có stt là ' + stt + ' !',
                            showConfirmButton: true,
                            timer: 2000
                        }).then((result) => {
                            location.reload();
                        });
                    }
                });
            }
        })
    };
    $(document).ready(function() {
        $('#table_id').DataTable().destroy();
        $('#table_id').DataTable({
            pageResize: false,
            scrollY: 500,
            scrollX: true,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'All'],
            ],
            displayLength: 5,
            dom: "<'toolbar'><'row'<'col-sm-5'l><'col-sm-7 t_filter'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-6'p>>",
            /*dom: "<'toolbar'>ftrip",*/
            fnInitComplete: function() {
                /*$('div.toolbar').html('Custom tool bar!');*/
            }
        });
    });
</script>

<!--== End News Letter Area Wrapper ==-->
<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>