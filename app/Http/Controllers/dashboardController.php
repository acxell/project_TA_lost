<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function getView(){
        return view('dashboard.dashboard');
    }
}
