@extends('/template')
@section('title','Halaman Ambil Obat')
@section('head')
<link rel="stylesheet" href="{{url('assets/vendor/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{url('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Apotik</h1>
</div>
<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nomor Kartu</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No. Hp</th>
                      <th>Keluarga</th>
                      <th>Ambil Obat</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pasien as $pasien)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$pasien->pasien->nomorkartu}}</td>
                      <td>{{$pasien->pasien->nama}}</td>
                      <td>{{$pasien->pasien->alamat}}</td>
                      <td>{{$pasien->pasien->hp}}</td>
                      <td>{{$pasien->pasien->keluarga}}</td>
                      <td><button class="btn btn-success btn-circle btn-sm obat" data-id="{{$pasien->id}}">
                        <i class="fas fa-check"></i>
                        </button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            <!-- alert -->
  @include('sweetalert::alert')
    <!-- Logout Modal-->


  <div class="modal fade" id="modalapotek" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Daftar Obat</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">

       <div class="row">
            <div class="card-body">
            <form action="" method="post" id='goto'>
            @csrf
              <div class="table-responsive">
                <table class="table table-bordered" id="tabledata" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NAMA OBAT</th>
                      <th>JUMLAH</th>
                    </tr>
                  </thead>
                  <tbody>              
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type='submit' class="btn btn-success">Kirim</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop


@section('foot')
  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/ambilobat.js')}}"></script>
    <script src="{{url('assets/vendor/select2/js/select2.full.min.js')}}"></script>
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
@endsection