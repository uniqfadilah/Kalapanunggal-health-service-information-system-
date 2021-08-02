@extends('/template')
@section('title','Halaman Kasir')
@section('head')
<link rel="stylesheet" href="{{url('assets/vendor/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{url('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
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
                      <th>Pembayaran</th>
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
                      <td> <a href="invoice/{{$pasien->id}}"  target="_blank" class="btn btn-warning btn-icon-split btn-sm">
                          
                          <span class="text">Cetak</span>
                          </a></i>
                           <button type="button" class="btn btn-success btn-icon-split btn-sm d-inline kasir" data-id="{{$pasien->id}}">
                         
                          <span class="text">Bayar</span>
                           </button></i></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    <div class="modal fade" id="modalkasir" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="headmodal">Pembayaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="col-md-12">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id='atas'>TOTAL PEMBAYARAN</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id='nominal'>....</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-home fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
           <br>
           <input type="number" class="form-control form-control-user" placeholder="Uang yang Diterima" id="uang"  pattern="([0-9]{1,3}).([0-9]{1,3})">
           <br>
           <button type='button' class="btn btn-warning kembalian">Hitung Kembalian</button>
            
            </div>
            <br>
        <div class="modal-footer">
        <form action="" method="post" id='link'>
        @csrf
          <button type='submit' class="btn btn-success">Selesai</button>
          </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop
            <!-- alert -->
  @include('sweetalert::alert')
    <!-- Logout Modal-->

@stop


@section('foot')
  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/js/kasir.js')}}"></script>
@endsection