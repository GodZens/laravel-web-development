<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InnovateachsController extends Controller
{
    //教學創新做法
    public function innovateach()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroductn1']);
        return view('innovateach', ['depintroducts' => $depintroducts]);
    }

    //教學創新做法
    public function en_innovateach()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroductn1']);
        return view('en/innovateach', ['depintroducts' => $depintroducts]);
    }
}
