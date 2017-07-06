<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class questionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('questions/index');
    }

    public function create()
    {
        return view('questions/create');
    }

}

