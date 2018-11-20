<?php

namespace App\Http\Controllers\admin;

use App\Env;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnvController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $envs = Env::all();
        return view('admin.env.show', compact('envs'));
    }

    public function update(Request $request)
    {
        $env = Env::find($request->id);
        $env->envvalue = $request->value;
        $env->save();
        return $request->all();
    }
}
