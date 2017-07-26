<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class quizzesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('quizzes/index');
    }

    public function create()
    {
        return view('quizzes/create'); // belum dikoding untuk create view nya.
    }
}
