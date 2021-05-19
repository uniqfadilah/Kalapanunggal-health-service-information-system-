<?php

namespace App\Http\Controllers;
use App\pasien;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien=pasien::all();
        return view("datamaster.pasien",compact('pasien'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'no'=>'required',
            'hp'=>'required',
            'alamat'=>'required',
            'keluarga'=>'required',
            'role'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
            $pasien=pasien::where('id',$id)->update([
                'nama'=> $request->nama,
                'nomorkartu'=>$request->no,
                'hp'=>$request->hp,
                'keluarga'=>$request->keluarga,
                'alamat'=>$request->alamat,
                'keterangan'=>$request->role,
                'status'=>$request->status,
            ]);
            return back()->withSuccess('data pasien Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pasien::destroy($id);
        return back()->withSuccess('Akun Dihapus!');
    }
    public function api(Request $request)
    {
        $c=pasien::where('id',$request->id)->first();
        return response()->json($c);
    }
}
