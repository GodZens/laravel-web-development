<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BackkeyaffairsController extends Controller
{
    //重點事務選擇畫面
    public function keyaffair()
    {
        return view('Backstage/keyaffair/keyaffair');
    }

    //應外風雲榜畫面
    public function ka_billboard()
    {
        $billboards = DB::select('SELECT * FROM honor ORDER BY id DESC');
        return view('Backstage/keyaffair/ka_billboard/ka_billboard', ['billboards' => $billboards]);
    }

    //新增學年度畫面
    public function add_ka_billboard_years_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/add_ka_billboard_years', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //新增學年度
    public function add_ka_billboard_years(Request $request)
    {
        try {
            $new_year = $request->input('new_year');
            $add_ka_billboard_years = DB::statement('INSERT INTO ka_billboard_year (year) VALUES (?)', [$new_year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //刪除學年度畫面
    public function delete_ka_billboard_years_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/delete_ka_billboard_years', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //刪除學年度
    public function delete_ka_billboard_years(Request $request)
    {
        try {
            $delete_year = $request->input('delete_year');
            $delete = DB::delete('delete from ka_billboard_year where year = ?', [$delete_year]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增教師榮譽畫面
    public function add_billboard_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/add_billboard', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //新增教師榮譽
    public function add_billboard(Request $request)
    {
        try {
            $alumni = $request->input('alumni');
            $Performance = $request->input('Performance');
            $Performance_eng = $request->input('Performance_eng');
            $year = $request->input('year');
            $year = $year + 1911;
            $add_billboard = DB::statement('INSERT INTO honor (name, description, edescription, date) VALUES (?,?,?,?)', [$alumni, $Performance, $Performance_eng, $year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改教師榮譽畫面
    public function re_billboard_view(Request $request)
    {
        $id = $request->input('id');
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        $honors = DB::select('SELECT * FROM honor WHERE id=?', [$id]);
        return view('Backstage/keyaffair/ka_billboard/re_billboard', ['ka_billboard_years' => $ka_billboard_years, 'honors' => $honors]);
    }

    //修改教師榮譽
    public function re_billboard(Request $request)
    {
        try {
            $id = $request->input('id');
            $alumni = $request->input('alumni');
            $Performance = $request->input('Performance');
            $Performance_eng = $request->input('Performance_eng');
            $year = $request->input('year');
            $year = $year + 1911;
            $add_billboard = DB::update('update honor set name = ?,description = ?,edescription = ?,date = ? where id=?', [$alumni, $Performance, $Performance_eng, $year, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除教師榮譽
    public function delete_billboard(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_billboard = DB::delete('delete from honor where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //學生得獎紀錄畫面
    public function student_award()
    {
        $studentcompetitions = DB::select('SELECT *,studentaward.name as s_name ,studentawteacher.name as t_name FROM studentcompetition,studentaward,studentawteacher WHERE studentcompetition.id = studentaward.sid AND studentcompetition.id = studentawteacher.sid');
        return view('Backstage/keyaffair/ka_billboard/student_award', ['studentcompetitions' => $studentcompetitions]);
    }

    //新增學生得獎紀錄畫面
    public function add_student_award_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/add_student_award', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //新增學生得獎紀錄
    public function add_student_award(Request $request)
    {
        try {
            $Academic = $request->input('Academic');
            $semester = $request->input('semester');

            $Awards = $request->input('Awards');
            $Awards_en = $request->input('Awards-eng');
            $competition = $request->input('competition');
            $competition_en = $request->input('competition-eng');
            $work = $request->input('work');
            $work_en = $request->input('work-eng');
            $add_studentcompetition = DB::statement('INSERT INTO studentcompetition (ranking, eranking, projectname, eprojectname, workname, eworkname, year, sem) VALUES (?,?,?,?,?,?,?,?)', [$Awards, $Awards_en, $competition, $competition_en, $work, $work_en, $Academic, $semester]);

            $studentcompetition_ids = DB::select('SELECT id FROM studentcompetition ORDER BY id DESC LIMIT 1');
            foreach ($studentcompetition_ids as $studentcompetition_id) {
                $sid = $studentcompetition_id->id;
            }
            $contestant = $request->input('contestant');
            $contestant_en = $request->input('contestant-eng');
            $add_studentaward = DB::statement('INSERT INTO studentaward (sid,name, ename) VALUES (?,?,?)', [$sid, $contestant, $contestant_en]);

            $teacher = $request->input('teacher');
            $teacher_en = $request->input('teacher-eng');
            $add_studentawteacher = DB::statement('INSERT INTO studentawteacher (sid,name,ename) VALUES (?,?,?)', [$sid, $teacher, $teacher_en]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改學生得獎紀錄畫面
    public function re_student_award_view(Request $request)
    {
        $id = $request->input('id');
        $studentcompetitions = DB::select('SELECT *,studentaward.name as s_name,studentaward.ename as s_ename,studentawteacher.name as t_name ,studentawteacher.ename as t_ename FROM studentcompetition,studentaward,studentawteacher WHERE studentcompetition.id = studentaward.sid AND studentcompetition.id = studentawteacher.sid AND studentcompetition.id = ?', [$id]);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/re_student_award', ['ka_billboard_years' => $ka_billboard_years, 'studentcompetitions' => $studentcompetitions]);
    }

    //修改學生得獎紀錄
    public function re_student_award(Request $request)
    {
        try {
            $id = $request->input('id');
            $Academic = $request->input('Academic');
            $semester = $request->input('semester');

            $Awards = $request->input('Awards');
            $Awards_en = $request->input('Awards-eng');
            $competition = $request->input('competition');
            $competition_en = $request->input('competition-eng');
            $work = $request->input('work');
            $work_en = $request->input('work-eng');

            $update_studentcompetition = DB::update('update studentcompetition set ranking = ?,eranking = ?,projectname = ?,eprojectname = ?,workname = ?,eworkname = ?,year = ?,sem = ? where id=?', [$Awards, $Awards_en, $competition, $competition_en, $work, $work_en, $Academic, $semester, $id]);

            $contestant = $request->input('contestant');
            $contestant_en = $request->input('contestant-eng');
            $update_studentaward = DB::update('update studentaward set name = ?,ename = ?  where sid=?', [$contestant, $contestant_en, $id]);

            $teacher = $request->input('teacher');
            $teacher_en = $request->input('teacher-eng');
            $update_studentawteacher = DB::update('update studentawteacher set name = ?,ename = ?  where sid=?', [$teacher, $teacher_en, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除學生得獎紀錄
    public function delete_student_award(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_studentcompetition = DB::delete('delete from studentcompetition where id = ?', [$id]);
            $delete_studentaward = DB::delete('delete from studentaward where sid = ?', [$id]);
            $delete_studentawteacher = DB::delete('delete from studentawteacher where sid = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }


    //證照統計畫面
    public function certificate()
    {
        $licensecolleges = DB::select('SELECT * FROM alltext WHERE position="licensecollege"');
        $licenseoldcolleges = DB::select('SELECT * FROM alltext WHERE position="licenseoldcollege"');
        $licenses = DB::select('SELECT * FROM license ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/certificate', ['licensecolleges' => $licensecolleges, 'licenseoldcolleges' => $licenseoldcolleges, 'licenses' => $licenses]);
    }

    //新增證照統計畫面
    public function add_certificate_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/add_certificate', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //新增證照統計
    public function add_certificate(Request $request)
    {
        try {
            $year = $request->input('year');
            $semester = $request->input('semester');
            $student_num = $request->input('student_num');
            $point = $request->input('point');
            $passrate = $request->input('passrate');
            $add_certificate = DB::statement('INSERT INTO license (year, type, student, top_score, graduation) VALUES (?,?,?,?,?)', [$year, $semester, $student_num, $point, $passrate]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改證照統計畫面
    public function re_certificate_view(Request $request)
    {
        $id = $request->input('id');
        $licenses = DB::select('SELECT * FROM license where id=?', [$id]);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/ka_billboard/re_certificate', ['ka_billboard_years' => $ka_billboard_years, 'licenses' => $licenses]);
    }

    //修改證照統計
    public function re_certificate(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $semester = $request->input('semester');
            $student_num = $request->input('student_num');
            $point = $request->input('point');
            $passrate = $request->input('passrate');
            $update_certificate = DB::update('update license set year = ?,type = ?,student = ?,top_score = ?,graduation = ? where id=?', [$year, $semester, $student_num, $point, $passrate, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除證照統計
    public function delete_certificate(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_certificate = DB::delete('delete from license where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改統計畫面
    public function re_statistics_view(Request $request)
    {
        $id = $request->input('id');
        $alltexts = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/keyaffair/ka_billboard/re_statistics', ['alltexts' => $alltexts]);
    }

    //修改統計
    public function re_statistics(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $update_certificate = DB::update('update alltext set dtext = ?,dtext_en = ?,date=? where id=?', [$editor, $editor_en, $date, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //畢業系友畫面
    public function outstanding()
    {
        $outstandings = DB::select('SELECT * FROM outstandingAlumni ORDER BY id DESC');
        return view('Backstage/keyaffair/ka_billboard/outstanding', ['outstandings' => $outstandings]);
    }

    //新增畢業系友畫面
    public function add_outstanding_view()
    {
        $types = DB::select('SELECT DISTINCT mode FROM outstandingAlumni');
        return view('Backstage/keyaffair/ka_billboard/add_outstanding', ['types' => $types]);
    }
    //新增畢業傑出
    public function add_outstanding(Request $request)
    {
        try {
            $alumni = $request->input('alumni');
            $alumni_en = $request->input('alumni-eng');
            $Performance = $request->input('Performance');
            $Performance_en = $request->input('Performance-eng');
            $type = $request->input('type');
            if ($type == '文創商溝組') {
                $label = 0;
            } else {
                $label = 1;
            }
            $add_outstanding = DB::statement('INSERT INTO outstandingalumni (name, ename, description, edescription, mode,label) VALUES (?,?,?,?,?,?)', [$alumni, $alumni_en, $Performance, $Performance_en, $type, $label]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改畢業系友畫面
    public function re_outstanding_view(Request $request)
    {
        $id = $request->input('id');
        $outstandings = DB::select('SELECT * FROM outstandingalumni where id=?', [$id]);
        $types = DB::select('SELECT DISTINCT mode FROM outstandingAlumni');
        return view('Backstage/keyaffair/ka_billboard/re_outstanding', ['outstandings' => $outstandings, 'types' => $types]);
    }

    //修改畢業系友
    public function re_outstanding(Request $request)
    {
        try {
            $id = $request->input('id');
            $alumni = $request->input('alumni');
            $alumni_en = $request->input('alumni-eng');
            $Performance = $request->input('Performance');
            $Performance_en = $request->input('Performance-eng');
            $type = $request->input('type');
            if ($type == '文創商溝組') {
                $label = 0;
            } else {
                $label = 1;
            }
            $update_outstanding = DB::update('update outstandingalumni set name = ?,ename = ?,description = ?,edescription = ?,mode = ?,label=? where id=?', [$alumni, $alumni_en, $Performance, $Performance_en, $type, $label, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除畢業系友
    public function delete_outstanding(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_outstanding = DB::delete('delete from outstandingalumni where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //國際雙聯學制畫面
    public function double_education()
    {
        $doublemethods = DB::select('SELECT * FROM alltext WHERE position="doublemethod"');
        $doubleprocedures = DB::select('SELECT * FROM alltext WHERE position="doubleprocedure"');
        $doubleprocesses = DB::select('SELECT * FROM alltext WHERE position="doubleprocess"');
        $doublecourseprocesses = DB::select('SELECT * FROM alltext WHERE position="doublecourseprocess"');
        $doublecourseaustrprocesses = DB::select('SELECT * FROM alltext WHERE position="doublecourseaustrprocess"');
        $doublecoursefrees = DB::select('SELECT * FROM alltext WHERE position="doublecoursefree"');
        $doubleaustrlifes = DB::select('SELECT * FROM alltext WHERE position="doubleaustrlife"');
        $double_educations = DB::select('SELECT * FROM doubleapplication ORDER BY id');
        return view('Backstage/keyaffair/double_education/double_education', [
            'doublemethods' => $doublemethods, 'doubleprocedures' => $doubleprocedures, 'doubleprocesses' => $doubleprocesses,
            'doublecourseprocesses' => $doublecourseprocesses, 'doublecourseaustrprocesses' => $doublecourseaustrprocesses,
            'doublecoursefrees' => $doublecoursefrees, 'doubleaustrlifes' => $doubleaustrlifes, 'double_educations' => $double_educations
        ]);
    }

    //新增國際雙聯學制畫面
    public function add_double_education_view()
    {
        return view('Backstage/keyaffair/double_education/add_double_education');
    }
    //新增國際雙聯學制
    public function add_double_education(Request $request)
    {
        try {
            $describe = $request->input('describe');
            $describe_en = $request->input('describe_en');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $add_outstanding = DB::statement('INSERT INTO doubleapplication (description, description_en,file, date) VALUES (?,?,?,?)', [$describe, $describe_en, $filename, $date]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改國際雙聯學制畫面
    public function re_double_education_view(Request $request)
    {
        $id = $request->input('id');
        $double_educations = DB::select('SELECT * FROM doubleapplication where id=?', [$id]);
        return view('Backstage/keyaffair/double_education/re_double_education', ['double_educations' => $double_educations]);
    }

    //修改國際雙聯學制
    public function re_double_education(Request $request)
    {
        try {
            $id = $request->input('id');
            $doubleapplications = DB::select('SELECT * FROM doubleapplication where id=?', [$id]);
            foreach ($doubleapplications as $doubleapplication) {
                $oldfile = $doubleapplication->file;
            }
            $describe = $request->input('describe');
            $describe_en = $request->input('describe_en');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $update_doubleapplications = DB::update('update doubleapplication set description = ?,description_en = ?,file = ?,date=? where id=?', [$describe, $describe_en, $filename, $date, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除國際雙聯學制畫面
    public function delete_double_education(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_doubleapplication = DB::delete('delete from doubleapplication where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改國際雙聯學制檔案畫面
    public function re_doublemethod_view(Request $request)
    {
        $id = $request->input('id');
        $re_alltexts = DB::select('SELECT * FROM alltext where id=?', [$id]);
        // dd($re_alltexts);
        return view('Backstage/keyaffair/double_education/re_doublemethod', ['re_alltexts' => $re_alltexts]);
    }
    //修改國際雙聯學制檔案
    public function re_doublemethod(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $update_alltext =  DB::update('update alltext set dtext = ?,dtext_en = ?,date=? where id=?', [$editor, $editor_en, $date, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //國際交換生畫面
    public function st_exchange()
    {
        return view('Backstage/keyaffair/st_exchange/st_exchange');
    }
    //申請資格
    public function petition_form()
    {
        $petition_forms = DB::select('SELECT * FROM alltext WHERE position="international_data"');
        return view('Backstage/keyaffair/st_exchange/petition_form', ['petition_forms' => $petition_forms]);
    }
    //修改申請資格畫面
    public function re_petition_form_view(Request $request)
    {
        $id = $request->input('id');
        $re_alltexts = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/keyaffair/st_exchange/re_petition_form', ['re_alltexts' => $re_alltexts]);
    }
    //修改申請資格
    public function re_petition_form(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $update_alltext =  DB::update('update alltext set dtext = ?,dtext_en = ?,date=? where id=?', [$editor, $editor_en, $date, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //交換生名單畫面
    public function student_list(Request $request)
    {
        $year = $request->input('year');
        $student_lists_1 = DB::select('SELECT * FROM internationalexchange WHERE  year=? AND sem=? ORDER BY id DESC', [$year, 1]);
        $student_lists_2 = DB::select('SELECT * FROM internationalexchange WHERE  year=? AND sem=? ORDER BY id DESC', [$year, 2]);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');

        return view('Backstage/keyaffair/st_exchange/student_list', ['ka_billboard_years' => $ka_billboard_years, 'student_lists_1' => $student_lists_1, 'student_lists_2' => $student_lists_2, 'year' => $year]);
    }

    //新增交換生名單畫面
    public function add_student_list_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/st_exchange/add_student_list', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //新增交換生名單
    public function add_student_list(Request $request)
    {
        try {
            $year = $request->input('year');
            $semester = $request->input('semester');
            $department_class = $request->input('department-class');
            $name = $request->input('name');
            $gender = $request->input('gender');
            $type = $request->input('type');
            $location = $request->input('location');
            $time = $request->input('time');

            $add_student_list = DB::statement('INSERT INTO internationalexchange (year, sem, dep, name, gender,type,position,period) VALUES (?,?,?,?,?,?,?,?)', [$year, $semester, $department_class, $name, $gender, $type, $location, $time]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改交換生名單畫面
    public function re_student_list_view(Request $request)
    {
        $id = $request->input('id');
        $student_lists = DB::select('SELECT * FROM internationalexchange where id=?', [$id]);
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/st_exchange/re_student_list', ['student_lists' => $student_lists, 'ka_billboard_years' => $ka_billboard_years]);
    }

    //修改交換生名單
    public function re_student_list(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $semester = $request->input('semester');
            $department_class = $request->input('department-class');
            $name = $request->input('name');
            $gender = $request->input('gender');
            $type = $request->input('type');
            $location = $request->input('location');
            $time = $request->input('time');

            $update_student_list = DB::update('update internationalexchange set year = ?,sem = ?,dep = ?,name = ?,gender = ?,type=?,position=?,period=? where id=?', [$year, $semester, $department_class, $name, $gender, $type, $location, $time, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除交換生名單
    public function delete_student_list(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_student_list = DB::delete('delete from internationalexchange where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //學習心得報告
    public function report(Request $request)
    {
        $reports = DB::select('SELECT *,internationalstudent.id as s_id FROM internationalstudent,internationalcountry  WHERE internationalstudent.country = internationalcountry.id ORDER BY internationalstudent.id DESC');
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('Backstage/keyaffair/st_exchange/report', ['reports' => $reports, 'countrys' => $countrys]);
    }

    //新增學習心得報告畫面
    public function add_report_view()
    {
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('Backstage/keyaffair/st_exchange/add_report', ['countrys' => $countrys]);
    }
    //新增學習心得報告
    public function add_report(Request $request)
    {
        try {
            $country = $request->input('country');
            $country_ids = DB::select('SELECT id FROM internationalcountry where country = ?', [$country]);
            foreach ($country_ids as $country_id) {
                $cid = $country_id->id;
            }
            $grade = $request->input('grade');
            $name = $request->input('name-ch');
            $name_en = $request->input('name-eng');
            $school = $request->input('school');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }

            $add_report = DB::statement('INSERT INTO internationalstudent (country, dep, name, ename, school,file) VALUES (?,?,?,?,?,?)', [$cid, $grade, $name, $name_en, $school, $filename]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改學習心得報告畫面
    public function re_report_view(Request $request)
    {
        $id = $request->input('id');

        $reports = DB::select('SELECT * FROM internationalstudent where id=?', [$id]);
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('Backstage/keyaffair/st_exchange/re_report', ['reports' => $reports, 'countrys' => $countrys]);
    }

    //修改學習心得報告
    public function re_report(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT file FROM internationalstudent where id=?', [$id]);
            foreach ($files as $file) {
                $oldfile = $file->file;
            }
            $country = $request->input('country');
            $country_ids = DB::select('SELECT id FROM internationalcountry where country = ?', [$country]);
            foreach ($country_ids as $country_id) {
                $cid = $country_id->id;
            }
            $grade = $request->input('grade');
            $name = $request->input('name-ch');
            $name_en = $request->input('name-eng');
            $school = $request->input('school');
            $file = $request->file('file');

            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }

            $update_report = DB::update('update internationalstudent set country = ?,dep = ?,name = ?,ename = ?,school = ?,file=? where id=?', [$cid, $grade, $name, $name_en, $school, $filename, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除學習心得報告
    public function delete_report(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_report = DB::delete('delete from internationalstudent where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增國家畫面
    public function add_country_view()
    {
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('Backstage/keyaffair/st_exchange/add_country', ['countrys' => $countrys]);
    }
    //新增國家
    public function add_country(Request $request)
    {
        try {
            $new_country = $request->input('new_country');
            $add_country = DB::statement('INSERT INTO internationalcountry (country) VALUES (?)', [$new_country]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //刪除國家畫面
    public function delete_country_view()
    {
        $countrys = DB::select('SELECT * FROM internationalcountry');
        return view('Backstage/keyaffair/st_exchange/delete_country', ['countrys' => $countrys]);
    }
    //刪除國家
    public function delete_country(Request $request)
    {
        try {
            $country = $request->input('country');
            $country_id = DB::select('SELECT id FROM internationalcountry where country = ?', [$country]);
            $delete_country = DB::delete('delete from internationalcountry where country = ?', [$country]);
            $delete_student = DB::delete('delete from internationalstudent where country = ?', [$country_id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //活動照片畫面
    public function activity_photo(Request $request)
    {
        $activity_photos = DB::select('SELECT * FROM studentphoto');
        return view('Backstage/keyaffair/st_exchange/activity_photo', ['activity_photos' => $activity_photos]);
    }

    //新增活動照片畫面
    public function add_activity_photo_view()
    {
        return view('Backstage/keyaffair/st_exchange/add_activity_photo');
    }
    //新增活動照片
    public function add_activity_photo(Request $request)
    {
        try {
            $title = $request->input('title');
            $description = $request->input('descrition');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }

            $add_activity_photo = DB::statement('INSERT INTO studentphoto (title, description, image) VALUES (?,?,?)', [$title, $description, $filename]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改活動照片畫面
    public function re_activity_photo_view(Request $request)
    {
        $id = $request->input('id');
        $studentphotos = DB::select('SELECT * FROM studentphoto where id=?', [$id]);
        return view('Backstage/keyaffair/st_exchange/re_activity_photo', ['studentphotos' => $studentphotos]);
    }

    //修改活動照片
    public function re_activity_photo(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT image FROM studentphoto where id=?', [$id]);
            foreach ($files as $file) {
                $oldfile = $file->image;
            }
            $title = $request->input('title');
            $description = $request->input('descrition');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }

            $update_activity_photo = DB::update('update studentphoto set title = ?,description = ?,image = ? where id=?', [$title, $description, $filename, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除活動照片畫面
    public function delete_activity_photo(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_activity_photo = DB::delete('delete from studentphoto where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //招生專區畫面
    public function admission()
    {
        $admissions = DB::select('SELECT * FROM admissions WHERE degree=? ORDER BY admissions_id DESC', ["undergraduate"]);
        $recruitstudents = DB::select('SELECT * FROM recruitstudent WHERE label=?', [1]);
        $masters = DB::select('SELECT * FROM recruitstudent WHERE label=?', [2]);
        $institutes = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['institute']);
        $sscs = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['ssc']);
        $transfers = DB::select('SELECT * FROM exam WHERE type=? ORDER BY year DESC', ['transfer']);
        $eduequipment2s = DB::select('SELECT * FROM eduequipment2 ORDER BY id DESC');
        return view('Backstage/keyaffair/admission/admission', ['admissions' => $admissions, 'recruitstudents' => $recruitstudents, 'masters' => $masters, 'institutes' => $institutes, 'sscs' => $sscs, 'transfers' => $transfers, 'eduequipment2s' => $eduequipment2s]);
    }
    //新增招生專區畫面
    public function add_admission_view()
    {
        return view('Backstage/keyaffair/admission/add_admission');
    }
    //新增招生專區
    public function add_admission(Request $request)
    {
        try {
            $year = $request->input('year');
            $editor = $request->input('editor');
            $degree = 'undergraduate';
            $language = '中';
            $add_admission = DB::statement('INSERT INTO admissions (year, content, degree,language) VALUES (?,?,?,?)', [$year, $editor, $degree, $language]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改招生專區畫面
    public function re_admission_view(Request $request)
    {
        $id = $request->input('id');
        $admissions = DB::select('SELECT * FROM admissions where admissions_id=?', [$id]);
        return view('Backstage/keyaffair/admission/re_admission', ['admissions' => $admissions]);
    }

    //修改招生專區
    public function re_admission(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $editor = $request->input('editor');
            $degree = 'undergraduate';
            $language = '中';

            $update_admissions = DB::update('update admissions set year = ?,content = ?,degree = ?,language = ? where admissions_id=?', [$year, $editor, $degree, $language, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除招生專區畫面
    public function delete_admission(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_admission = DB::delete('delete from admissions where admissions_id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //新增考古題畫面
    public function add_institute_view()
    {
        return view('Backstage/keyaffair/admission/add_institute');
    }
    //新增考古題
    public function add_institute(Request $request)
    {
        try {
            $year = $request->input('year');
            $type = $request->input('type');
            $link = $request->input('link');

            $add_institute = DB::statement('INSERT INTO exam (year, type, link) VALUES (?,?,?)', [$year, $type, $link]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改考古題畫面
    public function re_institute_view(Request $request)
    {
        $id = $request->input('id');
        $exams = DB::select('SELECT * FROM exam where id=?', [$id]);
        return view('Backstage/keyaffair/admission/re_institute', ['exams' => $exams]);
    }

    //修改考古題
    public function re_institute(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $type = $request->input('type');
            $link = $request->input('link');

            $update_institute = DB::update('update exam set year = ?,type = ?,link = ? where id=?', [$year, $type, $link, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除考古題畫面
    public function delete_institute(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_institute = DB::delete('delete from exam where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //新增標竿校友畫面
    public function add_alumni_view()
    {
        return view('Backstage/keyaffair/admission/add_alumni');
    }
    //新增標竿校友
    public function add_alumni(Request $request)
    {
        try {
            $alumni = $request->input('alumni');
            $alumni_en = $request->input('alumni-eng');
            $work_unit = $request->input('work-unit');
            $work_unit_en = $request->input('work-unit-eng');
            $performance = $request->input('performance');
            $performance_en = $request->input('performance-eng');
            $info = $request->input('info');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }

            $add_alumni = DB::statement('INSERT INTO eduequipment2 (classname, classname_en, equipment,equipment_en,performance,performance_en,info,img) VALUES (?,?,?,?,?,?,?,?)', [$alumni, $alumni_en, $work_unit, $work_unit_en, $performance, $performance_en, $info, $filename]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改標竿校友畫面
    public function re_alumni_view(Request $request)
    {
        $id = $request->input('id');
        $alumnis = DB::select('SELECT * FROM eduequipment2 where id=?', [$id]);
        return view('Backstage/keyaffair/admission/re_alumni', ['alumnis' => $alumnis]);
    }

    //修改標竿校友
    public function re_alumni(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT img FROM eduequipment2 where id=?', [$id]);
            foreach ($files as $file) {
                $oldfile = $file->img;
            }
            $alumni = $request->input('alumni');
            $alumni_en = $request->input('alumni-eng');
            $work_unit = $request->input('work-unit');
            $work_unit_en = $request->input('work-unit-eng');
            $performance = $request->input('performance');
            $performance_en = $request->input('performance-eng');
            $info = $request->input('info');
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }

            $update_alumni = DB::update('update eduequipment2 set classname = ?,classname_en = ?,equipment = ?,equipment_en = ?,performance = ?,performance_en = ?,info = ?,img = ? where id=?', [$alumni, $alumni_en, $work_unit, $work_unit_en, $performance, $performance_en, $info, $filename, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除標竿校友畫面
    public function delete_alumni(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_alumni = DB::delete('delete from eduequipment2 where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改招生簡章畫面
    public function re_recruitstudent_view(Request $request)
    {
        $id = $request->input('id');
        $recruitstudents = DB::select('SELECT * FROM recruitstudent where id=?', [$id]);
        return view('Backstage/keyaffair/admission/re_recruitstudent', ['recruitstudents' => $recruitstudents]);
    }

    //修改招生簡章
    public function re_recruitstudent(Request $request)
    {
        try {
            $id = $request->input('id');
            $link = $request->input('link');

            $update_recruitstudent = DB::update('update recruitstudent set link = ? where id=?', [$link, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除招生簡章畫面
    public function delete_recruitstudent(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_recruitstudent = DB::delete('delete from recruitstudent where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改碩士班簡介畫面
    public function re_master_view(Request $request)
    {
        $id = $request->input('id');
        $masters = DB::select('SELECT * FROM recruitstudent where id=?', [$id]);
        return view('Backstage/keyaffair/admission/re_master', ['masters' => $masters]);
    }

    //修改碩士班簡介
    public function re_master(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');

            $update_master = DB::update('update recruitstudent set link = ? where id=?', [$editor, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //修改碩士班簡介畫面
    public function meeting(Request $request)
    {
        $id = $request->input('id');
        $meetings = DB::select('SELECT * FROM recruitstudent where label=?', [3]);
        return view('Backstage/keyaffair/meeting/meeting', ['meetings' => $meetings]);
    }
    //修改碩士班簡介畫面
    public function re_meeting_view(Request $request)
    {
        $id = $request->input('id');
        $meetings = DB::select('SELECT * FROM recruitstudent where id=?', [$id]);
        return view('Backstage/keyaffair/meeting/re_meeting', ['meetings' => $meetings]);
    }

    //修改碩士班簡介
    public function re_meeting(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');

            $update_meeting = DB::update('update recruitstudent set link = ? where id=?', [$editor, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }


    //學生產業實習
    public function industry(Request $request)
    {
        $year = $request->input('year');
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        $practices_1 = DB::select('SELECT * FROM practice WHERE year=? AND sem=? ORDER BY id DESC;', [$year, 1]);
        $practices_2 = DB::select('SELECT * FROM practice WHERE year=? AND sem=? ORDER BY id DESC;', [$year, 2]);
        return view('Backstage/keyaffair/industry/industry', ['ka_billboard_years' => $ka_billboard_years, 'practices_1' => $practices_1, 'practices_2' => $practices_2, 'year' => $year]);
    }

    //新增學生產業實習畫面
    public function add_industry_view()
    {
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        return view('Backstage/keyaffair/industry/add_industry', ['ka_billboard_years' => $ka_billboard_years]);
    }
    //新增學生產業實習
    public function add_industry(Request $request)
    {
        try {
            $year = $request->input('year');
            $semester = $request->input('semester');
            $department_class = $request->input('department-class');
            $name = $request->input('name');
            $unit = $request->input('unit');

            $add_industry = DB::statement('INSERT INTO practice (year, sem, dep, name, position) VALUES (?,?,?,?,?)', [$year, $semester, $department_class, $name, $unit]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改學生產業實習畫面
    public function re_industry_view(Request $request)
    {
        $id = $request->input('id');
        $ka_billboard_years = DB::select('SELECT DISTINCT year FROM ka_billboard_year ORDER BY year DESC');
        $industrys = DB::select('SELECT * FROM practice where id=?', [$id]);
        return view('Backstage/keyaffair/industry/re_industry', ['ka_billboard_years' => $ka_billboard_years,'industrys' => $industrys]);
    }

    //修改學生產業實習
    public function re_industry(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $semester = $request->input('semester');
            $department_class = $request->input('department-class');
            $name = $request->input('name');
            $unit = $request->input('unit');

            $update_industry = DB::update('update practice set year = ?,sem = ?,dep = ?,name = ?,position = ? where id=?', [$year, $semester, $department_class, $name, $unit, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除學生產業實習畫面
    public function delete_industry(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_industry = DB::delete('delete from practice where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
}
