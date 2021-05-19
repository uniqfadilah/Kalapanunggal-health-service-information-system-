@extends('/template')
@section('title','Cetak Ulang Kartu')
@section('head')
<link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cetak Ulang Kartu</h1>
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
                      <th>Cetak</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pasien as $pasien)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$pasien->nomorkartu}}</td>
                      <td>{{$pasien->nama}}</td>
                      <td>{{$pasien->alamat}}</td>
                      <td>{{$pasien->hp}}</td>
                      <td>{{$pasien->keluarga}}</td>
                      <td><a href="/cetak/{{$pasien->id}}" target="_blank" class="btn btn-success btn-circle btn-sm">
                        <i class="fas fa-check"></i>
                        </a></td>
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
    <div class="modal fade" id="Modal" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Tambah Data Pasien</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/tambahpasien" method="post">
        @csrf
        <input type="number" name='no' class="form-control form-control-user" placeholder="Nomor Kartu">
        <br>
        <input type="text" name='nama' class="form-control form-control-user" placeholder="Nama">
        <br>
        <input type="text" name='alamat' class="form-control form-control-user" placeholder="Alamat">
        <br>
        <input type="number" name='hp' class="form-control form-control-user" placeholder="Kontak">
        <br>
        <input type="text" name='keluarga' class="form-control form-control-user" placeholder="Keluarga">
        <input type="hidden" name='keterangan' value='nonbpjs' class="form-control form-control-user" placeholder="Keluarga">
        </div>
        <div class="modal-footer">
            <button type='submit' class="btn btn-success" href="login.html">Simpan dan Cetak Kartu</button>
            </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
@stop


@section('foot')
  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>>

@endsection