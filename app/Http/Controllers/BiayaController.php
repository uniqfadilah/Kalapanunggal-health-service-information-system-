<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biaya=biaya::all();
        return view("datamaster.biaya",compact('biaya'));
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
            'nominal'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
    
            biaya::create([
                'nama'=> $request->nama,
                'nominal'=>$request->nominal,
            ]);
           
            // $task = Task::create($request->all());
            return back()->withSuccess('Data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function show(biaya $biaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function edit(biaya $biaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, biaya $biaya)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'nominal'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
    
            biaya::where('id',$biaya->id)->update([
                'nama'=> $request->nama,
                'nominal'=>$request->nominal,
            ]);
           
            // $task = Task::create($request->all());
            return back()->withSuccess('Data !');
    }
    public function api(Request $request)
    {
        $c=biaya::where('id',$request->id)->first();
        return response()->json($c);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(biaya $biaya)
    {
        biaya::destroy($biaya->id);
        return back()->withSuccess('Data Dihapus!');
    }
}
