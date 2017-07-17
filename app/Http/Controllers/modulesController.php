<?php

namespace App\Http\Controllers;
use App\Modules;
use Illuminate\Http\Request;

class modulesController extends Controller
{
    //
    public function index()
    {
        return view('modules/index');
    }

    public function create()
    {
        return view('modules/create');
    }

    public function edit($id)
    {
        //

    }
}
