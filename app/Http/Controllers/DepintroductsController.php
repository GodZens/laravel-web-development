<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepintroductsController extends Controller
{
    //系所簡介
    public function depintroduct()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroduct']);

        return view('depintroduct', ['depintroducts' => $depintroducts]);
    }

    //系所簡介
    public function en_depintroduct()
    {
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroduct']);

        return view('en/depintroduct', ['depintroducts' => $depintroducts]);
    }
}
