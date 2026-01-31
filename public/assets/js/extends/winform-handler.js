$(document).on('submit', 'form[data-winform=true]', function (e) {

    e.preventDefault();

    let form = $(this);
    let btn  = form.find('button[type=submit]');
    
    if (form.data('loading')) return;

    form.data('loading', true);
    btn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'),
        type: form.find('input[name=_method]').val() || form.attr('method'),
        data: form.serialize(),

        beforeSend: function () {
            $.blockUI();
        },
        success: function (res) {
            if (res.success) {
                swalSuccess(res.message || 'Berhasil');
                $('#winform').modal('hide');
                if (window.productTable) {
                    window.productTable.ajax.reload(null, false);
                }
            }
        },
        error: function (xhr) {

            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                swalError(xhr.responseJSON);
            }
        },
        complete: function () {

            $.unblockUI();
            btn.prop('disabled', false);
            form.data('loading', false);
        }
    });
});
