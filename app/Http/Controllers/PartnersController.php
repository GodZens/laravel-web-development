<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnersController extends Controller
{
    //合作廠商
    public function partner_link()
    {
        $firmplans = DB::select('SELECT * FROM firmplan ORDER BY firm DESC');
        return view('partner_link', ['firmplans' => $firmplans]);
    }
    //產學合作
    public function cooperation_link(Request $request)
    {
        $year = $request->input('year');
        if ($year == '') {
            $years = DB::select('SELECT DISTINCT year FROM industry ORDER BY year DESC LIMIT 1');
            $year = $years[0]->year;
        }
        $cooperations = DB::select('SELECT * FROM industry where year = ? ORDER BY id DESC', [$year]);
        $options_year = DB::select('SELECT DISTINCT year FROM industry ORDER BY year DESC');
        return view('cooperation_link', ['cooperations' => $cooperations, 'options_year' => $options_year]);
    }
    //科技部計畫
    public function techprogram(Request $request)
    {
        $year = $request->input('year');
        if ($year == '') {
            $years = DB::select('SELECT DISTINCT year FROM nsc ORDER BY year DESC LIMIT 1');
            $year = $years[0]->year;
        }
        $techprograms = DB::select('SELECT * FROM nsc where year = ? ORDER BY id DESC', [$year]);
        $options_year = DB::select('SELECT DISTINCT year FROM nsc ORDER BY year DESC');
        return view('techprogram', ['techprograms' => $techprograms, 'options_year' => $options_year]);
    }
    //政府部門輔助
    public function government(Request $request)
    {
        $year = $request->input('year');
        if ($year == '') {
            $years = DB::select('SELECT DISTINCT year FROM education ORDER BY year DESC LIMIT 1');
            $year = $years[0]->year;
        }
        $governments = DB::select('SELECT * FROM education where year = ? ORDER BY id DESC', [$year]);
        $options_year = DB::select('SELECT DISTINCT year FROM education ORDER BY year DESC');
        return view('government', ['governments' => $governments, 'options_year' => $options_year]);
    }


    //合作廠商
    public function en_partner_link()
    {
        $firmplans = DB::select('SELECT * FROM firmplan ORDER BY firm DESC');
        return view('en/partner_link', ['firmplans' => $firmplans]);
    }
    //產學合作
    public function en_cooperation_link(Request $request)
    {
        $year = $request->input('year');
        if ($year == '') {
            $years = DB::select('SELECT DISTINCT year FROM industry ORDER BY year DESC LIMIT 1');
            $year = $years[0]->year;
        }
        $cooperations = DB::select('SELECT * FROM industry where year = ? ORDER BY id DESC', [$year]);
        $options_year = DB::select('SELECT DISTINCT year FROM industry ORDER BY year DESC');
        return view('en/cooperation_link', ['cooperations' => $cooperations, 'options_year' => $options_year]);
    }
    //科技部計畫
    public function en_techprogram(Request $request)
    {
        $year = $request->input('year');
        if ($year == '') {
            $years = DB::select('SELECT DISTINCT year FROM nsc ORDER BY year DESC LIMIT 1');
            $year = $years[0]->year;
        }
        $techprograms = DB::select('SELECT * FROM nsc where year = ? ORDER BY id DESC', [$year]);
        $options_year = DB::select('SELECT DISTINCT year FROM nsc ORDER BY year DESC');
        return view('en/techprogram', ['techprograms' => $techprograms, 'options_year' => $options_year]);
    }
    //政府部門輔助
    public function en_government(Request $request)
    {
        $year = $request->input('year');
        if ($year == '') {
            $years = DB::select('SELECT DISTINCT year FROM education ORDER BY year DESC LIMIT 1');
            $year = $years[0]->year;
        }
        $governments = DB::select('SELECT * FROM education where year = ? ORDER BY id DESC', [$year]);
        $options_year = DB::select('SELECT DISTINCT year FROM education ORDER BY year DESC');
        return view('en/government', ['governments' => $governments, 'options_year' => $options_year]);
    }
}
