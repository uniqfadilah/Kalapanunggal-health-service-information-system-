<?php

namespace App\Http\Controllers;
use App\pasien;
use App\obat;
use App\detailobat;
use Illuminate\Http\Request;

class kartuController extends Controller
{
    public function cetak(pasien $pasien)
    {
   
        return view('cetak.kartu',compact('pasien'));
    }
    public function invoice(pasien $pasien)
    {
        $getobat=$pasien->berobat->latest()->first();
        $biaya=$getobat->biaya;
        $obat=detailobat::where('berobat_id',$getobat->id)->join('obats','obats.id','=','detailobats.obat_id')->get();
        $biayaobat=detailobat::where('berobat_id',$getobat->id)->join('obats','obats.id','=','detailobats.obat_id')->select(\DB::raw('sum(detailobats.jumlah*obats.harga ) AS total'))->first();
        $biayatotal=$biaya->sum('nominal');
        $total=$biayaobat->total+$biayatotal;
        return view('kartu',compact('pasien','obat','biaya','total'));
    }
    public function api(pasien $pasien)
    {
        $getobat=$pasien->berobat->latest()->first();
        $biaya=$getobat->biaya;
        $biayaobat=detailobat::where('berobat_id',$getobat->id)->join('obats','obats.id','=','detailobats.obat_id')->select(\DB::raw('sum(detailobats.jumlah*obats.harga ) AS total'))->first();
        $biayatotal=$biaya->sum('nominal');
        $total=$biayaobat->total+$biayatotal;
        return response()->json($total);
    }
    public function index()
    {
   
        $pasien=pasien::where('keterangan','nonbpjs')->get();
        return view("cetak.index",compact('pasien'));
    }
}
