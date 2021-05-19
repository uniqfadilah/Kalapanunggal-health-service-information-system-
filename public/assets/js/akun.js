$('.edit').on('click', function () {
    $('#modaledit').modal('show');
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: 'GET',
        url: '/akunapi',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $("#route").attr('action', '/akun/' + id);
            $('#nama').val(result.name);
            $('#email').val(result.email);
            $('#roles').val(result.role);
    },
        error: function () {
            console.log('false');
        }
    });

});

$('.pass').on('click', function () {
    $('#modalpass').modal('show');
    let id = $(this).data('id');
    $("#links").attr('action', '/akunpass/' + id);
    console.log(id);

});