function winform(link, method, title = '', textClass = 'text-base') {
    if (window.winformLoading) return;
    window.winformLoading = true;

    $.ajax({
        url: link,
        method: method,
        data: { is_component: true },

        beforeSend: function () {
            $.blockUI({
                message: '',
                css: {
                    backgroundColor: 'transparent',
                    border: 'none'
                }
            });
        },

        success: function (response) {
            $('#winformTitle')
                .removeClass('text-primary text-danger text-success text-warning text-info')
                .addClass(textClass)
                .html(title);

            $('#winformContent').html(response);
            $('#winform').modal('show');
        },

        complete: function () {
            $.unblockUI();
            window.winformLoading = false;
        }
    });
}
