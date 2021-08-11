<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\berobat;
use App\obat;
use App\detailobat;
class LamanDokterController extends Controller
{
    public function index(){
    $obat=obat::all();
    $data = berobat::where([['dokter_id',"=",auth()->user()->dokter->id],['status','=','periksa']])->get();
    return view("dokter.index",compact('data','obat'));
    }

    public function create(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'diagnosis'=>'required',
            ]);
            if ($validator->fails()) {
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
        $berobat=berobat::where('id',$id)->first();
            foreach($request->nama as $key=>$w){
                $obat=obat::where('id',$request->nama[$key])->first();

                $stok=($obat->stok-$request->jumlah[$key]);
                $obat->update([
                    'stok' => $stok
                ]);
                $data=array(
                    'berobat_id'=>$berobat->id,
                    'obat_id'=>$request->nama[$key],
                    'jumlah'=>$request->jumlah[$key],
                );
                detailobat::insert($data);
            }
            $berobat->update([
                'diagnosis'=> $request->diagnosis,
                'status'=>'apotek'
            ]);
            return back()->withSuccess('Proses selesai');
    }
}
