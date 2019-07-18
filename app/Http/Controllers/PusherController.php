<?php

namespace App\Http\Controllers;

use App\Events\NewMessageNotification;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    //
    public function index()
    {
        return view('pusher.pusher');
    }
    public function view()
    {
        return view('pusher.view');
    }
    public function send(Request $request)
    {
        event(new NewMessageNotification($request->text));
        return redirect()->back();
    }
}
