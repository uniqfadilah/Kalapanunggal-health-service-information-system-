<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\berobat;
use App\pasien;
use App\biaya;
use App\obat;
use App\detailbiaya;
use App\detailobat;
use Illuminate\Http\Request;

class BerobatController extends Controller
{

    public function ambilobat()
    {
        $obat=obat::all();
        $pasien=pasien::where('status','berobat')->get();
        return view("obat",compact('pasien','obat'));
    }
    public function kasir()
    {
        $pasien=pasien::where('status','pembayaran')->get();
        return view("kasir",compact('pasien'));
    }
    public function selesai(pasien $pasien)
    {
        pasien::where('id',$pasien->id)->update([
            'status'=>'aktif'
        ]);

        return back()->withSuccess('Pembayaran Selesai!');
    }

    public function berobat(pasien $pasien, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keluhan'=>'required',
            'dokter'=>'required',
            ]);
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
            $berobat=berobat::create([
                "pasien_id"=>$pasien->id,
                "dokter_id"=>$request->dokter,
                'keluhan'=>$request->keluhan,
         
            ]);
            $pemeriksaan=biaya::where('nama','Pemeriksaan')->first();
            $pendaftaran=biaya::where('nama','pendaftaran')->first();

        if($pasien->status=='daftar'){
            detailbiaya::create([
               'berobat_id'=>$berobat->id,
               'nama'=>$pemeriksaan->nama,
               'nominal'=>$pemeriksaan->nominal,
           ]);
            detailbiaya::create([
               'berobat_id'=>$berobat->id,
               'nama'=>$pendaftaran->nama,
               'nominal'=>$pendaftaran->nominal,
           ]);
        }
        else{

            detailbiaya::create([
                'berobat_id'=>$berobat->id,
                'nama'=>$pemeriksaan->nama,
                'nominal'=>$pemeriksaan->nominal,
            ]);
        }
        pasien::where('id',$pasien->id)->update([
            'status'=>'berobat',
        ]);
        return back()->withSuccess('Pasien Dalam Antrian!');
    }
    public function detailobat(pasien $pasien, Request $request)
    {
      $berobat=$pasien->berobat->latest()->first();
        if(count($request->nama)>=1){
            foreach($request->nama as $obat=>$w){
                $data=array(
                    'berobat_id'=>$berobat->id,
                    'obat_id'=>$request->nama[$obat],
                    'jumlah'=>$request->jumlah[$obat],
                );

                detailobat::insert($data);
            }
        }

        if($pasien->keterangan=='nonbpjs'){
            pasien::where('id',$pasien->id)->update([
                'status'=>'pembayaran',
            ]);
        }
        else{
            pasien::where('id',$pasien->id)->update([
                'status'=>'aktif',
            ]);
        }
        return back()->withSuccess('Pasien Dalam Antrian!');

      
        // return back()->withSuccess('Pasien Dalam Antrian!');
    }

}
