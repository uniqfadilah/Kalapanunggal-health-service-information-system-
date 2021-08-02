@extends('/template')
@section('title','Halaman Resepsionis')
@section('head')
<link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
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
                      <th>Keterangan</th>
                      <th>Aksi</th>
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
                      <td>@if($pasien->keterangan == "nonbpjs") UMUM @else BPJS @endif </td>
                      <form action="/pasien/{{$pasien->id}}" method="post">
                      @method('delete')
                      @csrf
                        <td> 
                        <button class="btn btn-danger btn-icon-split btn-sm">
                          <span class="text">Hapus</span>
                          </button></i>
                           <button type="button" class="btn btn-warning btn-icon-split btn-sm edit" data-id="{{$pasien->id}}">
                          <span class="text">Edit</span>
                           </button></i>
                          </td>
                        </form>
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
    <div class="modal fade" id="modaledit" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Tambah Data Pasien</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post" id='link'>
        @method('PUT')
        @csrf
        <input type="number" name='no' id='no' class="form-control form-control-user" placeholder="Nomor Kartu">
        <br>
        <input type="text" name='nama' id='nama' class="form-control form-control-user" placeholder="Nama">
        <br>
        <input type="text" name='alamat' id='alamat' class="form-control form-control-user" placeholder="Alamat">
        <br>
        <input type="number" name='hp' id='hp' class="form-control form-control-user" placeholder="Kontak">
        <br>
        <input type="text" name='keluarga' id='keluarga' class="form-control form-control-user" placeholder="Keluarga">
        <input type="hidden" name='status' id='status' class="form-control form-control-user" placeholder="Keluarga">
        <br>
        <select class="custom-select" name="role" id='role'>
          <option selected>Pilih hak Akses</option>
          <option value="bpjs">BPJS</option>
          <option value="nonbpjs">NON-BPJS</option>
        </select>
        <br>
        </div>
        <div class="modal-footer">
            <button type='submit' class="btn btn-success" >Simpan</button>
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
  <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>
    <script src="{{url('assets/js/pasien.js')}}"></script>

@endsection