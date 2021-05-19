$('.editbiaya').on('click', function () {
    $('#modaledit').modal('show');
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: 'GET',
        url: '/biayaapi',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $("#link").attr('action', '/biaya/' + id);
            $('#nama').val(result.nama);
            $('#nominal').val(result.nominal);
        },
        error: function () {
            console.log('false');
        }
    });

});