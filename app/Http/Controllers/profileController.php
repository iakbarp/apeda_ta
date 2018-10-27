<?php

namespace App\Http\Controllers;

use App\trDataJobDesc;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index()
    {
        $data=trDataJobDesc::all();
        $user = User::findOrFail(Auth::user()->id);
        return view('user.profile.index',compact('data','user'));
    }
}
