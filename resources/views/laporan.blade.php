@extends('/template')
@section('title','Laporan Berobat')
@section('head')
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Berobat</h1>
</div>
<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Bulan</th>
                      <th>Cetak</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($berobat as $berobat)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$berobat->bulan}}</td>
              
                      <td><a href="/laporan/{{$berobat->ids}}"  target="_blank" class="btn btn-success btn-circle btn-sm berobat">
                        <i class="fas fa-check"></i>
                        </a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@stop


@section('foot')
  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/vendor/select2/js/select2.full.min.js')}}"></script>
@endsection