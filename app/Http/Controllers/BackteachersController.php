<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackteachersController extends Controller
{
    //系所師資畫面
    public function back_teacher()
    {   //{專任師資:1,兼任教師:2,辦公人員:3,相關師資:4,退任人員:5}
        $F_teachers = DB::select('SELECT * FROM teacher where tcategory=?', [1]);
        $P_teachers = DB::select('SELECT * FROM teacher where tcategory=?', [2]);
        $Office_staffs = DB::select('SELECT * FROM teacher where tcategory=?', [3]);
        $Relate_teachers = DB::select('SELECT * FROM teacher where tcategory=?', [4]);
        $Retire_teachers = DB::select('SELECT * FROM teacher where tcategory=?', [5]);
        return view('Backstage/teacher/back_teacher', ['F_teachers' => $F_teachers, 'P_teachers' => $P_teachers, 'Office_staffs' => $Office_staffs, 'Relate_teachers' => $Relate_teachers, 'Retire_teachers' => $Retire_teachers]);
    }
    //新增系所師資畫面
    public function add_back_teacher_view()
    {   //{專任師資:1,兼任教師:2,辦公人員:3,相關師資:4,退任人員:5}
        $T_categorys = DB::select('SELECT * FROM tcategory');
        return view('Backstage/teacher/add_back_teacher', ['T_categorys' => $T_categorys]);
    }
    //新增系所師資
    public function add_back_teacher(Request $request)
    {
        try {
            $account = $request->input('account');
            $password = $request->input('password');
            $name = $request->input('name');
            $category = $request->input('category');
            $insert_acc = DB::statement('INSERT INTO acc (acc,pass,name) VALUES (?,?,?)', [$account, $password, $name]);
            $insert_teacher = DB::statement('INSERT INTO teacher (name,tcategory) VALUES (?,?)', [$name, $category]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改帳密畫面
    public function re_acc_teacher_view(Request $request)
    {
        $name = $request->input('name');
        $T_accs = DB::select('SELECT * FROM acc where name=?', [$name]);
        return view('Backstage/teacher/re_acc_teacher', ['T_accs' => $T_accs]);
    }
    //修改帳密
    public function re_acc_teacher(Request $request)
    {
        try {
            $id = $request->input('id');
            $account = $request->input('account');
            $password = $request->input('password');
            $update_acc =  DB::update('update acc set acc = ?,pass = ? where id=?', [$account, $password, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //修改專任教師資料畫面
    public function re_teacher_profile_view(Request $request)
    {
        $name = $request->input('name');
        $T_profiles = DB::select('SELECT * FROM teacher where name=?', [$name]);
        return view('Backstage/teacher/re_teacher_profile', ['T_profiles' => $T_profiles]);
    }
    //修改專任教師資料
    public function re_teacher_profile(Request $request)
    {
        try {
            $name = $request->input('name');
            $ename = $request->input('ename');
            $job_title = $request->input('job_title');
            $ejob_title = $request->input('ejob_title');
            $highest_education = $request->input('highest_education');
            $ehighest_education = $request->input('ehighest_education');
            $office = $request->input('office');
            $extension = $request->input('extension');
            $mail = $request->input('mail');
            $website = $request->input('website');
            $Professional_specialty = $request->input('Professional_specialty');
            $word_to_st = $request->input('word_to_st');
            $books_for_st = $request->input('books_for_st');
            $update_teacher_profile =  DB::update(
                'update teacher set name = ?,ename = ?,position = ?,eposition = ?,education = ?,eeducation = ?,Researchroom = ?,extension = ?,email = ?,website = ?,professionalspecialty = ?,tostudent = ?,tobook = ? where name=?',
                [$name, $ename, $job_title, $ejob_title, $highest_education, $ehighest_education, $office, $extension, $mail, $website, $Professional_specialty, $word_to_st, $books_for_st, $name]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //修改兼任教師資料畫面
    public function re_p_teacher_view(Request $request)
    {
        $name = $request->input('name');
        $P_teachers = DB::select('SELECT * FROM teacher where name=?', [$name]);
        return view('Backstage/teacher/re_p_teacher', ['P_teachers' => $P_teachers]);
    }
    //修改兼任教師資料
    public function re_p_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            $ename = $request->input('ename');
            $job_title = $request->input('job_title');
            $ejob_title = $request->input('ejob_title');
            $ability = $request->input('ability');
            $highest_education = $request->input('highest_education');
            $ehighest_education = $request->input('ehighest_education');
            $mail = $request->input('mail');
            $update_p_teacher =  DB::update(
                'update teacher set name = ?,ename = ?,position = ?,eposition = ?,ability=?,education = ?,eeducation = ?,email = ? where name=?',
                [$name, $ename, $job_title, $ejob_title, $ability, $highest_education, $ehighest_education, $mail, $name]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //修改相關教師資料畫面
    public function re_relate_teacher_view(Request $request)
    {
        $name = $request->input('name');
        $Relate_teachers = DB::select('SELECT * FROM teacher where name=?', [$name]);
        return view('Backstage/teacher/re_relate_teacher', ['Relate_teachers' => $Relate_teachers]);
    }
    //修改相關教師資料
    public function re_relate_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            $ename = $request->input('ename');
            $job_title = $request->input('job_title');
            $ejob_title = $request->input('ejob_title');
            $ability = $request->input('ability');
            $highest_education = $request->input('highest_education');
            $ehighest_education = $request->input('ehighest_education');
            $mail = $request->input('mail');
            $update_relate_teacher =  DB::update(
                'update teacher set name = ?,ename = ?,position = ?,eposition = ?,ability=?,education = ?,eeducation = ?,email = ? where name=?',
                [$name, $ename, $job_title, $ejob_title, $ability, $highest_education, $ehighest_education, $mail, $name]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //修改辦公人員畫面
    public function re_office_staff_view(Request $request)
    {
        $name = $request->input('name');
        $Office_staffs = DB::select('SELECT * FROM teacher where name=?', [$name]);
        return view('Backstage/teacher/re_office_staff', ['Office_staffs' => $Office_staffs]);
    }
    //修改辦公人員
    public function re_office_staff(Request $request)
    {
        try {
            $name = $request->input('name');
            $ename = $request->input('ename');
            $job_title = $request->input('job_title');
            $ejob_title = $request->input('ejob_title');
            $extension = $request->input('extension');
            $mail = $request->input('mail');
            $update_office_staff =  DB::update(
                'update teacher set name = ?,ename = ?,position = ?,eposition = ?,extension =?,email = ? where name=?',
                [$name, $ename, $job_title, $ejob_title, $extension, $mail, $name]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //辦公人員職務畫面
    public function office_job_view(Request $request)
    {
        $name = $request->input('name');
        $positioncontents = DB::select('SELECT * FROM positioncontent where name=?', [$name]);
        return view('Backstage/teacher/office_job', ['positioncontents' => $positioncontents, 'name' => $name]);
    }
    //新增辦公人員職務畫面
    public function add_office_job_view(Request $request)
    {
        $name = $request->input('name');
        return view('Backstage/teacher/add_office_job', ['name' => $name]);
    }
    //新增辦公人員職務
    public function add_office_job(Request $request)
    {
        try {
            $name = $request->input('name');
            $position = $request->input('position');
            $eposition = $request->input('eposition');

            $insert_office_job = DB::statement('INSERT INTO positioncontent (name,description,edescription) VALUES (?,?,?)', [$name, $position, $eposition]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改辦公人員職務畫面
    public function re_office_job_view(Request $request)
    {
        $id = $request->input('id');
        $positioncontents = DB::select('SELECT * FROM positioncontent where id=?', [$id]);
        return view('Backstage/teacher/re_office_job', ['positioncontents' => $positioncontents]);
    }
    //修改辦公人員職務
    public function re_office_job(Request $request)
    {
        try {
            $id = $request->input('id');
            $position = $request->input('position');
            $eposition = $request->input('eposition');

            $update_office_job =  DB::update(
                'update positioncontent set description = ?,edescription = ? where id=?',
                [$position, $eposition, $id]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除辦公人員職務
    public function delete_office_job(Request $request)
    {
        try {
            $id = $request->input('id');
            //刪除職務
            $delete = DB::delete('delete from positioncontent where id = ?', [$id]);

            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改退休教師資料畫面
    public function re_retire_teacher_view(Request $request)
    {
        $name = $request->input('name');
        $retire_teachers = DB::select('SELECT * FROM teacher where name=?', [$name]);
        return view('Backstage/teacher/re_retire_teacher', ['retire_teachers' => $retire_teachers]);
    }
    //修改退休教師資料
    public function re_retire_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            $ename = $request->input('ename');
            $job_title = $request->input('job_title');
            $ejob_title = $request->input('ejob_title');
            $ability = $request->input('ability');
            $highest_education = $request->input('highest_education');
            $ehighest_education = $request->input('ehighest_education');
            $mail = $request->input('mail');
            $update_relate_teacher =  DB::update(
                'update teacher set name = ?,ename = ?,position = ?,eposition = ?,ability=?,education = ?,eeducation = ?,email = ? where name=?',
                [$name, $ename, $job_title, $ejob_title, $ability, $highest_education, $ehighest_education, $mail, $name]
            );
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //新增榮譽畫面
    public function add_teacher_honor_view(Request $request)
    {
        $name = $request->input('name');
        $T_profiles = DB::select('SELECT * FROM teacher where name=?', [$name]);
        return view('Backstage/teacher/add_teacher_honor', ['T_profiles' => $T_profiles]);
    }
    //新增榮譽
    public function add_teacher_honor(Request $request)
    {
        try {
            //教師經歷
            $name = $request->input('name');
            $texper = $request->input('texper');
            $etexper = $request->input('etexper');
            $start = $request->input('start');
            $end = $request->input('end');
            $len_texper = count($texper);

            for ($i = 0; $i < $len_texper; $i++) {
                $position_num = DB::select('SELECT position FROM texperience where name=?', [$name]);
                $num = count($position_num);
                $position = $num + 1;
                if ($texper[$i] != null) {
                    $insert_texper = DB::statement('INSERT INTO texperience (name,description,edescription,start,end,position) VALUES (?,?,?,?,?,?)', [$name, $texper[$i], $etexper[$i], $start[$i], $end[$i], $position]);
                }
            }
            //論文
            $thesis_year = $request->input('thesis_year');
            $thesis = $request->input('thesis');
            $len_thesis = count($thesis);
            for ($i = 0; $i < $len_thesis; $i++) {
                $position_num = DB::select('SELECT position FROM thesispaper where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($thesis[$i] != null) {
                    $insert_thesispaper = DB::statement('INSERT INTO thesispaper (name,description,date,position) VALUES (?,?,?,?)', [$name, $thesis[$i], $thesis_year[$i], $position]);
                }
            }
            //研討會論文
            $conpaper_year = $request->input('conpaper_year');
            $conpaper = $request->input('conpaper');
            $len_conpaper = count($conpaper);
            for ($i = 0; $i < $len_conpaper; $i++) {
                $position_num = DB::select('SELECT position FROM conpaper where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($conpaper[$i] != null) {
                    $insert_conpaper = DB::statement('INSERT INTO conpaper (name,description,date,position) VALUES (?,?,?,?)', [$name, $conpaper[$i], $conpaper_year[$i], $position]);
                }
            }
            //研討會發表
            $conpublic_year = $request->input('conpublic_year');
            $conpublic = $request->input('conpublic');
            $len_conpublic = count($conpublic);
            for ($i = 0; $i < $len_conpublic; $i++) {
                $position_num = DB::select('SELECT position FROM conpublication where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($conpublic[$i] != null) {
                    $insert_conpublic = DB::statement('INSERT INTO conpublication (name,description,date,position) VALUES (?,?,?,?)', [$name, $conpublic[$i], $conpublic_year[$i], $position]);
                }
            }
            //技術報告
            $techpaper_year = $request->input('techpaper_year');
            $techpaper = $request->input('techpaper');
            $len_techpaper = count($techpaper);
            for ($i = 0; $i < $len_techpaper; $i++) {
                $position_num = DB::select('SELECT position FROM techpaper where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($techpaper[$i] != null) {
                    $insert_techpaper = DB::statement('INSERT INTO techpaper (name,description,date,position) VALUES (?,?,?,?)', [$name, $techpaper[$i], $techpaper_year[$i], $position]);
                }
            }
            //專利
            $techpatent_year = $request->input('techpatent_year');
            $techpatent = $request->input('techpatent');
            $len_techpatent = count($techpatent);
            for ($i = 0; $i < $len_techpatent; $i++) {
                $position_num = DB::select('SELECT position FROM techpatent where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($techpatent[$i] != null) {
                    $insert_techpatent = DB::statement('INSERT INTO techpatent (name,description,date,position) VALUES (?,?,?,?)', [$name, $techpatent[$i], $techpatent_year[$i], $position]);
                }
            }
            //專書
            $book_year = $request->input('book_year');
            $book = $request->input('book');
            $len_book = count($book);
            for ($i = 0; $i < $len_book; $i++) {
                $position_num = DB::select('SELECT position FROM book where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($book[$i] != null) {
                    $insert_book = DB::statement('INSERT INTO book (name,description,date,position) VALUES (?,?,?,?)', [$name, $book[$i], $book_year[$i], $position]);
                }
            }
            //其他著作
            $otherbook_year = $request->input('otherbook_year');
            $otherbook = $request->input('otherbook');
            $len_otherbook = count($otherbook);
            for ($i = 0; $i < $len_otherbook; $i++) {
                $position_num = DB::select('SELECT position FROM otherbook where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($otherbook[$i] != null) {
                    $insert_otherbook = DB::statement('INSERT INTO otherbook (name,description,date,position) VALUES (?,?,?,?)', [$name, $otherbook[$i], $otherbook_year[$i], $position]);
                }
            }
            //榮譽
            $honor_year = $request->input('honor_year');
            $honor = $request->input('honor');
            $ehonor = $request->input('ehonor');
            $len_honor = count($honor);
            for ($i = 0; $i < $len_honor; $i++) {
                $position_num = DB::select('SELECT position FROM honor where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($honor[$i] != null) {
                    $insert_honor = DB::statement('INSERT INTO honor (name,description,edescription,date,position) VALUES (?,?,?,?,?)', [$name, $honor[$i], $ehonor[$i], $honor_year[$i], $position]);
                }
            }
            //社會服務
            $social_year = $request->input('social_year');
            $social = $request->input('social');
            $esocial = $request->input('esocial');
            $len_social = count($social);
            for ($i = 0; $i < $len_social; $i++) {
                $position_num = DB::select('SELECT position FROM socialservices where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($social[$i] != null) {
                    $insert_social = DB::statement('INSERT INTO socialservices (name,description,edescription,date,position) VALUES (?,?,?,?,?)', [$name, $social[$i], $esocial[$i], $social_year[$i], $position]);
                }
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改榮譽畫面
    public function re_teacher_honor_view(Request $request)
    {
        $name = $request->input('name');
        $T_texperiences = DB::select('SELECT * FROM texperience where name=?', [$name]);
        $T_thesispapers = DB::select('SELECT * FROM thesispaper where name=?', [$name]);
        $T_conpapers = DB::select('SELECT * FROM conpaper where name=?', [$name]);
        $T_conpublications = DB::select('SELECT * FROM conpublication where name=?', [$name]);
        $T_techpapers = DB::select('SELECT * FROM techpaper where name=?', [$name]);
        $T_techpatents = DB::select('SELECT * FROM techpatent where name=?', [$name]);
        $T_books = DB::select('SELECT * FROM book where name=?', [$name]);
        $T_otherbooks = DB::select('SELECT * FROM otherbook where name=?', [$name]);
        $T_honors = DB::select('SELECT * FROM honor where name=?', [$name]);
        $T_socialservicess = DB::select('SELECT * FROM socialservices where name=?', [$name]);
        return view('Backstage/teacher/re_teacher_honor', ['name' => $name, 'T_texperiences' => $T_texperiences, 'T_thesispapers' => $T_thesispapers, 'T_conpapers' => $T_conpapers, 'T_conpublications' => $T_conpublications, 'T_techpapers' => $T_techpapers, 'T_techpatents' => $T_techpatents, 'T_books' => $T_books, 'T_otherbooks' => $T_otherbooks, 'T_honors' => $T_honors, 'T_socialservicess' => $T_socialservicess,]);
    }
    //修改榮譽
    public function re_teacher_honor(Request $request)
    {
        try {
            //教師經歷
            $name = $request->input('name');
            $texper = $request->input('texper');
            $etexper = $request->input('etexper');
            $start = $request->input('start');
            $end = $request->input('end');
            $len_texper = count($texper);

            for ($i = 0; $i < $len_texper; $i++) {
                $position_num = DB::select('SELECT position FROM texperience where name=?', [$name]);
                $num = count($position_num);
                $position = $num + 1;
                if ($texper[$i] != null) {
                    $insert_texper = DB::statement('INSERT INTO texperience (name,description,edescription,start,end,position) VALUES (?,?,?,?,?,?)', [$name, $texper[$i], $etexper[$i], $start[$i], $end[$i], $position]);
                }
            }
            //論文
            $thesis_year = $request->input('thesis_year');
            $thesis = $request->input('thesis');
            $len_thesis = count($thesis);
            for ($i = 0; $i < $len_thesis; $i++) {
                $position_num = DB::select('SELECT position FROM thesispaper where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($thesis[$i] != null) {
                    $insert_thesispaper = DB::statement('INSERT INTO thesispaper (name,description,date,position) VALUES (?,?,?,?)', [$name, $thesis[$i], $thesis_year[$i], $position]);
                }
            }
            //研討會論文
            $conpaper_year = $request->input('conpaper_year');
            $conpaper = $request->input('conpaper');
            $len_conpaper = count($conpaper);
            for ($i = 0; $i < $len_conpaper; $i++) {
                $position_num = DB::select('SELECT position FROM conpaper where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($conpaper[$i] != null) {
                    $insert_conpaper = DB::statement('INSERT INTO conpaper (name,description,date,position) VALUES (?,?,?,?)', [$name, $conpaper[$i], $conpaper_year[$i], $position]);
                }
            }
            //研討會發表
            $conpublic_year = $request->input('conpublic_year');
            $conpublic = $request->input('conpublic');
            $len_conpublic = count($conpublic);
            for ($i = 0; $i < $len_conpublic; $i++) {
                $position_num = DB::select('SELECT position FROM conpublication where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($conpublic[$i] != null) {
                    $insert_conpublic = DB::statement('INSERT INTO conpublication (name,description,date,position) VALUES (?,?,?,?)', [$name, $conpublic[$i], $conpublic_year[$i], $position]);
                }
            }
            $techpaper_year = $request->input('techpaper_year');
            $techpaper = $request->input('techpaper');
            $len_techpaper = count($techpaper);
            for ($i = 0; $i < $len_techpaper; $i++) {
                $position_num = DB::select('SELECT position FROM techpaper where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($techpaper[$i] != null) {
                    $insert_techpaper = DB::statement('INSERT INTO techpaper (name,description,date,position) VALUES (?,?,?,?)', [$name, $techpaper[$i], $techpaper_year[$i], $position]);
                }
            }
            $techpatent_year = $request->input('techpatent_year');
            $techpatent = $request->input('techpatent');
            $len_techpatent = count($techpatent);
            for ($i = 0; $i < $len_techpatent; $i++) {
                $position_num = DB::select('SELECT position FROM techpatent where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($techpatent[$i] != null) {
                    $insert_techpatent = DB::statement('INSERT INTO techpatent (name,description,date,position) VALUES (?,?,?,?)', [$name, $techpatent[$i], $techpatent_year[$i], $position]);
                }
            }
            $book_year = $request->input('book_year');
            $book = $request->input('book');
            $len_book = count($book);
            for ($i = 0; $i < $len_book; $i++) {
                $position_num = DB::select('SELECT position FROM book where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($book[$i] != null) {
                    $insert_book = DB::statement('INSERT INTO book (name,description,date,position) VALUES (?,?,?,?)', [$name, $book[$i], $book_year[$i], $position]);
                }
            }
            $otherbook_year = $request->input('otherbook_year');
            $otherbook = $request->input('otherbook');
            $len_otherbook = count($otherbook);
            for ($i = 0; $i < $len_otherbook; $i++) {
                $position_num = DB::select('SELECT position FROM book where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($otherbook[$i] != null) {
                    $insert_otherbook = DB::statement('INSERT INTO otherbook (name,description,date,position) VALUES (?,?,?,?)', [$name, $otherbook[$i], $otherbook_year[$i], $position]);
                }
            }
            $honor_year = $request->input('honor_year');
            $honor = $request->input('honor');
            $ehonor = $request->input('ehonor');
            $len_honor = count($honor);
            for ($i = 0; $i < $len_honor; $i++) {
                $position_num = DB::select('SELECT position FROM honor where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($honor[$i] != null) {
                    $insert_honor = DB::statement('INSERT INTO honor (name,description,edescription,date,position) VALUES (?,?,?,?,?)', [$name, $honor[$i], $ehonor[$i], $honor_year[$i], $position]);
                }
            }
            $social_year = $request->input('social_year');
            $social = $request->input('social');
            $esocial = $request->input('esocial');
            $len_social = count($social);
            for ($i = 0; $i < $len_social; $i++) {
                $position_num = DB::select('SELECT position FROM socialservices where name=?', [$name]);
                $num = count($position_num);
                $position = $num;
                if ($social[$i] != null) {
                    $insert_social = DB::statement('INSERT INTO socialservices (name,description,edescription,date,position) VALUES (?,?,?,?,?)', [$name, $social[$i], $esocial[$i], $social_year[$i], $position]);
                }
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改榮譽畫面
    public function re_texperience_view(Request $request)
    {
        $id = $request->input('id');
        $T_texperiences = DB::select('SELECT * FROM texperience where id=?', [$id]);
        return view('Backstage/teacher/re_texperience', ['T_texperiences' => $T_texperiences]);
    }
    //修改榮譽
    public function re_texperience(Request $request)
    {
        try {
            $id = $request->input('id');
            $texper = $request->input('texper');
            $etexper = $request->input('etexper');
            $start = $request->input('start');
            $end = $request->input('end');
            $update_texper = DB::update('update texperience set description = ?,edescription = ?,start = ?,end = ? where id=?', [$texper, $etexper, $start, $end, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除榮譽
    public function delete_texperience(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from texperience where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改期刊論文畫面
    public function re_thesispaper_view(Request $request)
    {
        $id = $request->input('id');
        $T_thesispapers = DB::select('SELECT * FROM thesispaper where id=?', [$id]);
        return view('Backstage/teacher/re_thesispaper', ['T_thesispapers' => $T_thesispapers]);
    }
    //修改期刊論文
    public function re_thesispaper(Request $request)
    {
        try {
            $id = $request->input('id');
            $thesis_year = $request->input('thesis_year');
            $thesis = $request->input('thesis');

            $update_thesis = DB::update('update thesispaper set date = ?, description = ? where id=?', [$thesis_year, $thesis, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除期刊論文
    public function delete_thesispaper(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from thesispaper where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改研討會論文畫面
    public function re_conpaper_view(Request $request)
    {
        $id = $request->input('id');
        $T_conpapers = DB::select('SELECT * FROM conpaper where id=?', [$id]);
        return view('Backstage/teacher/re_conpaper', ['T_conpapers' => $T_conpapers]);
    }
    //修改研討會論文
    public function re_conpaper(Request $request)
    {
        try {
            $id = $request->input('id');
            $conpaper_year = $request->input('conpaper_year');
            $conpaper = $request->input('conpaper');

            $update_conpaper = DB::update('update conpaper set date = ?, description = ? where id=?', [$conpaper_year, $conpaper, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除研討會論文
    public function delete_conpaper(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from conpaper where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改研討會發表畫面
    public function re_conpublic_view(Request $request)
    {
        $id = $request->input('id');
        $T_conpublics = DB::select('SELECT * FROM conpublication where id=?', [$id]);
        return view('Backstage/teacher/re_conpublic', ['T_conpublics' => $T_conpublics]);
    }
    //修改研討會發表
    public function re_conpublic(Request $request)
    {
        try {
            $id = $request->input('id');
            $conpublic_year = $request->input('conpublic_year');
            $conpublic = $request->input('conpublic');

            $update_conpublic = DB::update('update conpublication set date = ?, description = ? where id=?', [$conpublic_year, $conpublic, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除研討會發表
    public function delete_conpublic(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from conpublication where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改技術報告畫面
    public function re_techpaper_view(Request $request)
    {
        $id = $request->input('id');
        $T_techpapers = DB::select('SELECT * FROM techpaper where id=?', [$id]);
        return view('Backstage/teacher/re_techpaper', ['T_techpapers' => $T_techpapers]);
    }
    //修改技術報告
    public function re_techpaper(Request $request)
    {
        try {
            $id = $request->input('id');
            $techpaper_year = $request->input('techpaper_year');
            $techpaper = $request->input('techpaper');

            $update_techpaper = DB::update('update techpaper set date = ?, description = ? where id=?', [$techpaper_year, $techpaper, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除技術報告
    public function delete_techpaper(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from techpaper where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改專利畫面
    public function re_techpatent_view(Request $request)
    {
        $id = $request->input('id');
        $T_techpatents = DB::select('SELECT * FROM techpatent where id=?', [$id]);
        return view('Backstage/teacher/re_techpatent', ['T_techpatents' => $T_techpatents]);
    }
    //修改專利
    public function re_techpatent(Request $request)
    {
        try {
            $id = $request->input('id');
            $techpatent_year = $request->input('techpatent_year');
            $techpatent = $request->input('techpatent');

            $update_techpatent = DB::update('update techpatent set date = ?, description = ? where id=?', [$techpatent_year, $techpatent, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除專利
    public function delete_techpatent(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from techpatent where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改專書畫面
    public function re_book_view(Request $request)
    {
        $id = $request->input('id');
        $T_books = DB::select('SELECT * FROM book where id=?', [$id]);
        return view('Backstage/teacher/re_book', ['T_books' => $T_books]);
    }
    //修改專書
    public function re_book(Request $request)
    {
        try {
            $id = $request->input('id');
            $book_year = $request->input('book_year');
            $book = $request->input('book');

            $update_book = DB::update('update book set date = ?, description = ? where id=?', [$book_year, $book, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除專書
    public function delete_book(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from book where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改其他著作畫面
    public function re_otherbook_view(Request $request)
    {
        $id = $request->input('id');
        $T_otherbooks = DB::select('SELECT * FROM otherbook where id=?', [$id]);
        return view('Backstage/teacher/re_otherbook', ['T_otherbooks' => $T_otherbooks]);
    }
    //修改其他著作
    public function re_otherbook(Request $request)
    {
        try {
            $id = $request->input('id');
            $otherbook_year = $request->input('otherbook_year');
            $otherbook = $request->input('otherbook');
            $update_otherbook = DB::update('update otherbook set date = ?, description = ? where id=?', [$otherbook_year, $otherbook, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除其他著作
    public function delete_otherbook(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from otherbook where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改榮譽畫面
    public function re_honor_view(Request $request)
    {
        $id = $request->input('id');
        $T_honors = DB::select('SELECT * FROM honor where id=?', [$id]);
        return view('Backstage/teacher/re_honor', ['T_honors' => $T_honors]);
    }
    //修改榮譽
    public function re_honor(Request $request)
    {
        try {
            $id = $request->input('id');
            $honor_year = $request->input('honor_year');
            $honor = $request->input('honor');
            $ehonor = $request->input('ehonor');
            $update_honor = DB::update('update honor set date = ?, description = ?,edescription=? where id=?', [$honor_year, $honor, $ehonor, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除榮譽
    public function delete_honor(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from honor where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //修改社會服務畫面
    public function re_social_view(Request $request)
    {
        $id = $request->input('id');
        $T_socials = DB::select('SELECT * FROM socialservices where id=?', [$id]);
        return view('Backstage/teacher/re_social', ['T_socials' => $T_socials]);
    }
    //修改社會服務
    public function re_social(Request $request)
    {
        try {
            $id = $request->input('id');
            $social_year = $request->input('social_year');
            $social = $request->input('social');
            $esocial = $request->input('esocial');
            $update_social = DB::update('update socialservices set date = ?, description = ?,edescription=? where id=?', [$social_year, $social, $esocial, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除社會服務
    public function delete_social(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from socialservices where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //刪除專任教師
    public function delete_F_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            //刪除帳號
            $delete = DB::delete('delete from acc where name = ?', [$name]);
            //刪除教師
            $delete = DB::delete('delete from teacher where name = ?', [$name]);
            //刪除教師經歷
            $delete = DB::delete('delete from texperience where name = ?', [$name]);
            //刪除期刊論文
            $delete = DB::delete('delete from thesispaper where name = ?', [$name]);
            //刪除研討會論文
            $delete = DB::delete('delete from conpaper where name = ?', [$name]);
            //刪除研討會發表
            $delete = DB::delete('delete from conpublication where name = ?', [$name]);
            //刪除技術報告
            $delete = DB::delete('delete from techpaper where name = ?', [$name]);
            //刪除專利
            $delete = DB::delete('delete from techpatent where name = ?', [$name]);
            //刪除專書
            $delete = DB::delete('delete from book where name = ?', [$name]);
            //刪除其他著作
            $delete = DB::delete('delete from otherbook where name = ?', [$name]);
            //刪除榮譽
            $delete = DB::delete('delete from honor where name = ?', [$name]);
            //刪除社會服務
            $delete = DB::delete('delete from socialservices where name = ?', [$name]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //刪除兼任教師
    public function delete_P_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            //刪除帳號
            $delete = DB::delete('delete from acc where name = ?', [$name]);
            //刪除教師
            $delete = DB::delete('delete from teacher where name = ?', [$name]);

            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //刪除相關教師
    public function delete_relate_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            //刪除帳號
            $delete = DB::delete('delete from acc where name = ?', [$name]);
            //刪除教師
            $delete = DB::delete('delete from teacher where name = ?', [$name]);

            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //刪除辦公人員
    public function delete_office_staff(Request $request)
    {
        try {
            $name = $request->input('name');
            //刪除帳號
            $delete = DB::delete('delete from acc where name = ?', [$name]);
            //刪除教師
            $delete = DB::delete('delete from teacher where name = ?', [$name]);
            //刪除職務
            $delete = DB::delete('delete from positioncontent where name = ?', [$name]);

            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //刪除退修人員
    public function delete_retire_teacher(Request $request)
    {
        try {
            $name = $request->input('name');
            //刪除帳號
            $delete = DB::delete('delete from acc where name = ?', [$name]);
            //刪除教師
            $delete = DB::delete('delete from teacher where name = ?', [$name]);

            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
}
