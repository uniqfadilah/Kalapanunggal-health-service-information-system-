@extends('/template')
@section('title','Kelola Akun')
@section('head')
<link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Akun</h1>
</div>
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Modal">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Akun</span>
            </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Hak Akses</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($akun as $akun)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$akun->name}}</td>
                      <td>{{$akun->role}}</td>
                      <td>{{$akun->email}}</td>
                      <form action="akun/{{$akun->id}}" method="post">
                      @method('delete')
                      @csrf
                        <td> 
                        <button type='button' class="btn btn-info btn-icon-split btn-sm edit"  data-id="{{$akun->id}}">
                          <span class="text">Edit</span>
                          </button>
                        <button type='button' class="btn btn-warning btn-icon-split btn-sm pass" data-id="{{$akun->id}}">
                          <span class="text">Ganti Password</span>
                          </button>
                        <button type='submit' class="btn btn-danger btn-icon-split btn-sm">
                          <span class="text">Hapus</span>
                          </button>
                          
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
          <h5 class="modal-title" id="headmodal">Tambah Data akun</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/akun" method="post">
        @csrf
        <input type="text" name='nama' class="form-control form-control-user" placeholder="Nama akun">
        <br>
        <input type="email" name='email' class="form-control form-control-user" placeholder="Email">
        <br>
        <select class="custom-select" name="role" id='role'>
          <option selected>Pilih hak Akses</option>
          <option value="resepsionis">Resepsionis</option>
          <option value="apotek">Apotek</option>
          <option value="kasir">Kasir</option>
          <option value="admin">Admin</option>
          <option value="dokter">Dokter</option>
        </select>
        <br>
        <br>
        <input type="password" name='password' class="form-control form-control-user" placeholder="Password">
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
          <h5 class="modal-title" id="headmodal">Edit Data akun</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="post" id="route">
        @csrf
        @method('PUT')
        <input type="text" name='nama' id='nama' class="form-control form-control-user" placeholder="Nama akun">
        <br>
        <input type="email" name='email'id='email' class="form-control form-control-user" placeholder="Email">
        <br>
        <select class="custom-select" name="role" id='roles'>
          <option selected>Pilih hak Akses</option>
          <option value="resepsionis">Resepsionis</option>
          <option value="apotek">Apotek</option>
          <option value="kasir">Kasir</option>
          <option value="admin">Admin</option>
        </select>
        <br>
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

  <div class="modal fade" id="modalpass" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Ganti Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" id='links'>
        @csrf
        <input type="password" name='pass' class="form-control form-control-user" placeholder="Password baru">
        <br>
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
  <script src="{{url('assets/js/akun.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>>

@endsection