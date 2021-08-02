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
  font-size: 17px;
  width: 50%;
  color: black;
  left: 2%;
  
}


table, td, th {
  border: 1px solid black;
  color: black;

}

table {
  border-collapse: collapse;
  width: 200%;

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
  <img src="{{url('assets/img/invoicenew.png')}}" alt="Nature" style="width:100%;">

  <div class="fortable">
        <table>
        <tr>
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Keluhan</th>
        <th>Dokter</th>
        <th>Penanganan</th>
        </tr>
        @foreach($berobat as $berobat)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>@if($berobat->pasien){{$berobat->pasien['nama']}}@endif</td>
        <td>{{$berobat->keluhan}}</td>
        <td>{{$berobat->dokter->nama}}</td>
        <td>2{{$berobat->created_at->isoFormat('D MMMM YYYY')}}</td>
        </tr>
        @endforeach

      
        
      </table>
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