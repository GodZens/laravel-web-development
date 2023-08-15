<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepfeaturesController extends Controller
{
    //系所特色
    public function depfeatures()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroductn']);
        return view('depfeatures', ['depintroducts' => $depintroducts]);
    }

    //系所特色
    public function en_depfeatures()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroductn']);
        return view('en/depfeatures', ['depintroducts' => $depintroducts]);
    }
}
