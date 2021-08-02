<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
     @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;
         }
         body  {
           padding-top: 15px;
           padding-bottom: 10px ;
         }
      } 
.container {
position: relative;
  text-align: left;
  color: white;
  font-family: Arial;
}
.pemeriksaan {
  position: static;
 padding-top:7px;
  font-size: 15px;
  color: black;
  left: 2%;
}
.pemeriksaannominal {
  position: absolute;
  top: 130%;
  font-size: 70%;
  color: black;
  left: 25%;
}
.pendaftaran {
  position: static;
  top: 180%;
  font-size: 15px;
  color: black;
  left: 2%;
}
.pendaftarannominal {
  position: absolute;
  top: 180%;
  font-size: 70%;
  color: black;
  left: 25%;
}
.fortable {
  position: static;
  top: 230%;
  font-size: 70%;
  width: 45%;
  color: black;
  left: 2%;
  
}
.fortable1 {
  position: static;
  padding-bottom:12px;
  font-size: 70%;
  width: 45%;
  color: black;
  left: 2%;
  
}


table, td, th {
  border: 1px solid black;
  color: black;
  font-size: 110%;
}

table {
  border-collapse: collapse;
  width: 100%;

  top: 100%;
  

}
p{
  color: black;
}
th {
  text-align: left;
 
}
</style>
</head>
<body>
<div class="container">
  <img src="{{url('assets/img/invoicenew.png')}}" alt="Nature" style="width:47%;">
<div class="fortable1">
<div class="pendaftaran">Detail Biaya :</div>
@foreach($biaya as $biaya)
<div class="pemeriksaan">Biaya {{$biaya->nama}}<span class="tab" style="left:23%; position:absolute;">: Rp.{{$biaya->nominal}}</div>
@endforeach
</div>
  <div class="fortable">
        <table>
        <tr>
        <th>Nama Obat</th>
        <th>Banyaknya</th>
        <th>Harga Satuan</th>
        </tr>
        @foreach($obat as $obat)
        <tr>
        <td>{{$obat->nama}}</td>
        <td>{{$obat->jumlah}} {{$obat->satuan}}</td>
        <td>{{$obat->harga}}</td>
        </tr>
        @endforeach
        
      </table>
</div>

<div class="fortable2">
<p><strong>Total <span class="tab" style="margin-left:23px;">: Rp. {{$total}}</strong></p>
</div>
</div>

</body>

</html>
<script src=""></script> 
<script type="text/javascript">
   setTimeout(function() { 
        window.print();
        self.close();
   }, 1000);
   
</script>