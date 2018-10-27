<?php

namespace App\Http\Controllers;

use App\trDataJobDesc;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class welcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
