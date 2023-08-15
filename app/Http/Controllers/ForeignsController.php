<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForeignsController extends Controller
{
    //學生得獎紀錄
    public function foreign(Request $request)
    {
        $year = $request->input('year');
        $studentcompetitions = DB::select('SELECT * ,studentawteacher.name as t_name FROM studentcompetition,studentawteacher WHERE studentcompetition.id = studentawteacher.sid AND year=?', [$year]);
        $students = DB::select('SELECT * FROM studentaward');
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('foreign', ['studentcompetitions' => $studentcompetitions, 'students' => $students, 'ka_billboard_years' => $ka_billboard_years]);
    }
    //證照統計表
    public function f_certificate(Request $request)
    {
        $year = $request->input('year');
        $licensecolleges = DB::select('SELECT * FROM alltext WHERE position="licensecollege"');
        $licenseoldcolleges = DB::select('SELECT * FROM alltext WHERE position="licenseoldcollege"');
        $licenses_c = DB::select('SELECT * FROM license where year=? and type=?', [$year, '大學部']);
        $licenses_cold = DB::select('SELECT * FROM license where year=? and type=?', [$year, '研究所']);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('f_certificate', ['licensecolleges' => $licensecolleges, 'licenseoldcolleges' => $licenseoldcolleges, 'licenses_c' => $licenses_c, 'licenses_cold' => $licenses_cold, 'ka_billboard_years' => $ka_billboard_years]);
    }
    //教師榮譽
    public function f_teacher(Request $request)
    {
        $honors = DB::select('SELECT * FROM honor ORDER BY id DESC');
        $names = DB::select('SELECT DISTINCT name FROM honor ORDER BY name DESC');
        return view('f_teacher', ['honors' => $honors, 'names' => $names]);
    }
    //畢業系友傑出表現
    public function f_outstanding(Request $request)
    {
        $outstandings = DB::select('SELECT * FROM outstandingAlumni ORDER BY id DESC');
        return view('f_outstanding', ['outstandings' => $outstandings]);
    }

    //學生得獎紀錄
    public function en_foreign(Request $request)
    {
        $year = $request->input('year');
        $studentcompetitions = DB::select('SELECT * ,studentawteacher.name as t_name,studentawteacher.ename as et_name FROM studentcompetition,studentawteacher WHERE studentcompetition.id = studentawteacher.sid AND year=?', [$year]);
        $students = DB::select('SELECT * FROM studentaward');
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('en/foreign', ['studentcompetitions' => $studentcompetitions, 'students' => $students, 'ka_billboard_years' => $ka_billboard_years]);
    }
    //證照統計表
    public function en_f_certificate(Request $request)
    {
        $year = $request->input('year');
        $licensecolleges = DB::select('SELECT * FROM alltext WHERE position="licensecollege"');
        $licenseoldcolleges = DB::select('SELECT * FROM alltext WHERE position="licenseoldcollege"');
        $licenses_c = DB::select('SELECT * FROM license where year=? and type=?', [$year, '大學部']);
        $licenses_cold = DB::select('SELECT * FROM license where year=? and type=?', [$year, '研究所']);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('en/f_certificate', ['licensecolleges' => $licensecolleges, 'licenseoldcolleges' => $licenseoldcolleges, 'licenses_c' => $licenses_c, 'licenses_cold' => $licenses_cold, 'ka_billboard_years' => $ka_billboard_years]);
    }
    //教師榮譽
    public function en_f_teacher(Request $request)
    {
        $honors = DB::select('SELECT * FROM honor ORDER BY id DESC');
        $names = DB::select('SELECT DISTINCT name FROM honor ORDER BY name DESC');
        return view('en/f_teacher', ['honors' => $honors, 'names' => $names]);
    }
    //畢業系友傑出表現
    public function en_f_outstanding(Request $request)
    {
        $outstandings = DB::select('SELECT * FROM outstandingAlumni ORDER BY id DESC');
        return view('en/f_outstanding', ['outstandings' => $outstandings]);
    }
}
