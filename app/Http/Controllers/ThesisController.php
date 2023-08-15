<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThesisController extends Controller
{
    //碩士論文
    public function thesis(Request $request)
    {
        $year = $request->input('year');
        $thesises = DB::select('SELECT * FROM thesis,thesis_teacher where thesis.id = thesis_teacher.id AND year = ?', [$year]);

        $options_year = DB::select('SELECT DISTINCT year FROM thesis ORDER BY year DESC');
        return view('thesis', ['thesises' => $thesises, 'options_year' => $options_year]);
    }
    //相關辦法
    public function re_measures(Request $request)
    {
        $thesismethods = DB::select('SELECT * FROM thesismethod');
        return view('re_measures', ['thesismethods' => $thesismethods]);
    }
    //相關表單
    public function re_forms(Request $request)
    {
        $thesisdownloads = DB::select('SELECT * FROM thesisdownload');
        return view('re_forms', ['thesisdownloads' => $thesisdownloads]);
    }

    //碩士論文
    public function en_thesis(Request $request)
    {
        $year = $request->input('year');
        $thesises = DB::select('SELECT * FROM thesis,thesis_teacher where thesis.id = thesis_teacher.id AND year = ?', [$year]);

        $options_year = DB::select('SELECT DISTINCT year FROM thesis ORDER BY year DESC');
        return view('en/thesis', ['thesises' => $thesises, 'options_year' => $options_year]);
    }
    //相關辦法
    public function en_re_measures(Request $request)
    {
        $thesismethods = DB::select('SELECT * FROM thesismethod');
        return view('en/re_measures', ['thesismethods' => $thesismethods]);
    }
    //相關表單
    public function en_re_forms(Request $request)
    {
        $thesisdownloads = DB::select('SELECT * FROM thesisdownload');
        return view('en/re_forms', ['thesisdownloads' => $thesisdownloads]);
    }
}
