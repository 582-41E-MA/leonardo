<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function show()
    {
        return view('robot-show');
    }
}
