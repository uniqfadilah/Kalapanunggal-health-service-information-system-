<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class resepsionisController extends Controller
{
    public function index()
    {
        return view("halamanawal.resepsionis");
    }
}
