// Winform AJAX Submit Handler
$(document).on('submit', 'form[data-winform=true]', function (e) {
    e.preventDefault();

    let form = $(this);
    let btn  = form.find('button[type=submit]');

    btn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'),
        type: form.find('input[name=_method]').val() || form.attr('method'),
        data: form.serialize(),
        success: function (res) {
            if (res.success) {
                $('#winform').modal('hide');

                if ($.fn.DataTable.isDataTable('.dt-multilingual')) {
                    $('.dt-multilingual')
                        .DataTable()
                        .ajax.reload(null, false);
                }
            }
        },
        error: function (xhr) {
            alert('Gagal menyimpan data');
        },
        complete: function () {
            btn.prop('disabled', false);
        }
    });
});
