<?php

namespace App\Http\Controllers;
use App\berobat;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function index()
    {
        $berobat=berobat::select(
            \DB::raw('DATE_FORMAT(created_at,"%m-%Y") as ids'),
            \DB::raw('DATE_FORMAT(created_at,"%M %Y") as bulan')
        )->groupBy('bulan')->orderBy('id','desc')->get();
      
           return view('laporan',compact('berobat'));
    }

    public function cetak($id){
        $data=explode('-',$id);
        
        $berobat=berobat::whereMonth('created_at',$data[0])->whereYear('created_at',$data[1])->get();
        return view('cetaklaporan',compact('berobat'));
    }
}
