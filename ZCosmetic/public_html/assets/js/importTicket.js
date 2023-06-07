console.log("-Import Ticket module loaded-");
function updatePos() {
    var updatePos = 1;
    $("table.products tbody .name").each(function (id, item) {
        $(item).parents("tr:first").find(".pos").val(parseInt(updatePos++ || 0));
    });
    rowid = updatePos;
}
var rowid = 0;
function addNewRow(data) {
    console.log(data);
    if (isNaN(parseFloat(rowid))) {
        rowid = 0;
    }
    rowid++;
    $('.last').removeClass('last');
    $('.products tbody tr').prop('onclick', null).off('click');

    $(".products tbody").append('<tr>'
        + ' <td class="delr" style="text-align: center"><i class="fa fa-times"></i></td>'
        + '<td><input type="text" disabled class="pos" maxlength="20" value="' + parseInt(rowid || 0) + '" /></td>'
        + '<td><input type="text" disabled class="code" maxlength="20" value="' + data.Ma + '"/></td>'
        + '<td><input type="text" disabled class="name" maxlength="800" value="' + data.Ten + '"/></td>'
        + '<td><input type="text" disabled class="unit" maxlength="20" value="' + data.DVT + '"/></td>'
        + '<td><input type="text" class="quantity align-right" "maxlength="18" value="1"/></td>'
        + '<td><input type="text" class="price align-right textr" maxlength="18" /></td>'
        + '<td><input type="text" class="total align-right textr" maxlength="18" /></td>'
        + '</tr>');
    bindEvents2Table();
}
function bindEvents2Table() {
    $('.products tbody .input').unbind();
    $(".products tbody .delr").on("click", function () {
        console.log("del row");
        var index = $(this).parents("tr:first").find(".pos");
        if ($(".products tbody tr").length >= 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Cảnh Báo!',
                html: '<div>Bạn có chắc muốn xóa dòng này?</div>',
                showCancelButton: true,
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(index).parents("tr:first").remove();
                    updatePos();
                }
            });
        }
    });
}
