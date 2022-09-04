<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{

    public function Home(){
        return view('trangchu');
    }
    public function Dashboard(){
        return view('dashboard');
    }
}
