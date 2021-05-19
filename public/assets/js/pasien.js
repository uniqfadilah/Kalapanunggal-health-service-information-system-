$('.edit').on('click', function () {
    $('#modaledit').modal('show');
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: 'GET',
        url: '/pasienapi',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $("#link").attr('action', '/pasien/' + id);
            $('#no').val(result.nomorkartu);
            $('#nama').val(result.nama);
            $('#alamat').val(result.alamat);
            $('#hp').val(result.hp);
            $('#keluarga').val(result.keluarga);
            $('#role').val(result.keterangan);
            $('#status').val(result.status);
     
        },
        error: function () {
            console.log('false');
        }
    });

});