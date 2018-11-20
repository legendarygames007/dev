<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Englishcrossword;

class EnglishCrosswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
    {
      $englishcrosswords = Englishcrossword::all();
      return view('admin.english.englishcrossword.show',compact('englishcrosswords'));
      //return redirect(route('englishcrossword.show'));
    }

    public function create()
    {
      return view('admin.english.englishcrossword.create');
    }

    public function store(Request $request)
    {

      $this->validate($request,[
            'mode' => 'required',
            'difficultylevel' => 'required',
            //'packno' => 'required',
            //'levelno' => 'required',
            'leveldata_1' => 'required',
            'packcost' => 'required',
            //'dbupdateversion' => 'required',
        ]);

      $ec = new Englishcrossword;

      $ec->mode = $request->mode;
      $ec->difficultylevel = $request->difficultylevel;
      $ec->packno = $request->packno;
      $ec->levelno = '5';
      $ec->leveldata = $request->leveldata_1;
      $ec->packcost = $request->packcost;
      $ec->dbupdateversion = "1";

      $ec->save();
      return redirect(route('englishcrossword.show'));
    }
}
