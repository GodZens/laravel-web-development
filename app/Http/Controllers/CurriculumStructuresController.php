<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumStructuresController extends Controller
{
    //課程規劃
    public function curriculumplan()
    {
        $curriculumplans = DB::select('SELECT * FROM alltext WHERE position=?', ['curriculumrule']);
        return view('curriculumplan', ['curriculumplans' => $curriculumplans]);
    }
    //第二外語
    public function secondlang()
    {
        $secondlangs = DB::select('SELECT * FROM alltext WHERE position=?', ['secondforeign']);
        return view('secondlang', ['secondlangs' => $secondlangs]);
    }
    //課程特色
    public function coursefeature()
    {
        $coursefeatures = DB::select('SELECT * FROM alltext WHERE position=?', ['curriculumsp']);
        return view('coursefeature', ['coursefeatures' => $coursefeatures]);
    }
    //課程流程圖
    public function courseflowchart(Request $request)
    {
        $year = $request->input('year');
        $courseflowcharts = DB::select('SELECT * FROM curriculum where year = ? AND type=? ORDER BY position DESC', [$year, 'c']);

        $options_year = DB::select('SELECT DISTINCT year FROM curriculum ORDER BY year DESC');
        return view('courseflowchart', ['courseflowcharts' => $courseflowcharts, 'options_year' => $options_year]);
    }
    //課程地圖
    public function coursemap(Request $request)
    {
        $year = $request->input('year');
        $coursemaps = DB::select('SELECT * FROM curriculummap where year = ? AND type=? ORDER BY position DESC', [$year, 'c']);

        $options_year = DB::select('SELECT DISTINCT year FROM curriculummap ORDER BY year DESC');
        return view('coursemap', ['coursemaps' => $coursemaps, 'options_year' => $options_year]);
    }
    //課程架構
    public function coursestructure(Request $request)
    {
        $year = $request->input('year');
        $coursestructures = DB::select('SELECT * FROM curriculumframe where year = ? AND type=? ORDER BY position DESC', [$year, 'c']);

        $options_year = DB::select('SELECT DISTINCT year FROM curriculumframe ORDER BY year DESC');
        return view('coursestructure', ['coursestructures' => $coursestructures, 'options_year' => $options_year]);
    }
    //畢業門檻
    public function graduation(Request $request)
    {
        $graduations = DB::select('SELECT * FROM downloadarea where category=? ORDER BY weight ASC', [2]);
        return view('graduation', ['graduations' => $graduations]);
    }


    //課程規劃
    public function en_curriculumplan()
    {
        $curriculumplans = DB::select('SELECT * FROM alltext WHERE position=?', ['curriculumrule']);
        return view('en/curriculumplan', ['curriculumplans' => $curriculumplans]);
    }
    //第二外語
    public function en_secondlang()
    {
        $secondlangs = DB::select('SELECT * FROM alltext WHERE position=?', ['secondforeign']);
        return view('en/secondlang', ['secondlangs' => $secondlangs]);
    }
    //課程特色
    public function en_coursefeature()
    {
        $coursefeatures = DB::select('SELECT * FROM alltext WHERE position=?', ['curriculumsp']);
        return view('en/coursefeature', ['coursefeatures' => $coursefeatures]);
    }
    //課程流程圖
    public function en_courseflowchart(Request $request)
    {
        $year = $request->input('year');
        $courseflowcharts = DB::select('SELECT * FROM curriculum where year = ? AND type=? ORDER BY position DESC', [$year, 'c']);

        $options_year = DB::select('SELECT DISTINCT year FROM curriculum ORDER BY year DESC');
        return view('en/courseflowchart', ['courseflowcharts' => $courseflowcharts, 'options_year' => $options_year]);
    }
    //課程地圖
    public function en_coursemap(Request $request)
    {
        $year = $request->input('year');
        $coursemaps = DB::select('SELECT * FROM curriculummap where year = ? AND type=? ORDER BY position DESC', [$year, 'c']);

        $options_year = DB::select('SELECT DISTINCT year FROM curriculummap ORDER BY year DESC');
        return view('en/coursemap', ['coursemaps' => $coursemaps, 'options_year' => $options_year]);
    }
    //課程架構
    public function en_coursestructure(Request $request)
    {
        $year = $request->input('year');
        $coursestructures = DB::select('SELECT * FROM curriculumframe where year = ? AND type=? ORDER BY position DESC', [$year, 'c']);

        $options_year = DB::select('SELECT DISTINCT year FROM curriculumframe ORDER BY year DESC');
        return view('en/coursestructure', ['coursestructures' => $coursestructures, 'options_year' => $options_year]);
    }
    //畢業門檻
    public function en_graduation(Request $request)
    {
        $graduations = DB::select('SELECT * FROM downloadarea where category=? ORDER BY weight ASC', [2]);
        return view('en/graduation', ['graduations' => $graduations]);
    }
}
