
$('.kasir').on('click', function () {
    $('#modalkasir ').modal('show');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: '/kasirapi/'+id,
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            var uang = result;
            $('#nominal').html(result);
            $('#atas').html('TOTAL PEMBAYARAN')
            $('.kembalian').on('click', function(){
                var uang=$('#uang').val();
                var kembalian= uang-result;
                var head=$('#atas').html();
        
                    $('#atas').html('UANG KEMBALIAN');
                    $('#nominal').html(kembalian);
                
            
            })
        },
        error: function () {
            console.log('false');
        }
    });
    $("#link").attr('action', '/selesaiberobat/' + id);

  
});

