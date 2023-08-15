<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Psy\Readline\Hoa\Console;

class BackstudentsController extends Controller
{
    //學生專區顯示
    public function back_student()
    {
        return view('Backstage/student/student');
    }
    //新增學生學年度畫面
    public function add_st_year_view()
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/add_st_year', ['practical_topics_years' => $practical_topics_years]);
    }
    //新增學生學年度
    public function add_st_year(Request $request)
    {
        try {
            $new_year = $request->input('new_year');
            $insert_year = DB::statement('INSERT INTO specialtopic_year (year) VALUES (?)', [$new_year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //刪除學生學年度畫面
    public function delete_st_year_view()
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/delete_st_year', ['practical_topics_years' => $practical_topics_years]);
    }
    //刪除學生學年度
    public function delete_st_year(Request $request)
    {
        try {
            $delete_year = $request->input('delete_year');
            $delete = DB::delete('delete from specialtopic_year where year = ?', [$delete_year]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //未來就業畫面
    public function future_employment()
    {
        $future_employments = DB::select('SELECT * , alumnijob.id as fe_id FROM alumnijob,alumnijob_department,alumnijob_class WHERE alumnijob.department=alumnijob_department.id AND alumnijob_department.class=alumnijob_class.id ORDER BY type DESC, year DESC');
        return view('Backstage/student/st_future_employment/future_employment', ['future_employments' => $future_employments]);
    }
    //修改未來就業畫面
    public function fe_modification_view(Request $request)
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $id = $request->input('id');
        #全部select選項
        $categorys = DB::select('SELECT *  FROM alumnijob_class');
        $jobtitles = DB::select('SELECT * , alumnijob_department.id as de_id FROM alumnijob_department,alumnijob_class WHERE alumnijob_department.class=alumnijob_class.id');
        #選擇的那筆資料
        $future_ids = DB::select('SELECT * , alumnijob.id as fe_id FROM alumnijob,alumnijob_department,alumnijob_class WHERE alumnijob.department=alumnijob_department.id AND alumnijob_department.class=alumnijob_class.id AND alumnijob.id = ? ORDER BY type DESC, year DESC', [$id]);
        return view('Backstage/student/st_future_employment/fe_modification', ['practical_topics_years' => $practical_topics_years, 'categorys' => $categorys, 'jobtitles' => $jobtitles, 'future_ids' => $future_ids]);
    }
    //修改未來就業
    public function fe_modification(Request $request)
    {
        try {
            $type = $request->input('system');
            $year = $request->input('graduate');
            $unit = $request->input('service_unit');
            $department = $request->input('department');
            $id = $request->input('id');

            DB::update('update alumnijob set type = ?,year = ?,unit = ?,department = ? where id=?', [$type, $year, $unit, $department, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除未來就業
    public function de_future_employment(Request $request)
    {
        try {
            $fe_id = $request->input('id');
            $delete_class = DB::delete('delete from alumnijob where id = ?', [$fe_id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }


    //新增類別畫面
    public function addcategory_view()
    {
        $categorys = DB::select('SELECT *  FROM alumnijob_class');
        return view('Backstage/student/st_future_employment/addcategory', ['categorys' => $categorys]);
    }
    //新增類別
    public function addcategory(Request $request)
    {
        try {
            $class = $request->input('class');
            $add_class = DB::statement('INSERT INTO alumnijob_class (class) VALUES (?)', [$class]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗');
        }
    }
    //刪除類別
    public function deletecategory(Request $request)
    {
        $category_id = $request->input('id');
        $delete_class = DB::delete('delete from alumnijob_class where id = ?', [$category_id]);

        return redirect()->back()->with('success', '刪除成功');
    }

    //新增職稱畫面
    public function addjobtitle_view()
    {
        $addjobtitles = DB::select('SELECT *  FROM alumnijob_department,alumnijob_class WHERE alumnijob_department.class=alumnijob_class.id');

        $classes = DB::select('SELECT *  FROM alumnijob_class');
        return view('Backstage/student/st_future_employment/addjobtitle', ['addjobtitles' => $addjobtitles, 'classes' => $classes]);
    }

    //新增職稱
    public function addjobtitle(Request $request)
    {
        try {
            $class = $request->input('class');
            $jobtitle = $request->input('jobtitle');
            $add_jobtitle = DB::statement('INSERT INTO alumnijob_department (class,department) VALUES (?,?)', [$class, $jobtitle]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }
    //刪除職稱
    public function deletejobtitle(Request $request)
    {
        try {
            $jobtitle_id = $request->input('id');
            $delete_class = DB::delete('delete from alumnijob_department where class = ?', [$jobtitle_id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }

    //新增資料畫面
    public function addinformation_view()
    {
        $categorys = DB::select('SELECT *  FROM alumnijob_class');
        $jobtitles = DB::select('SELECT *  FROM alumnijob_department,alumnijob_class WHERE alumnijob_department.class=alumnijob_class.id');
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/st_future_employment/addinformation', ['practical_topics_years' => $practical_topics_years, 'categorys' => $categorys, 'jobtitles' => $jobtitles]);
    }
    //新增資料
    public function addinformation(Request $request)
    {
        try {
            $system = $request->input('system');
            $year = $request->input('year');
            $service_unit = $request->input('service_unit');
            $department = $request->input('department');

            $department_ids = DB::select('SELECT id FROM alumnijob_department WHERE alumnijob_department.class=?', [$department]);
            foreach ($department_ids as $department_id) {
                $id = $department_id->id;
            }
            // dd($id); DD是用來測試debug的function()
            DB::statement('INSERT INTO alumnijob (type,year,unit,department) VALUES (?,?,?,?)', [$system, $year, $service_unit, $id]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //學生作品
    public function student_work_view(Request $request)
    {
        $year = $request->input('year');
        $studentworks = DB::select('SELECT * FROM swork,sworkstudent where swork.id = sworkstudent.id AND year = ? AND type=?', [$year, 1]);

        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/st_work/student_work', ['practical_topics_years' => $practical_topics_years, 'studentworks' => $studentworks]);
    }
    //新增學生作品畫面
    public function add_sw_result_view(Request $request)
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $teachers = DB::select('SELECT * FROM teacher WHERE tcategory=? order by name desc', [1]);
        return view('Backstage/student/st_work/add_sw_result', ['practical_topics_years' => $practical_topics_years, 'teachers' => $teachers]);
    }
    //新增學生作品
    public function add_sw_result(Request $request)
    {
        try {
            $year = $request->input('year');
            $topic_ch = $request->input('topic-ch');
            $topic_eng = $request->input('topic-eng');
            $content = $request->input('editor');
            $econtent = $request->input('editor_en');
            $teacher = $request->input('teacher');
            $t = explode("@", $teacher);
            $teacher = $t[0];
            $eteacher = $t[1];
            $type = $request->input('type');
            $add_sw_result = DB::statement('INSERT INTO swork (year, topic, etopic, content, econtent, teacher, eteacher, type) VALUES (?,?,?,?,?,?,?,?)', [$year, $topic_ch, $topic_eng, $content, $econtent, $teacher, $eteacher, $type]);
            $new_result = DB::select('SELECT * FROM swork WHERE year=? AND topic=? ORDER BY id DESC LIMIT 1', [$year, $topic_ch]);
            $new_result = json_decode(json_encode($new_result), true);
            $student_name = $request->input('student-name');
            $student_name_eng = $request->input('student-name-eng');
            $lnum = count($student_name);
            for ($i = 0; $i < $lnum; $i++) {
                if ($student_name[$i] != '') {
                    $add_student = DB::statement('INSERT INTO sworkstudent (id, name, ename) VALUES (?,?,?)', [$new_result[0]['id'], $student_name[$i], $student_name_eng[$i]]);
                }
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //刪除學生作品
    public function delete_studentwork(Request $request)
    {
        try {
            $id = $request->input('id');
            $t = explode("@", $id);
            $student_id = $t[0];
            $swork_id = $t[1];
            $select_st = DB::select('select * from sworkstudent where sworkstudent.id = ?', [$swork_id]);
            $new_st = json_decode(json_encode($select_st), true);
            $lnum = count($new_st);
            if ($lnum > 1) {
                $delete_st = DB::delete('DELETE FROM sworkstudent where student_id = ?', [$student_id]);
            } else {
                $select_sts = DB::select('select filemovie from swork,sworkstudent where swork.id = sworkstudent.id AND sworkstudent.id = ?', [$swork_id]);

                foreach ($select_sts as $select_st) {
                    $filename = $select_st->filemovie;
                }
                if ($filename != null) {
                    $fullPath = public_path('download/') . $filename;
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
                $delete_st = DB::delete('DELETE swork, sworkstudent FROM swork INNER JOIN sworkstudent ON swork.id = sworkstudent.id WHERE sworkstudent.student_id = ?', [$student_id]);
            }
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }
    //修改學生作品畫面
    public function re_sw_result_view(Request $request)
    {
        $id = $request->input('id');
        $st_id = $request->input('st_id');
        $sw_results = DB::select('SELECT * FROM swork,sworkstudent WHERE swork.id = sworkstudent.id and sworkstudent.student_id=?', [$st_id]);
        return view('Backstage/student/st_work/re_sw_result', ['sw_results' => $sw_results]);
    }

    //修改學生作品
    public function re_sw_result(Request $request)
    {
        try {
            $student_name = $request->input('student-name');
            $student_name_eng = $request->input('student-name-eng');
            $st_id = $request->input('st_id');
            DB::update('update sworkstudent set name = ?,ename = ? where student_id=?', [$student_name, $student_name_eng, $st_id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //學生活動
    public function student_activate_view()
    {
        $studentactivitys = DB::select('SELECT * FROM studentactivity ORDER BY id DESC');
        return view('Backstage/student/st_activities/student_activate', ['studentactivitys' => $studentactivitys]);
    }
    //新增學生活動畫面
    public function add_st_activate_view()
    {
        return view('Backstage/student/st_activities/add_st_activate');
    }
    //新增學生活動
    public function add_st_activate(Request $request)
    {
        try {
            $date = $request->input('date');
            $event = $request->input('event-location-ch');
            $event_en = $request->input('event-location-eng');
            $name_ch = $request->input('event-name-ch');
            $name_en = $request->input('event-name-eng');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $add_st_activate = DB::statement('INSERT INTO studentactivity (date, location, location_en, activityname, activityname_en, activitycontent, activitycontent_en) VALUES (?,?,?,?,?,?,?)', [$date, $event, $event_en, $name_ch, $name_en, $editor, $editor_en]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //修改學生活動畫面
    public function re_st_activate_view(Request $request)
    {
        $id = $request->input('id');
        $studentactivitys = DB::select('SELECT * FROM studentactivity WHERE id = ? ', [$id]);
        return view('Backstage/student/st_activities/re_st_activate', ['studentactivitys' => $studentactivitys]);
    }

    //修改學生活動
    public function re_st_activate(Request $request)
    {
        try {
            $id = $request->input('id');
            $date = $request->input('date');
            $event = $request->input('event-location-ch');
            $event_en = $request->input('event-location-eng');
            $name_ch = $request->input('event-name-ch');
            $name_en = $request->input('event-name-eng');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            DB::update(
                'update studentactivity set date = ?,location = ?,location_en = ?,activityname = ?,activityname_en = ?,activitycontent = ?,activitycontent_en = ? where id=?',
                [$date, $event, $event_en, $name_ch, $name_en, $editor, $editor_en, $id]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //刪除學生活動
    public function delete_st_activate(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_st = DB::delete('DELETE FROM studentactivity WHERE id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }
    //碩士論文顯示
    public function back_thesis(Request $request)
    {
        $year = $request->input('year');
        $method_files = DB::select('SELECT * FROM thesismethod');
        $relate_files = DB::select('SELECT * FROM thesisdownload');
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $thesis_files = DB::select('SELECT * FROM thesis,thesis_teacher where thesis.id = thesis_teacher.id and year=?', [$year]);
        return view('Backstage/student/st_thesis/thesis', ['method_files' => $method_files, 'relate_files' => $relate_files, 'practical_topics_years' => $practical_topics_years, 'thesis_files' => $thesis_files]);
    }
    //新增相關辦法顯示
    public function add_method_file_view()
    {
        return view('Backstage/student/st_thesis/add_method_file');
    }
    //新增相關辦法
    public function add_method_file(Request $request)
    {
        try {
            // 取得中文檔案
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }
            // 取得英文檔案
            $file_en = $request->file('file_en');
            if ($file_en != null) {
                $filename_en = $file->getClientOriginalName();
                $file_en->move(public_path('download'), $filename_en);
            } else {
                $filename_en = null;
            }
            $description = $request->input('description');
            $edescription = $request->input('edescription');
            $category = 1;
            $weight_num = DB::select('SELECT weight FROM thesismethod where category=?', [$category]);
            $num = count($weight_num);
            $weight = $num + 1;
            $add_thesismethod = DB::statement('INSERT INTO thesismethod (description, edescription, file, file_en, category,weight) VALUES (?,?,?,?,?,?)', [$description, $edescription, $filename, $filename_en, $category, $weight]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改相關辦法顯示
    public function re_method_file_view(Request $request)
    {
        $id = $request->input('id');
        $re_methods = DB::select('SELECT * FROM thesismethod where id=?', [$id]);
        return view('Backstage/student/st_thesis/re_method_file', ['re_methods' => $re_methods]);
    }
    //修改相關辦法
    public function re_method_file(Request $request)
    {
        try {
            $id = $request->input('id');
            $re_methods = DB::select('SELECT * FROM thesismethod where id=?', [$id]);

            $description = $request->input('description');
            $edescription = $request->input('edescription');
            $file = $request->file('file');
            $file_en = $request->file('file_en');
            foreach ($re_methods as $re_method) {
                $oldfile = $re_method->file;
                $oldfile_en = $re_method->file;
            }

            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }
            if ($file_en != null) {
                $filename_en = $file_en->getClientOriginalName();
                $file_en->move(public_path('download'), $filename_en);
            } else {
                $filename_en = $oldfile_en;
            }
            DB::update('update thesismethod set description = ?,edescription = ?,file = ?,file_en = ? where id=?', [$description, $edescription, $filename, $filename_en, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除相關辦法
    public function delete_method_file(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT * FROM thesismethod WHERE id = ?', [$id]);
            foreach ($files as $file) {
                $filename = $file->file;
                $filename_en = $file->file_en;
            }
            $fullPath = public_path('download/') . $filename;
            $fullPath_en = public_path('download/') . $filename_en;
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            if (file_exists($fullPath_en)) {
                unlink($fullPath_en);
            }
            $delete_method_file = DB::delete('delete from thesismethod where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //新增相關表單顯示
    public function add_related_form_view()
    {
        return view('Backstage/student/st_thesis/add_related_form');
    }

    //新增相關辦法
    public function add_related_form(Request $request)
    {
        try {
            // 取得中文檔案
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }
            // 取得英文檔案
            $file_en = $request->file('file_en');
            if ($file_en != null) {
                $filename_en = $file_en->getClientOriginalName();
                $file_en->move(public_path('download'), $filename_en);
            } else {
                $filename_en = null;
            }
            $description = $request->input('description');
            $edescription = $request->input('edescription');
            $add_thesismethod = DB::statement('INSERT INTO thesisdownload (description, edescription, file, file_en) VALUES (?,?,?,?)', [$description, $edescription, $filename, $filename_en]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改相關辦法顯示
    public function re_related_form_view(Request $request)
    {
        $id = $request->input('id');
        $re_relateds = DB::select('SELECT * FROM thesisdownload where id=?', [$id]);
        return view('Backstage/student/st_thesis/re_related_form', ['re_relateds' => $re_relateds]);
    }
    //修改相關辦法
    public function re_related_form(Request $request)
    {
        try {
            $id = $request->input('id');
            $re_methods = DB::select('SELECT * FROM thesisdownload where id=?', [$id]);

            $description = $request->input('description');
            $edescription = $request->input('edescription');
            $file = $request->file('file');
            $file_en = $request->file('file_en');
            foreach ($re_methods as $re_method) {
                $oldfile = $re_method->file;
                $oldfile_en = $re_method->file;
            }

            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }
            if ($file_en != null) {
                $filename_en = $file_en->getClientOriginalName();
                $file_en->move(public_path('download'), $filename_en);
            } else {
                $filename_en = $oldfile_en;
            }
            DB::update('update thesisdownload set description = ?,edescription = ?,file = ?,file_en = ? where id=?', [$description, $edescription, $filename, $filename_en, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除相關辦法
    public function delete_related_form(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT * FROM thesisdownload WHERE id = ?', [$id]);
            foreach ($files as $file) {
                $filename = $file->file;
                $filename_en = $file->file_en;
            }
            $fullPath = public_path('download/') . $filename;
            $fullPath_en = public_path('download/') . $filename_en;
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            if (file_exists($fullPath_en)) {
                unlink($fullPath_en);
            }
            $delete_method_file = DB::delete('delete from thesisdownload where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增碩士論文顯示
    public function add_thesis_view()
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $teachers = DB::select('SELECT * FROM teacher WHERE tcategory=? order by name desc', [1]);
        return view('Backstage/student/st_thesis/add_thesis', ['practical_topics_years' => $practical_topics_years, 'teachers' => $teachers]);
    }
    //新增碩士論文顯示
    public function add_thesis(Request $request)
    {
        try {
            $year = $request->input('year');
            $author = $request->input('author');
            $author_eng = $request->input('author-eng');
            $topic = $request->input('topic');
            $topic_eng = $request->input('topic-eng');
            $teacher = $request->input('teacher');
            $t = explode("@", $teacher);
            $teacher = $t[0];
            $eteacher = $t[1];
            $add_thesis = DB::statement('INSERT INTO thesis (year, author, eauthor, topic, etopic) VALUES (?,?,?,?,?)', [$year, $author, $author_eng, $topic, $topic_eng]);
            $thesises = DB::select('SELECT * FROM thesis order by id desc LIMIT 1');
            foreach ($thesises as $thesis) {
                $id = $thesis->id;
            }
            $add_thesis_teacher = DB::statement('INSERT INTO thesis_teacher (teacher, eteacher,id) VALUES (?,?,?)', [$teacher, $eteacher, $id]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }
    //修改碩士論文顯示
    public function re_thesis_view(Request $request)
    {
        $id = $request->input('id');
        $thesis_ids = DB::select('SELECT * FROM thesis,thesis_teacher where thesis.id = thesis_teacher.id and thesis.id=?', [$id]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $teachers = DB::select('SELECT * FROM teacher WHERE tcategory=? order by name desc', [1]);
        return view('Backstage/student/st_thesis/re_thesis', ['practical_topics_years' => $practical_topics_years, 'teachers' => $teachers, 'thesis_ids' => $thesis_ids]);
    }
    //修改碩士論文
    public function re_thesis(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $author = $request->input('author');
            $eauthor = $request->input('author-eng');
            $topic = $request->input('topic');
            $etopic = $request->input('topic-eng');
            $teacher = $request->input('teacher');
            $t = explode("@", $teacher);
            $teacher = $t[0];
            $eteacher = $t[1];
            $re_thesis = DB::update(
                'update thesis set year = ?,author = ?,eauthor = ?,topic = ? ,etopic = ?  where id=?',
                [$year, $author, $eauthor, $topic, $etopic, $id]
            );
            $re_thesis_teacher = DB::update(
                'update thesis_teacher set teacher = ?,eteacher = ? where id =?',
                [$teacher, $eteacher, $id]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除碩士論文
    public function delete_thesis(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete_thesis = DB::delete('delete from thesis where id  = ?', [$id]);
            $delete_thesis_teacher = DB::delete('delete from thesis_teacher where id  = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }
    //學生實務專題顯示
    public function practical_topics(Request $request)
    {
        $year = $request->input('year');
        #學生實務辦法
        $specialtopic_methods = DB::select('SELECT * FROM specialtopic_method WHERE year=? ORDER BY lang ASC, date DESC;', [$year]);
        #學生下載檔案
        $pt_downloads = DB::select('SELECT * FROM topRelatedForm ORDER BY weight ASC');
        #學生實習單位
        $internships = DB::select('SELECT * FROM specialtopicpractice');
        #學生成果
        $results = DB::select('SELECT * FROM specialtopic WHERE year=?', [$year]);
        #抓取行政人員的id，並存在陣列變數中
        $result_ids = array_column($results, 'id');
        #array_fill()創建一個新的array[起始位置,數量,變數]=>[?,?,?,?,?...]
        #implode()將陣列改成字串=>'?,?,?,?,?...'
        $placeholders = implode(',', array_fill(0, count($result_ids ?: [-1]), '?'));
        $result_students = DB::select("SELECT * FROM specialtopicstudent WHERE id IN ($placeholders)", $result_ids ?: [-1]);

        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');

        return view('Backstage/student/st_practical_topics/practical_topics', ['year' => $year, 'specialtopic_methods' => $specialtopic_methods, 'pt_downloads' => $pt_downloads, 'internships' => $internships, 'results' => $results, 'result_students' => $result_students, 'practical_topics_years' => $practical_topics_years]);
    }

    //新增學生實務辦法畫面
    public function add_implement_method_view()
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/st_practical_topics/add_implement_method', ['practical_topics_years' => $practical_topics_years]);
    }
    //新增學生實務辦法
    public function add_implement_method(Request $request)
    {
        try {
            $year = $request->input('year');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $date = date('Y-m-d H:i:s', time());
            if ($editor != "") {
                $add_download = DB::statement('INSERT INTO specialtopic_method (year, lang, dtext, date) VALUES (?,?,?,?)', [$year, '中', $editor, $date]);
            }
            if ($editor_en != "") {
                $add_download = DB::statement('INSERT INTO specialtopic_method (year, lang, dtext, date) VALUES (?,?,?,?)', [$year, '英', $editor_en, $date]);
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }
    //修改學生實務辦法畫面
    public function re_implement_method_view(Request $request)
    {
        $id = $request->input('id');
        $specialtopic_methods = DB::select('SELECT * FROM specialtopic_method where id=?', [$id]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/st_practical_topics/re_implement_method', ['specialtopic_methods' => $specialtopic_methods, 'practical_topics_years' => $practical_topics_years]);
    }
    //修改學生實務辦法
    public function re_implement_method(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $date = date('Y-m-d H:i:s', time());
            if ($editor != "") {
                $update_download =  DB::update('update specialtopic_method set year = ?,lang = ?,dtext = ?,date = ? where id=?', [$year, '中', $editor, $date, $id]);
            }
            if ($editor_en != "") {
                $update_download =  DB::update('update specialtopic_method set year = ?,lang = ?,dtext = ?,date = ? where id=?', [$year, '英', $editor, $date, $id]);
            }
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除學生實務辦法
    public function delete_implement_method(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from specialtopic_method where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }


    //新增學生下載檔案畫面
    public function add_pt_download_view()
    {
        return view('Backstage/student/st_practical_topics/add_pt_download');
    }
    //新增學生下載檔案
    public function add_pt_download(Request $request)
    {
        try {
            $description = $request->input('file-description');
            $edescription = $request->input('file-description-eng');
            $files_pdf = $request->file('file-pdf');
            $files_word = $request->file('file-word');
            $files_odt = $request->file('file-odt');
            $enfile = $request->file('file-eng');
            if ($files_pdf != null) {
                $filename_pdf = $files_pdf->getClientOriginalName();
                $files_pdf->move(public_path('download'), $filename_pdf);
            } else {
                $filename_pdf = null;
            }

            if ($files_word != null) {
                $filename_word = $files_word->getClientOriginalName();
                $files_word->move(public_path('download'), $filename_word);
            } else {
                $filename_word = null;
            }

            if ($files_odt != null) {
                $filename_odt = $files_odt->getClientOriginalName();
                $files_odt->move(public_path('download'), $filename_odt);
            } else {
                $filename_odt = null;
            }

            if ($enfile != null) {
                $filename_en = $enfile->getClientOriginalName();
                $enfile->move(public_path('download'), $filename_en);
            } else {
                $filename_en = null;
            }
            $weight_num = DB::select('SELECT weight FROM toprelatedform');
            $num = count($weight_num);
            $weight = $num + 1;
            $add_download = DB::statement('INSERT INTO toprelatedform (description, edescription, file, file_en, file_word,weight, file_odt) VALUES (?,?,?,?,?,?,?)', [$description, $edescription, $filename_pdf, $filename_en, $filename_word, $weight, $filename_odt]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }
    //修改學生下載檔案畫面
    public function re_pt_download_view(Request $request)
    {
        $id = $request->input('id');
        $toprelatedforms = DB::select('SELECT * FROM toprelatedform where id = ?', [$id]);
        return view('Backstage/student/st_practical_topics/re_pt_download', ['toprelatedforms' => $toprelatedforms]);
    }
    //修改學生下載檔案
    public function re_pt_download(Request $request)
    {
        try {
            $id = $request->input('id');
            $description = $request->input('file-description');
            $edescription = $request->input('file-description-eng');
            $files_pdf = $request->file('file-pdf');
            $files_word = $request->file('file-word');
            $files_odt = $request->file('file-odt');
            $enfile = $request->file('file-eng');
            if ($files_pdf != null) {
                $filename_pdf = $files_pdf->getClientOriginalName();
                $files_pdf->move(public_path('download'), $filename_pdf);
            } else {
                $filename_pdf = null;
            }
            if ($files_word != null) {
                $filename_word = $files_word->getClientOriginalName();
                $files_word->move(public_path('download'), $filename_word);
            } else {
                $filename_word = null;
            }
            if ($files_odt != null) {
                $filename_odt = $files_odt->getClientOriginalName();
                $files_odt->move(public_path('download'), $filename_odt);
            } else {
                $filename_odt = null;
            }
            if ($enfile != null) {
                $filename_en = $enfile->getClientOriginalName();
                $enfile->move(public_path('download'), $filename_en);
            } else {
                $filename_en = null;
            }
            $re_download = DB::update('update toprelatedform set description = ?,edescription = ?,file = ?,file_en = ?,file_word = ?,file_odt = ? where id=?', [$description, $edescription, $filename_pdf, $filename_en, $filename_word, $filename_odt, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除學生下載檔案
    public function delete_pt_download(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT * FROM topRelatedForm WHERE id = ?', [$id]);
            foreach ($files as $file) {
                $filename_pdf = $file->file;
                $filename_word = $file->file_word;
                $filename_odt = $file->file_odt;
                $filename_en = $file->file_en;
            }
            $fullPath_pdf = public_path('download/') . $filename_pdf;
            $fullPath_word = public_path('download/') . $filename_word;
            $fullPath_odt = public_path('download/') . $filename_odt;
            $fullPath_en = public_path('download/') . $filename_en;
            if ($filename_pdf != null) {
                if (file_exists($fullPath_pdf)) {
                    unlink($fullPath_pdf);
                }
            }
            if ($filename_word != null) {
                if (file_exists($fullPath_word)) {
                    unlink($fullPath_word);
                }
            }
            if ($filename_odt != null) {
                if (file_exists($fullPath_odt)) {
                    unlink($fullPath_odt);
                }
            }
            if ($filename_en != null) {
                if (file_exists($fullPath_en)) {
                    unlink($fullPath_en);
                }
            }
            $delete = DB::delete('delete from topRelatedForm where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }

    //新增學生實習單位畫面
    public function add_internship_view()
    {
        $modes = DB::select('SELECT DISTINCT mode FROM specialtopicpractice ORDER BY mode DESC');
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/st_practical_topics/add_internship', ['practical_topics_years' => $practical_topics_years, 'modes' => $modes]);
    }
    //新增學生實習單位
    public function add_internship(Request $request)
    {
        try {
            $year = $request->input('year');
            $Internships = $request->input('Internships');
            $Internships_en = $request->input('Internships-eng');
            $contact_person = $request->input('contact-person');
            $contact_mode = $request->input('contact-mode');
            if ($contact_mode != '文創商溝組') {
                $label = 1;
            } else {
                $label = 0;
            }
            $contact_phone = $request->input('contact-phone');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $add_internship = DB::statement('INSERT INTO specialtopicpractice (year, unit, eunit, people,mode, number,label, content, content_en) VALUES (?,?,?,?,?,?,?,?,?)', [$year, $Internships, $Internships_en, $contact_person, $contact_mode, $contact_phone, $label, $editor, $editor_en]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }
    //修改學生實習單位畫面
    public function re_internship_view(Request $request)
    {
        $id = $request->input('id');
        $specialtopicpractices = DB::select('SELECT * FROM specialtopicpractice where id=?', [$id]);
        $modes = DB::select('SELECT DISTINCT mode FROM specialtopicpractice ORDER BY mode DESC');
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        return view('Backstage/student/st_practical_topics/re_internship', ['practical_topics_years' => $practical_topics_years, 'modes' => $modes, 'specialtopicpractices' => $specialtopicpractices]);
    }
    //修改學生實習單位
    public function re_internship(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $Internships = $request->input('Internships');
            $Internships_en = $request->input('Internships-eng');
            $contact_person = $request->input('contact-person');
            $contact_mode = $request->input('contact-mode');
            if ($contact_mode != '文創商溝組') {
                $label = 1;
            } else {
                $label = 0;
            }
            $contact_phone = $request->input('contact-phone');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $update_special = DB::update('update specialtopicpractice set year = ?,unit = ?,eunit = ?,people = ?,mode = ?,number = ?,label = ?,content = ?,content_en = ? where id=?', [$year, $Internships, $Internships_en, $contact_person, $contact_mode, $contact_phone, $label, $editor, $editor_en, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除學生實習單位
    public function delete_internship(Request $request)
    {

        $id = $request->input('id');
        $delete = DB::delete('delete from specialtopicpractice where id = ?', [$id]);
        return redirect()->back()->with('success', '刪除成功');
    }

    //新增學生成果顯示
    public function add_result_view()
    {
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $teachers = DB::select('SELECT * FROM teacher WHERE tcategory=? order by name desc', [1]);
        return view('Backstage/student/st_practical_topics/add_result', ['practical_topics_years' => $practical_topics_years, 'teachers' => $teachers]);
    }
    //新增學生成果
    public function add_result(Request $request)
    {
        try {
            $year = $request->input('year');
            $classification = $request->input('classification');
            $type = $request->input('type');
            $topic_ch = $request->input('topic-ch');
            $topic_en = $request->input('topic-eng');
            $teacher = $request->input('teacher');
            $t = explode("@", $teacher);
            $teacher = $t[0];
            $eteacher = $t[1];
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }
            $add_internship = DB::statement('INSERT INTO specialtopic (year, category, type, topic,etopic, teacher,eteacher, filemovie) VALUES (?,?,?,?,?,?,?,?)', [$year, $classification, $type, $topic_ch, $topic_en, $teacher, $eteacher, $filename]);

            $new_result = DB::select('SELECT * FROM specialtopic WHERE year=? ORDER BY id DESC LIMIT 1', [$year]);
            $new_result = json_decode(json_encode($new_result), true);
            $student_name = $request->input('student-name');
            $student_name_en = $request->input('student-name-eng');
            $student_nunber = $request->input('student-number');

            $lnum = count($student_name);
            for ($i = 0; $i < $lnum; $i++) {
                if ($student_name[$i] != '') {
                    $add_student = DB::statement('INSERT INTO specialtopicstudent (id, name, ename,number) VALUES (?,?,?,?)', [$new_result[0]['id'], $student_name[$i], $student_name_en[$i], $student_nunber[$i]]);
                }
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }
    //修改學生成果顯示
    public function re_result_view(Request $request)
    {
        $id = $request->input('id');
        $specialtopics = DB::select('SELECT * FROM specialtopic WHERE id=?', [$id]);
        $st_students = DB::select('SELECT * FROM specialtopicstudent WHERE id=?', [$id]);
        $practical_topics_years = DB::select('SELECT DISTINCT year FROM specialtopic_year ORDER BY year DESC');
        $teachers = DB::select('SELECT * FROM teacher WHERE tcategory=? order by name desc', [1]);
        return view('Backstage/student/st_practical_topics/re_result', ['practical_topics_years' => $practical_topics_years, 'teachers' => $teachers, 'specialtopics' => $specialtopics, 'st_students' => $st_students]);
    }
    //修改學生成果
    public function re_result(Request $request)
    {
        try {
            $id = $request->input('id');
            $new_results = DB::select('SELECT * FROM specialtopic WHERE id=? ', [$id]);

            foreach ($new_results as $new_result) {
                $filename = $new_result->filemovie;
            }
            $year = $request->input('year');
            $classification = $request->input('classification');
            $type = $request->input('type');
            $topic_ch = $request->input('topic-ch');
            $topic_en = $request->input('topic-eng');
            $teacher = $request->input('teacher');
            $t = explode("@", $teacher);
            $teacher = $t[0];
            $eteacher = $t[1];
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            }

            $add_internship = DB::update('update specialtopic set year = ?,category = ?,type = ?,topic = ?,etopic = ?,teacher = ?,eteacher = ?, filemovie=? where id=?', [$year, $classification, $type, $topic_ch, $topic_en, $teacher, $eteacher, $filename, $id]);

            $old_st = DB::select('SELECT * FROM specialtopicstudent WHERE id=?', [$id]);
            $old_st = json_decode(json_encode($old_st), true);
            $student_name = $request->input('student-name');
            $student_name_en = $request->input('student-name-eng');
            $student_nunber = $request->input('student-number');
            $lnum = count($student_name);
            for ($i = 0; $i < $lnum; $i++) {
                if ($student_name[$i] != '') {
                    $add_student = DB::update('update specialtopicstudent set name = ?,ename = ?,number = ? where st_id=?', [$student_name[$i], $student_name_en[$i], $student_nunber[$i], $old_st[$i]['st_id']]);
                }
            }

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除學生成果
    public function delete_result(Request $request)
    {
        try {
            $id = $request->input('id');
            $t = explode("@", $id);
            $specialtopic_id = $t[0];
            $student_id = $t[1];
            $select_st = DB::select('select * from specialtopicstudent where id = ?', [$specialtopic_id]);
            $new_st = json_decode(json_encode($select_st), true);
            $lnum = count($new_st);
            if ($lnum > 1) {
                $delete_st = DB::delete('DELETE FROM specialtopicstudent where st_id = ?', [$student_id]);
            } else {
                $select_sts = DB::select('select filemovie from specialtopic where id = ?', [$specialtopic_id]);

                foreach ($select_sts as $select_st) {
                    $filename = $select_st->filemovie;
                }

                if ($filename != null) {
                    $fullPath = public_path('download/') . $filename;
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
                $delete_1 = DB::delete('DELETE FROM specialtopic WHERE id = ?', [$specialtopic_id]);
                $delete_2 = DB::delete('DELETE FROM specialtopicstudent where st_id = ?', [$student_id]);
            }
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }



    //學生下載專區顯示
    public function st_download()
    {
        $downloads = DB::select('SELECT * FROM downloadarea where category=? ORDER BY weight ASC', [1]);
        return view('Backstage/student/st_download/st_download', ['downloads' => $downloads]);
    }

    //新增學生下載專區畫面
    public function add_download_view()
    {
        return view('Backstage/student/st_download/add_download_view');
    }
    //新增學生下載專區檔案
    public function add_download(Request $request)
    {

        // 取得中文檔案
        $file = $request->file('file');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('download'), $filename);
        } else {
            $filename = null;
        }

        // 取得英文檔案
        $file_en = $request->file('file_en');
        if ($file_en != null) {
            $filename_en = $file->getClientOriginalName();
            $file_en->move(public_path('download'), $filename_en);
        } else {
            $filename_en = null;
        }

        $description = $request->input('description');
        $edescription = $request->input('edescription');
        $category = 1;
        $weight_num = DB::select('SELECT weight FROM downloadarea where category=?', [$category]);
        $num = count($weight_num);
        $weight = $num + 1;

        $add_download = DB::statement('INSERT INTO downloadarea (description, edescription, file, file_en, category,weight) VALUES (?,?,?,?,?,?)', [$description, $edescription, $filename, $filename_en, $category, $weight]);
        return redirect()->back()->with('success', '新增成功');
    }

    //刪除學生下載專區檔案
    public function delete_download(Request $request)
    {
        $id = $request->input('id');
        $delete = DB::delete('delete from downloadarea where id = ?', [$id]);
        return redirect()->back()->with('success', '刪除成功');
    }
}
