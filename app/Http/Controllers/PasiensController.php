<?php

namespace App\Http\Controllers;

use App\pasien;
use App\berobat;
use App\obat;
use App\biaya;
use App\detailbiaya;
use App\dokter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PasiensController extends Controller
{
  
    public function nonbpjs()
    {
        $dokter=dokter::all();
        $pasien=pasien::where('keterangan','nonbpjs')->where(function($q) {
            $q->where('status', 'daftar')
              ->orWhere('status', 'aktif');
        })
        ->orderBy('id','desc')->get();
        return view("pasien.nonbpjs",compact('pasien','dokter'));
    }
    public function obat()
    {
        $pasien=pasien::where('status','berobat')->get();
        return view("obat",compact('pasien'));
    }
    public function bpjs()
    {
        $dokter=dokter::all();
        $pasien=pasien::where([['keterangan','=','bpjs'],['status','=','aktif']])->orderBy('id','desc')->get();
        return view("pasien.bpjs",compact('pasien','dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
        'nama'=>'required',
        'no'=>'required',
        'hp'=>'required',
        'alamat'=>'required',
        'keluarga'=>'required',
        'keterangan'=>'required',
        ]);
    
        if ($validator->fails()) {
        
            return back()->with('toast_error', 'Terdapat Kesalahan Input');
        }
        if($request->keterangan=='nonbpjs'){
            $status='daftar';
        }
        else{
            $status='aktif';
        }
        $pasien=pasien::create([
            'nama'=> $request->nama,
            'nomorkartu'=>$request->no,
            'hp'=>$request->hp,
            'keluarga'=>$request->keluarga,
            'alamat'=>$request->alamat,
            'keterangan'=>$request->keterangan,
            'status'=>$status
        ]);
        
        if($pasien->keterangan=='nonbpjs'){
            $id=$pasien->id;
        return back()->withInfo('<a href="/cetak/'.$id.'"target="_blank">CETAK KARTU DISINI
        </a>');
       }
       else{
        return back()->withSuccess('Data Disimpan!');
       }
    // $task = Task::create($request->all());
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function show(pasiens $pasiens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function edit(pasiens $pasiens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pasiens $pasiens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function destroy(pasiens $pasiens)
    {
        //
    }
}
