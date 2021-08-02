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
.nomor {
  position: absolute;
  top: 30%;
  font-size: 80%;
  color: black;
  left: 15%;
}
.nama {
  position: absolute;
  top: 41%;
  font-size: 80%;
  color: black;
  left: 15%;
}
.alamat {
  position: absolute;
  top: 53%;
  font-size: 79%;
  color: black;
  left: 15%;
}
.keluarga {
  position: absolute;
  top: 64%;
  font-size: 79%;
  color: black;
  left: 15%;
}

</style>
</head>
<body>
<div class="container">
  <img src="{{url('assets/img/kartunew.png')}}" alt="Nature" style="width:48%;">
  <div class="nomor">{{$pasien->nomorkartu}}</div>
  <div class="nama">{{$pasien->nama}}</div>
  <div class="alamat">{{$pasien->alamat}}</div>
  <div class="keluarga">{{$pasien->keluarga}}</div>

</div>

</body>

</html> 
<script type="text/javascript">
   setTimeout(function() { 
        window.print();
        self.close();
   }, 1000);
   
</script>