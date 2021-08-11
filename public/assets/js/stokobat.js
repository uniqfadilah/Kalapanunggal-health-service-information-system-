$('.editobat').on('click', function () {
    $('#modaledit').modal('show');
    let id = $(this).data('id');
    $("#goto").attr('action', '/kelolastok/' + id);
});