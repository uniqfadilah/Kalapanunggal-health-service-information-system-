@extends('/template')
@section('title','Halaman Dashboard')
@section('head')
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">SELAMAT DATANG DI APLIKASI PUSKESMAS KALAPANUNGGAL</h1>
</div>
<div class="container">
<div class="row">
<div class="col-md-6 px-0">
<img style="max-height:300px;" src="{{url('/assets/img/login.png')}}" class="img-fluid" >
    </div>
<div class="col-md-4 px-0">
<img style="max-height:280px; padding-top:10%;" src="{{url('/assets/img/cianjur.png')}}" class="img-fluid">
    </div>
    </div>
</div>

@stop
@section('foot')
<script src="{{url('assets/scripts/dashboard.js')}}"></script>

@endsection