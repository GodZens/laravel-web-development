<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticeController extends Controller
{
    //實務辦法
    public function practice(Request $request)
    {
        $year = $request->input('year');
        #學生實務辦法
        $specialtopic_methods = DB::select('SELECT * FROM specialtopic_method WHERE year=? ORDER BY lang ASC, date DESC;', [$year]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('practice', ['specialtopic_methods' => $specialtopic_methods, 'practical_topics_years' => $practical_topics_years]);
    }
    //相關表單
    public function practive_forms()
    {
        $toprelatedforms = DB::select('SELECT * FROM toprelatedform ORDER BY id DESC;');
        return view('practive_forms', ['toprelatedforms' => $toprelatedforms]);
    }
    //歷屆實習單位
    public function practive_intership()
    {
        $e_internships = DB::select('SELECT * FROM specialtopicpractice where label = ?', [1]);
        $internships = DB::select('SELECT * FROM specialtopicpractice where label = ?', [0]);
        return view('practive_intership', ['internships' => $internships, 'e_internships' => $e_internships]);
    }
    //歷屆實習單位內容
    public function pr_intership_content(Request $request)
    {
        $id = $request->input('id');
        $internships = DB::select('SELECT * FROM specialtopicpractice where id = ?', [$id]);
        return view('pr_intership_content', ['internships' => $internships]);
    }
    //實務專題成果(實習組)
    public function practicaltopic(Request $request)
    {
        $year = $request->input('year');
        $specialtopics = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id=specialtopicstudent.id and  year = ? and type=?', [$year, 1]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('practicaltopic', ['specialtopics' => $specialtopics, 'practical_topics_years' => $practical_topics_years]);
    }
    //實務專題成果(專題組)
    public function practicaltopic_paper(Request $request)
    {
        $year = $request->input('year');
        $specialtopics = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id=specialtopicstudent.id and  year = ? and type=?', [$year, 2]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('practicaltopic_paper', ['specialtopics' => $specialtopics, 'practical_topics_years' => $practical_topics_years]);
    }
    //實務專題成果(成果影片組)
    public function practicaltopic_video(Request $request)
    {
        $year = $request->input('year');
        $specialtopics = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id=specialtopicstudent.id and  year = ? and type=?', [$year, 3]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('practicaltopic_video', ['specialtopics' => $specialtopics, 'practical_topics_years' => $practical_topics_years]);
    }


    //實務辦法
    public function en_practice(Request $request)
    {
        $year = $request->input('year');
        #學生實務辦法
        $specialtopic_methods = DB::select('SELECT * FROM specialtopic_method WHERE year=? ORDER BY lang ASC, date DESC;', [$year]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('en/practice', ['specialtopic_methods' => $specialtopic_methods, 'practical_topics_years' => $practical_topics_years]);
    }
    //相關表單
    public function en_practive_forms()
    {
        $toprelatedforms = DB::select('SELECT * FROM toprelatedform ORDER BY id DESC;');
        return view('en/practive_forms', ['toprelatedforms' => $toprelatedforms]);
    }
    //歷屆實習單位
    public function en_practive_intership()
    {
        $e_internships = DB::select('SELECT * FROM specialtopicpractice where label = ?', [1]);
        $internships = DB::select('SELECT * FROM specialtopicpractice where label = ?', [0]);
        return view('en/practive_intership', ['internships' => $internships, 'e_internships' => $e_internships]);
    }
    //歷屆實習單位內容
    public function en_pr_intership_content(Request $request)
    {
        $id = $request->input('id');
        $internships = DB::select('SELECT * FROM specialtopicpractice where id = ?', [$id]);
        return view('en/pr_intership_content', ['internships' => $internships]);
    }
    //實務專題成果(實習組)
    public function en_practicaltopic(Request $request)
    {
        $year = $request->input('year');
        $specialtopics = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id=specialtopicstudent.id and  year = ? and type=?', [$year, 1]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('en/practicaltopic', ['specialtopics' => $specialtopics, 'practical_topics_years' => $practical_topics_years]);
    }
    //實務專題成果(專題組)
    public function en_practicaltopic_paper(Request $request)
    {
        $year = $request->input('year');
        $specialtopics = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id=specialtopicstudent.id and  year = ? and type=?', [$year, 2]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('en/practicaltopic_paper', ['specialtopics' => $specialtopics, 'practical_topics_years' => $practical_topics_years]);
    }
    //實務專題成果(成果影片組)
    public function en_practicaltopic_video(Request $request)
    {
        $year = $request->input('year');
        $specialtopics = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id=specialtopicstudent.id and  year = ? and type=?', [$year, 3]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('en/practicaltopic_video', ['specialtopics' => $specialtopics, 'practical_topics_years' => $practical_topics_years]);
    }
}
