@extends('/template')
@section('title','Kelola Obat')
@section('head')
<link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Stok Obat</h1>
</div>
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obat as $obat)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$obat->nama}}</td>
                        <td>{{$obat->jenis}}</td>
                        <td>{{$obat->harga}}</td>
                        <td>{{$obat->satuan}}</td>
                        <td>{{$obat->stok}}</td>
                        <form action="obat/{{$obat->id}}" method="post">
                            @method('delete')
                            @csrf
                            <td>
                                <button type='button' class="btn btn-warning btn-icon-split btn-sm editobat"
                                    data-id="{{$obat->id}}">

                                    <span class="text">Tambah Stok</span>
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


<div class="modal fade" id="modaledit" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headmodal">Tambah stok Obat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id='goto'>
                    @csrf
                    @method('PUT')
    
                    <input type="number" name='tambah' id='harga' class="form-control form-control-user"
                        placeholder="jumlah stok">
                    <br>
            </div>
            <div class="modal-footer">
                <button type='submit' class="btn btn-success">Tambah</button>
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
<script src="{{url('assets/js/stokobat.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>>

@endsection