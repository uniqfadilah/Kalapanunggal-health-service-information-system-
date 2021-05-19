$('.editdokter').on('click', function () {
    $('#modaledit').modal('show');
    let id = $(this).data('id');
    console.log(id);
    $.ajax({
        type: 'GET',
        url: '/dokterapi',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $("#link").attr('action', '/dokter/' + id);
            $('#nama').val(result.nama);
            $('#spesialis').val(result.spesialis);
            $('#hp').val(result.hp);
        },
        error: function () {
            console.log('false');
        }
    });

});