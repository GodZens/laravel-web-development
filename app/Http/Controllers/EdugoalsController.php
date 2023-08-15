<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdugoalsController extends Controller
{
    //教育目標
    public function edugoal()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['edutarget']);
        return view('edugoal', ['depintroducts' => $depintroducts]);
    }

    //教育目標
    public function en_edugoal()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['edutarget']);
        return view('en/edugoal', ['depintroducts' => $depintroducts]);
    }
}
