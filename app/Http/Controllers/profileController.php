<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\trDataJobDesc;
use App\User;
use App\City;

class profileController extends Controller
{

    public function index()
    {
        $data['data'] = trDataJobDesc::all();
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['city'] = City::findOrFail(Auth::user()->city_id);
        return view('user.profile.index', $data);
    }

    public function logo()
    {
        $data['data'] = trDataJobDesc::all();
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['city'] = City::findOrFail(Auth::user()->city_id);
        return view('layouts.user.mst_user_relog', $data);
    }

}
