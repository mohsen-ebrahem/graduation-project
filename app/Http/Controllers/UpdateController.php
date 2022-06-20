<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function updateMe(){
        Auth::user()->assignRole('');
    }
}
