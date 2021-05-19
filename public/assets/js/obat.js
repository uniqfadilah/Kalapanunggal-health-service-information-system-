$('.editobat').on('click', function () {
    $('#modaledit').modal('show');
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: 'GET',
        url: '/obatapi',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $("#link").attr('action', '/obat/' + id);
            $('#nama').val(result.nama);
            $('#jenis').val(result.jenis);
            $('#harga').val(result.harga);
            $('#satuan').val(result.satuan);
        },
        error: function () {
            console.log('false');
        }
    });

});