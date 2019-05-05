<?php

namespace App\Http\Controllers;

use App\Result;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Alauddin;
class HomeController extends Controller
{
    use Alauddin;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $skips = ["[","]","\""];
        // $users = User::all();
        // $a = $users->pluck('name');
        // $a = str_replace($skips, ' ',$a);
        // return $a;
        $a = Result::with('user')->find(Auth::user()->id)->first();
         return view('home',['a'=>$a]);
        //return $this->getValue(Auth::user()->id);
    }
}
