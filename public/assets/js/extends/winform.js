function winform(link, method, title = '', textClass = 'text-base') {
    $.ajax({
        url: link,
        method: method,
        data: { is_component: true },
        success: function (response) {
            $('#winformTitle').removeClass('text-primary text-danger text-success text-warning text-info');
            $('#winformTitle').addClass(textClass).html(title);
            $('#winformContent').html(response);
            $('#winform').modal('show');
        }
    });
}
