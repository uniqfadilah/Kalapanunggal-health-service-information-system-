@extends('/template')
@section('title','Halaman Resepsionis')
@section('head')
<link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pasien BPJS</h1>
</div>
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Modal">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Pasien</span>
            </button>
            </div>
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
                      <th>Berobat</th>
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
                      <td><button class="btn btn-success btn-circle btn-sm berobat" data-id="{{$pasien->id}}">
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
        <input type="hidden" name='keterangan' value='bpjs' class="form-control form-control-user" placeholder="Keluarga">
        </div>
        <div class="modal-footer">
            <button type='submit' class="btn btn-success" href="login.html">Simpan</button>
            </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalberobat" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Berobat Pasien</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post" id="link">
        @csrf
        <label for="keluhan">Anamnesis</label>
        <textarea type="text" name='keluhan' class="form-control form-control-user" id="keluhan"></textarea>
        <br>
        <select class="custom-select" name="dokter" id='dokter'>
          <option selected>Pilih Dokter</option>
          @foreach($dokter as $dokter)
          <option value="{{$dokter->id}}">{{$dokter->nama}} ( {{$dokter->spesialis}} )</option>
          @endforeach
        </select>
        </div>
        <div class="modal-footer">
            <button type='submit' class="btn btn-success" href="login.html">Kirim</button>
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
    <script src="{{url('assets/js/berobat.js')}}"></script>

@endsection