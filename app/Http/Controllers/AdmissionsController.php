<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionsController extends Controller
{
    //大學部
    public function admissions(Request $request)
    {
        $year = $request->input('year');
        $admissions = DB::select('SELECT * FROM admissions where year=? ', [$year]);
        $admissions_years = DB::select('SELECT DISTINCT * FROM admissions ORDER BY admissions_id DESC');
        return view('admissions', ['admissions_years' => $admissions_years, 'admissions' => $admissions]);
    }
    //碩士班
    public function ad_master(Request $request)
    {
        $masters = DB::select('SELECT * FROM recruitstudent where id=?', [20]);
        return view('ad_master', ['masters' => $masters]);
    }
    //碩士班在職專班
    public function ad_mastercourse(Request $request)
    {
        $mastercourses = DB::select('SELECT * FROM recruitstudent where id=?', [19]);
        return view('ad_mastercourse', ['mastercourses' => $mastercourses]);
    }
    //推廣學分班
    public function ad_promotion(Request $request)
    {
        $promotions = DB::select('SELECT * FROM recruitstudent where id=?', [21]);
        return view('ad_promotion', ['promotions' => $promotions]);
    }
    //招生簡章
    public function ad_guide(Request $request)
    {
        $universitys = DB::select('SELECT * FROM recruitstudent where id  IN (?, ?, ?, ?)', [4, 5, 6, 14]);
        $transfers = DB::select('SELECT * FROM recruitstudent where id=?', [7]);
        $auditions = DB::select('SELECT * FROM recruitstudent where id=?', [10]);
        $exams = DB::select('SELECT * FROM recruitstudent where id=?', [9]);
        $classes = DB::select('SELECT * FROM recruitstudent where id=?', [11]);
        $institutes = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['institute']);
        $sscs = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['ssc']);
        $transfers_ex = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['transfer']);
        return view('ad_guide', ['universitys' => $universitys, 'transfers' => $transfers, 'auditions' => $auditions, 'exams' => $exams, 'classes' => $classes, 'institutes' => $institutes, 'sscs' => $sscs, 'transfers_ex' => $transfers_ex]);
    }
    //學生產業實習
    public function ad_industry(Request $request)
    {
        $year = $request->input('year');
        $practices = DB::select('SELECT * FROM practice WHERE year=? ORDER BY sem DESC;', [$year]);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('ad_industry', ['ka_billboard_years' => $ka_billboard_years, 'practices' => $practices]);
    }
    //標竿校友
    public function ad_alumni(Request $request)
    {
        $alumnis = DB::select('SELECT * FROM eduequipment2');
        return view('ad_alumni', ['alumnis' => $alumnis]);
    }


    //大學部
    public function en_admissions(Request $request)
    {
        $year = $request->input('year');
        $admissions = DB::select('SELECT * FROM admissions where year=? ', [$year]);
        $admissions_years = DB::select('SELECT DISTINCT * FROM admissions ORDER BY admissions_id DESC');
        return view('en/admissions', ['admissions_years' => $admissions_years, 'admissions' => $admissions]);
    }
    //碩士班
    public function en_ad_master(Request $request)
    {
        $masters = DB::select('SELECT * FROM recruitstudent where id=?', [20]);
        return view('en/ad_master', ['masters' => $masters]);
    }
    //碩士班在職專班
    public function en_ad_mastercourse(Request $request)
    {
        $mastercourses = DB::select('SELECT * FROM recruitstudent where id=?', [19]);
        return view('en/ad_mastercourse', ['mastercourses' => $mastercourses]);
    }
    //推廣學分班
    public function en_ad_promotion(Request $request)
    {
        $promotions = DB::select('SELECT * FROM recruitstudent where id=?', [21]);
        return view('en/ad_promotion', ['promotions' => $promotions]);
    }
    //招生簡章
    public function en_ad_guide(Request $request)
    {
        $universitys = DB::select('SELECT * FROM recruitstudent where id  IN (?, ?, ?, ?)', [4, 5, 6, 14]);
        $transfers = DB::select('SELECT * FROM recruitstudent where id=?', [7]);
        $auditions = DB::select('SELECT * FROM recruitstudent where id=?', [10]);
        $exams = DB::select('SELECT * FROM recruitstudent where id=?', [9]);
        $classes = DB::select('SELECT * FROM recruitstudent where id=?', [11]);
        $institutes = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['institute']);
        $sscs = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['ssc']);
        $transfers_ex = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['transfer']);
        return view('en/ad_guide', ['universitys' => $universitys, 'transfers' => $transfers, 'auditions' => $auditions, 'exams' => $exams, 'classes' => $classes, 'institutes' => $institutes, 'sscs' => $sscs, 'transfers_ex' => $transfers_ex]);
    }
    //學生產業實習
    public function en_ad_industry(Request $request)
    {
        $year = $request->input('year');
        $practices = DB::select('SELECT * FROM practice WHERE year=? ORDER BY sem DESC;', [$year]);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('en/ad_industry', ['ka_billboard_years' => $ka_billboard_years, 'practices' => $practices]);
    }
    //標竿校友
    public function en_ad_alumni(Request $request)
    {
        $alumnis = DB::select('SELECT * FROM eduequipment2');
        return view('en/ad_alumni', ['alumnis' => $alumnis]);
    }
}
