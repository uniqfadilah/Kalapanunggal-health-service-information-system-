<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\obat;
use App\berobat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat=obat::all();
        return view("datamaster.obat",compact('obat'));
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
            'jenis'=>'required',
            'harga'=>'required',
            'satuan'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
    
            obat::create([
                'nama'=> $request->nama,
                'jenis'=>$request->jenis,
                'harga'=>$request->harga,
                'satuan'=>$request->satuan,
            ]);
           
            // $task = Task::create($request->all());
            return back()->withSuccess('Data Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\obats  $obats
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\obats  $obats
     * @return \Illuminate\Http\Response
     */
    public function edit(obats $obats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\obats  $obats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, obat $obat)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'jenis'=>'required',
            'harga'=>'required',
            'satuan'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
    
            obat::where('id',$obat->id)->update([
                'nama'=> $request->nama,
                'jenis'=>$request->jenis,
                'harga'=>$request->harga,
                'satuan'=>$request->satuan,
            ]);
           
            // $task = Task::create($request->all());
            return back()->withSuccess('Data DiUbah!');
    }
    public function api(Request $request)
    {
        $c=obat::where('id',$request->id)->first();
        return response()->json($c);
    }

    public function ambilobat($id){
        $c=berobat::where('id',$id)->with('obat')->first();
        return response()->json($c);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\obats  $obats
     * @return \Illuminate\Http\Response
     */
    public function destroy(obat $obat)
    {
        obat::destroy($obat->id);
        return back()->withSuccess('Data Dihapus!');
    }

    public function kelolastok(){
        $obat=obat::all();
        return view("kelolastok",compact('obat'));

    }
    public function kelolastoktambah(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'tambah'=>'required',
            ]);
        
            if ($validator->fails()) {
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }

            $obat=obat::where('id',$id)->first();
            $stok = $obat->stok + $request->tambah;
            $obat->update([
                'stok' => $stok
            ]);
            return back()->withSuccess('Stok Obat Ditambah!');
    

    }
}
