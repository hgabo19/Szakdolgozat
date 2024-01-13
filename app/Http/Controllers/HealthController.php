<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index() {
        return view('health.index');
    }
    
    public function calories(){
        return view('health.calories');
    }

    public function challenges(){
        return view('health.challenges');
    }
}
