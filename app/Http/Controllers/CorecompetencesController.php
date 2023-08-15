<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorecompetencesController extends Controller
{
    //核心能力
    public function corecompetence()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['studentability']);
        return view('corecompetence', ['depintroducts' => $depintroducts]);
    }

    //核心能力
    public function en_corecompetence()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['studentability']);
        return view('en/corecompetence', ['depintroducts' => $depintroducts]);
    }
}
