<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function postlogin(Request $request){
  
            if(Auth::attempt($request->only('email','password'))){
                if(Auth()->user()->role=="resepsionis"){
                    return redirect('/pasien-bpjs');
                }
                elseif(Auth()->user()->role=="kasir"){
                    return redirect('/kasir');
                }
                elseif(Auth()->user()->role=="apotek"){
                    return redirect('/berobat');
                }
                else{
                    return redirect('/dashboard');
                }
            }
        else{
            return redirect('/login');
        }
    
    }
    }