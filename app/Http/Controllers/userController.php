<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $akun=User::all();
     return view("datamaster.akun",compact('akun'));
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
            'role'=>'required',
            'email'=>'required',
            'password'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
        $pass=bcrypt($request->password);
        User::create([
            'name'=>$request->nama,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=>$pass,
        ]);
        return back()->withSuccess('Data Disimpan!');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'role'=>'required',
            'email'=>'required',
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
        User::where('id',$id)->update([
            'name'=>$request->nama,
            'role'=>$request->role,
            'email'=>$request->email,
        ]);
        return back()->withSuccess('Data DiUbah!');
    }
    public function pass(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pass'=>'required'
            ]);
        
            if ($validator->fails()) {
            
                return back()->with('toast_error', 'Terdapat Kesalahan Input');
            }
            $pass=bcrypt($request->pass);
        User::where('id',$id)->update([
            'password'=>$pass,
        ]);
        return back()->withSuccess('Data DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function api(request $request)
    {
        $c=User::where('id',$request->id)->first();
        return response()->json($c);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return back()->withSuccess('Akun Dihapus!');
    }
}
