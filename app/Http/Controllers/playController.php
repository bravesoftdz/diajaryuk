<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class playController extends Controller
{
	public function index(){
    	return view('user_view/play/index');
    }

    public function show(Request $req){
    	echo $req->id;
    }
}
