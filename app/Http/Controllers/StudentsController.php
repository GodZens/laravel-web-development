<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    //學生作品資訊
    public function students(Request $request){
        $year = $request->input('year');
        $studentworks = DB::select('SELECT * FROM swork,sworkstudent where swork.id = sworkstudent.id AND year = ? AND type=?',[$year,1]);

        $options_year = DB::select('SELECT DISTINCT year FROM swork ORDER BY year DESC');
        return view('students',['studentworks'=>$studentworks,'options_year'=>$options_year]);
    }
    //學生作品內容資訊
    public function students_content(Request $request){
        $id = $request->input('id');
        $studentworks = DB::select('SELECT * FROM swork,sworkstudent where swork.id = sworkstudent.id AND sworkstudent.student_id = ?',[$id]);
        return view('students_content',['studentworks'=>$studentworks]);
    }


    //學生活動資訊
    public function studentsactivity(Request $request){
        $studentsactivitys = DB::select('SELECT * FROM studentactivity ORDER BY date DESC');

        return view('studentsactivity',['studentsactivitys'=>$studentsactivitys]);

    }
    //學生活動內容
    public function st_activity_content(Request $request){
        $id = $request->input('id');
        $studentsactivitys = DB::select('SELECT * FROM studentactivity where id = ?',[$id]);

        return view('st_activity_content',['studentsactivitys'=>$studentsactivitys]);
    }
    //實務專區
    public function practice_area(Request $request){
        $year = $request->input('year');
        $studentworks = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id = specialtopicstudent.id AND year = ? AND type=?',[$year,1]);

        $options_year = DB::select('SELECT DISTINCT year FROM specialtopic ORDER BY year DESC');
        return view('students',['studentworks'=>$studentworks,'options_year'=>$options_year]);
    }

    //學生作品資訊
    public function en_students(Request $request){
        $year = $request->input('year');
        $studentworks = DB::select('SELECT * FROM swork,sworkstudent where swork.id = sworkstudent.id AND year = ? AND type=?',[$year,1]);

        $options_year = DB::select('SELECT DISTINCT year FROM swork ORDER BY year DESC');
        return view('en/students',['studentworks'=>$studentworks,'options_year'=>$options_year]);
    }
    //學生作品內容資訊
    public function en_students_content(Request $request){
        $id = $request->input('id');
        $studentworks = DB::select('SELECT * FROM swork,sworkstudent where swork.id = sworkstudent.id AND swork.id = ?',[$id]);
        return view('en/students_content',['studentworks'=>$studentworks]);
    }


    //學生活動資訊
    public function en_studentsactivity(Request $request){
        $studentsactivitys = DB::select('SELECT * FROM studentactivity ORDER BY date DESC');

        return view('en/studentsactivity',['studentsactivitys'=>$studentsactivitys]);

    }
    //學生活動內容
    public function en_st_activity_content(Request $request){
        $id = $request->input('id');
        $studentsactivitys = DB::select('SELECT * FROM studentactivity where id = ?',[$id]);

        return view('en/st_activity_content',['studentsactivitys'=>$studentsactivitys]);
    }
    //實務專區
    public function en_practice_area(Request $request){
        $year = $request->input('year');
        $studentworks = DB::select('SELECT * FROM specialtopic,specialtopicstudent where specialtopic.id = specialtopicstudent.id AND year = ? AND type=?',[$year,1]);

        $options_year = DB::select('SELECT DISTINCT year FROM specialtopic ORDER BY year DESC');
        return view('en/students',['studentworks'=>$studentworks,'options_year'=>$options_year]);
    }
}


