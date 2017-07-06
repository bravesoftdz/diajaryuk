<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tryOutController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('try_outs/index');
    }

    public function create()
    {
        return view('try_outs/create'); // belum dikoding untuk create view nya.
    }

}
