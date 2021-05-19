@extends('/template')
@section('title','Kelola Dokter')
@section('head')
<link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Dokter</h1>
</div>
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Modal">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Dokter</span>
            </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Spesialis</th>
                      <th>Kontak</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($dokter as $dokter)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$dokter->nama}}</td>
                      <td>{{$dokter->spesialis}}</td>
                      <td>{{$dokter->hp}}</td>
                      <form action="dokter/{{$dokter->id}}" method="post">
                      @method('delete')
                      @csrf
                        <td> 
                        <button class="btn btn-danger btn-icon-split btn-sm">
                          <span class="text">Hapus</span>
                          </button></i>
                           <button type="button" class="btn btn-warning btn-icon-split btn-sm editdokter" data-id="{{$dokter->id}}">
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
  <div class="modal fade" id="Modal" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Tambah Data Dokter</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/dokter" method="post">
        @csrf
        <input type="text" name='nama' class="form-control form-control-user" placeholder="Nama">
        <br>
        <input type="text" name='spesialis' class="form-control form-control-user" placeholder="Spesialis">
        <br>
        <input type="number" name='hp' class="form-control form-control-user" placeholder="Kontak">
        <br>
        </div>
        <div class="modal-footer">
            <button type='submit' class="btn btn-success">Simpan</button>
            </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modaledit" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Edit Data Dokter</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post" id="link">
        @csrf
        @METHOD('PUT')
        <input type="text" name='nama' id="nama" class="form-control form-control-user" placeholder="Nama">
        <br>
        <input type="text" name='spesialis' id="spesialis" class="form-control form-control-user" placeholder="Spesialis">
        <br>
        <input type="number" name='hp' id="hp" class="form-control form-control-user" placeholder="Kontak">
        <br>
        </div>
        <div class="modal-footer">
            <button type='submit' class="btn btn-success">Simpan</button>
            </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
            <!-- alert -->
  @include('sweetalert::alert')
@stop
  <!-- Logout Modal-->


@section('foot')
  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('assets/js/dokter.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>>

@endsection