
$('.obat').on('click', function () {
    $("#tabledata tbody:last-child").empty();
    $('#modalapotek ').modal('show');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: '/ambilobatapi/'+id,
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $.each(result.obat,(i)=>{
                $('#tabledata tbody:last-child').append(
                    `<tr>
                    <td>`+result.obat[i].oba.nama+`</td>
                    <td>`+result.obat[i].jumlah+`</td>
                    </tr>
                    `
                );
            })
            
        },
        error: function () {
            console.log('false');
        }
    });
  
    $("#goto").attr('action', '/apotikselesai/' + id);

  
});

