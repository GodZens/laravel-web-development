<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExstudentsController extends Controller
{
    //申請資格
    public function ex_student(Request $request)
    {
        $petition_forms = DB::select('SELECT * FROM alltext WHERE position=?', ["international_data"]);
        return view('ex_student', ['petition_forms' => $petition_forms]);
    }
    //活動照片
    public function ex_activity(Request $request)
    {
        $studentphotos = DB::select('SELECT * FROM studentphoto');
        return view('ex_activity', ['studentphotos' => $studentphotos]);
    }
    //出國交換
    public function ex_abroad(Request $request)
    {
        $year = $request->input('year');
        $student_lists = DB::select('SELECT * FROM internationalexchange WHERE  year=? and type=? ORDER BY sem ASC', [$year, '去']);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('ex_abroad', ['student_lists' => $student_lists, 'ka_billboard_years' => $ka_billboard_years]);
    }

    //至本系交換
    public function ex_department(Request $request)
    {
        $year = $request->input('year');
        $student_lists = DB::select('SELECT * FROM internationalexchange WHERE  year=? and type=? ORDER BY sem ASC', [$year, '來']);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('ex_department', ['student_lists' => $student_lists, 'ka_billboard_years' => $ka_billboard_years]);
    }
    //交換心得報告
    public function ex_report(Request $request)
    {
        $country = $request->input('country');
        $reports = DB::select('SELECT *,internationalstudent.id as s_id FROM internationalstudent,internationalcountry  WHERE internationalstudent.country = internationalcountry.id and internationalcountry.country=? ORDER BY internationalstudent.id DESC', [$country]);
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('ex_report', ['reports' => $reports, 'countrys' => $countrys]);
    }


    //申請資格
    public function en_ex_student(Request $request)
    {
        $petition_forms = DB::select('SELECT * FROM alltext WHERE position=?', ["international_data"]);
        return view('en/ex_student', ['petition_forms' => $petition_forms]);
    }
    //活動照片
    public function en_ex_activity(Request $request)
    {
        $studentphotos = DB::select('SELECT * FROM studentphoto');
        return view('en/ex_activity', ['studentphotos' => $studentphotos]);
    }
    //出國交換
    public function en_ex_abroad(Request $request)
    {
        $year = $request->input('year');
        $student_lists = DB::select('SELECT * FROM internationalexchange WHERE  year=? and type=? ORDER BY sem ASC', [$year, '去']);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('en/ex_abroad', ['student_lists' => $student_lists, 'ka_billboard_years' => $ka_billboard_years]);
    }

    //至本系交換
    public function en_ex_department(Request $request)
    {
        $year = $request->input('year');
        $student_lists = DB::select('SELECT * FROM internationalexchange WHERE  year=? and type=? ORDER BY sem ASC', [$year, '來']);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('en/ex_department', ['student_lists' => $student_lists, 'ka_billboard_years' => $ka_billboard_years]);
    }
    //交換心得報告
    public function en_ex_report(Request $request)
    {
        $country = $request->input('country');
        $reports = DB::select('SELECT *,internationalstudent.id as s_id FROM internationalstudent,internationalcountry  WHERE internationalstudent.country = internationalcountry.id and internationalcountry.country=? ORDER BY internationalstudent.id DESC', [$country]);
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('en/ex_report', ['reports' => $reports, 'countrys' => $countrys]);
    }
}
