<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter=dokter::all();
        return view("datamaster.dokter",compact('dokter'));
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
            'spesialis'=>'required',
            'hp'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
    
            dokter::create([
                'nama'=> $request->nama,
                'spesialis'=>$request->spesialis,
                'hp'=>$request->hp,
            ]);
           
            // $task = Task::create($request->all());
            return back()->withSuccess('Data Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\doktors  $doktors
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\doktors  $doktors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokter $dokter)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'spesialis'=>'required',
            'hp'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
    
            dokter::where('id',$dokter->id)->update([
                'nama'=> $request->nama,
                'spesialis'=>$request->spesialis,
                'hp'=>$request->hp,
            ]);
           
            // $task = Task::create($request->all());
            return back()->withSuccess('Data DiUbah!');
    }
    public function api(Request $request)
    {
        $c=dokter::where('id',$request->id)->first();
        return response()->json($c);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\doktors  $doktors
     * @return \Illuminate\Http\Response
     */
    public function destroy(dokter $dokter)
    {
        dokter::destroy($dokter->id);
        return back()->withSuccess('Data Dihapus!');
    }
}
