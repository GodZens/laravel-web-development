<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepmethodsController extends Controller
{
    //系所辦法
    public function depmethod()
    {
        return view('depmethod');
    }

    //系所辦法
    public function en_depmethod()
    {
        return view('en/depmethod');
    }
}
