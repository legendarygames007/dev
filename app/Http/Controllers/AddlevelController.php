<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\englishcrosswords;

class AddlevelController extends Controller
{

    public function index()
    {
        $data = englishcrosswords::all();
        //dd($data);
        return view('addlevel',compact('data'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
