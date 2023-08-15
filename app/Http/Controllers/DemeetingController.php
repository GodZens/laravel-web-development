<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemeetingController extends Controller
{
    //系務會議大學部
    public function de_meeting(Request $request)
    {
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [1]);
        return view('de_meeting', ['meetings' => $meetings]);
    }
    //系務會議碩士班
    public function de_master(Request $request)
    {
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [17]);
        return view('de_master', ['meetings' => $meetings]);
    }
    //系務會議碩士在職專班
    public function de_class(Request $request)
    {
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [18]);
        return view('de_class', ['meetings' => $meetings]);
    }


    //系務會議大學部
    public function en_de_meeting(Request $request)
    {
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [1]);
        return view('en/de_meeting', ['meetings' => $meetings]);
    }
    //系務會議碩士班
    public function en_de_master(Request $request)
    {
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [17]);
        return view('en/de_master', ['meetings' => $meetings]);
    }
    //系務會議碩士在職專班
    public function en_de_class(Request $request)
    {
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [18]);
        return view('en/de_class', ['meetings' => $meetings]);
    }
}
