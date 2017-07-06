<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('comments/index');
    }

    
    /*public function create()
    {
        return view('comments/create');
    }*/
}
