$('.berobat').on('click', function () {
    $('#modalberobat').modal('show');
    let id = $(this).data('id');
    $("#link").attr('action', '/berobat/' + id);
    console.log(id);
});
$('.obat').on('click', function () {
    $('#modalberobat').modal('show');
    let id = $(this).data('id');
    $("#link").attr('action', '/detailobat/' + id);
    console.log(id);
});

$('.tambah').on('click', function(){
    var obatid= $('#obat').val();
    var nama=$('#obat option:selected').text();
    var jumlah= $('#jumlah').val()
    if(jumlah==''){
        alert("Isi Inputan Dengan Lengkap");
    }
    else{
        console.log(nama)
        $('#tabledata tbody:last-child').append(
            `<tr>
            <td>`+nama+`</td>
            <td style="display:none"><input name="nama[]" type="hidden" value=`+obatid+`></td>
            <td>`+jumlah+`</td>
            <td style="display:none"><input name="jumlah[]" type="hidden" value=`+jumlah+`></td>
            </tr>
            `
        );
    }
})