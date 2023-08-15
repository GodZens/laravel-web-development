<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BackcurriculumsController extends Controller
{
    //課程架構畫面
    public function back_curriculum(Request $request)
    {
        $year = $request->input('year');
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        $courseflows = DB::select('SELECT * FROM curriculum where year=? ORDER BY position DESC', [$year]);
        $coursemaps = DB::select('SELECT * FROM curriculummap where year=? ORDER BY position DESC', [$year]);
        $courseframes = DB::select('SELECT * FROM curriculumframe where year=? ORDER BY position DESC', [$year]);
        $graduations = DB::select('SELECT * FROM downloadarea where category=? order by weight asc', ['2']);
        $courseplans = DB::select('SELECT * FROM alltext where position=? ', ['curriculumrule']);
        $secondforeigns = DB::select('SELECT * FROM alltext where position=? ', ['secondforeign']);
        $coursefeatures = DB::select('SELECT * FROM alltext where position=? ', ['curriculumsp']);

        return view('Backstage/curriculum/curriculum', ['courseframe_years' => $courseframe_years, 'courseflows' => $courseflows, 'coursemaps' => $coursemaps, 'courseframes' => $courseframes, 'graduations' => $graduations, 'courseplans' => $courseplans, 'secondforeigns' => $secondforeigns, 'coursefeatures' => $coursefeatures]);
    }

    //新增系所辦法學年度畫面
    public function add_curr_year_view()
    {
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        return view('Backstage/curriculum/add_curr_year', ['courseframe_years' => $courseframe_years]);
    }
    //新增系所辦法學年度
    public function add_curr_year(Request $request)
    {
        try {
            $new_year = $request->input('new_year');
            $insert_year = DB::statement('INSERT INTO courseframe_year (year) VALUES (?)', [$new_year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //刪除系所辦法學年度畫面
    public function delete_curr_year_view()
    {
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        return view('Backstage/curriculum/delete_curr_year', ['courseframe_years' => $courseframe_years]);
    }
    //刪除系所辦法學年度
    public function delete_curr_year(Request $request)
    {
        try {
            $delete_year = $request->input('delete_year');
            $delete = DB::delete('delete from courseframe_year where year = ?', [$delete_year]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增課程流程圖畫面
    public function add_courseflow_view()
    {
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        return view('Backstage/curriculum/add_courseflow', ['courseframe_years' => $courseframe_years]);
    }
    //新增課程流程圖
    public function add_courseflow(Request $request)
    {
        try {
            $year = $request->input('year');
            // 取得中文檔案
            $file = $request->file('file');
            // 取得英文檔案
            $efile = $request->file('file_en');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('img/courseprocess/'), $filename);

                $weight_num = DB::select('SELECT position FROM curriculum where type=? and year=?', ['c', $year]);
                $num = count($weight_num);
                $weight = $num + 1;
                $add_courseflow = DB::statement('INSERT INTO curriculum (year,file,type,position) VALUES (?,?,?,?)', [$year, $filename, 'c', $weight]);
            }
            if ($efile != null) {
                $filename_en = $efile->getClientOriginalName();
                $efile->move(public_path('img/courseprocess/'), $filename_en);
                $weight_num = DB::select('SELECT position FROM curriculum where type=? and year=?', ['e', $year]);
                $num = count($weight_num);
                $weight = $num + 1;
                $add_courseflow = DB::statement('INSERT INTO curriculum (year,file,type,position) VALUES (?,?,?,?)', [$year, $filename_en, 'e', $weight]);
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改課程流程圖畫面
    public function re_courseflow_view(Request $request)
    {
        $id = $request->input('id');
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        $courseflows = DB::select('SELECT * FROM curriculum where id=?', [$id]);
        return view('Backstage/curriculum/re_courseflow', ['courseframe_years' => $courseframe_years, 'courseflows' => $courseflows]);
    }
    //修改課程流程圖
    public function re_courseflow(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $file = $request->file('file');
            if ($file != null) {   //刪除舊檔案
                $courseflow_files = DB::select('SELECT file FROM curriculum where id=?', [$id]);
                foreach ($courseflow_files as $courseflow_file) {
                    $filename = $courseflow_file->file;
                }
                $fullPath = public_path('img/courseprocess/') . $filename;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
                //將新檔案移到檔案存放區
                $new_file = $file->getClientOriginalName();
                $file->move(public_path('img/courseprocess/'), $new_file);
            } else {
                $courseflow_files = DB::select('SELECT file FROM curriculum where id=?', [$id]);
                foreach ($courseflow_files as $courseflow_file) {
                    $filename = $courseflow_file->file;
                }
                $new_file = $filename;
            }
            $update_courseflow =  DB::update('update curriculum set year = ?,file = ? where id=?', [$year, $new_file, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除課程流程圖
    public function delete_courseflow(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from curriculum where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增課程地圖畫面
    public function add_coursemap_view()
    {
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        return view('Backstage/curriculum/add_coursemap', ['courseframe_years' => $courseframe_years]);
    }
    //新增課程地圖
    public function add_coursemap(Request $request)
    {
        try {
            $year = $request->input('year');
            // 取得中文檔案
            $file = $request->file('file');
            // 取得英文檔案
            $efile = $request->file('file_en');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('img\courseprocess'), $filename);

                $weight_num = DB::select('SELECT position FROM curriculummap where type=? and year=?', ['c', $year]);
                $num = count($weight_num);
                $weight = $num + 1;
                $add_courseflow = DB::statement('INSERT INTO curriculummap (year,file,type,position) VALUES (?,?,?,?)', [$year, $filename, 'c', $weight]);
            }
            if ($efile != null) {
                $filename_en = $efile->getClientOriginalName();
                $efile->move(public_path('img\courseprocess'), $filename_en);
                $weight_num = DB::select('SELECT position FROM curriculummap where type=? and year=?', ['e', $year]);
                $num = count($weight_num);
                $weight = $num + 1;
                $add_courseflow = DB::statement('INSERT INTO curriculummap (year,file,type,position) VALUES (?,?,?,?)', [$year, $filename_en, 'e', $weight]);
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改課程地圖畫面
    public function re_coursemap_view(Request $request)
    {
        $id = $request->input('id');
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        $coursemaps = DB::select('SELECT * FROM curriculummap where id=?', [$id]);
        return view('Backstage/curriculum/re_coursemap', ['courseframe_years' => $courseframe_years, 'coursemaps' => $coursemaps]);
    }
    //修改課程地圖
    public function re_coursemap(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $file = $request->file('file');
            if ($file != null) {   //刪除舊檔案
                $coursemap_files = DB::select('SELECT file FROM curriculummap where id=?', [$id]);
                foreach ($coursemap_files as $coursemap_file) {
                    $filename = $coursemap_file->file;
                }
                $fullPath = public_path('img/courseprocess/') . $filename;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
                //將新檔案移到檔案存放區
                $new_file = $file->getClientOriginalName();
                $file->move(public_path('img/courseprocess/'), $new_file);
            } else {
                $coursemap_files = DB::select('SELECT file FROM curriculummap where id=?', [$id]);
                foreach ($coursemap_files as $coursemap_file) {
                    $filename = $coursemap_file->file;
                }
                $new_file = $filename;
            }
            $update_coursemap =  DB::update('update curriculummap set year = ?,file = ? where id=?', [$year, $new_file, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除課程地圖
    public function delete_coursemap(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from curriculummap where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增課程架構圖畫面
    public function add_courseframe_view()
    {
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        return view('Backstage/curriculum/add_courseframe', ['courseframe_years' => $courseframe_years]);
    }
    //新增課程架構圖
    public function add_courseframe(Request $request)
    {
        try {
            $year = $request->input('year');
            // 取得中文檔案
            $file = $request->file('file');
            // 取得英文檔案
            $efile = $request->file('file_en');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('img/courseprocess/'), $filename);

                $weight_num = DB::select('SELECT position FROM curriculumframe where type=? and year=?', ['c', $year]);
                $num = count($weight_num);
                $weight = $num + 1;
                $add_courseflow = DB::statement('INSERT INTO curriculumframe (year,file,type,position) VALUES (?,?,?,?)', [$year, $filename, 'c', $weight]);
            }
            if ($efile != null) {
                $filename_en = $efile->getClientOriginalName();
                $efile->move(public_path('img/courseprocess/'), $filename_en);
                $weight_num = DB::select('SELECT position FROM curriculumframe where type=? and year=?', ['e', $year]);
                $num = count($weight_num);
                $weight = $num + 1;
                $add_courseflow = DB::statement('INSERT INTO curriculumframe (year,file,type,position) VALUES (?,?,?,?)', [$year, $filename_en, 'e', $weight]);
            }

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改課程架構圖畫面
    public function re_courseframe_view(Request $request)
    {
        $id = $request->input('id');
        $courseframe_years = DB::select('SELECT DISTINCT year FROM courseframe_year ORDER BY year DESC');
        $courseframes = DB::select('SELECT * FROM curriculumframe where id=?', [$id]);
        return view('Backstage/curriculum/re_courseframe', ['courseframe_years' => $courseframe_years, 'courseframes' => $courseframes]);
    }
    //修改課程架構圖
    public function re_courseframe(Request $request)
    {
        try {
            $id = $request->input('id');
            $year = $request->input('year');
            $file = $request->file('file');
            if ($file != null) {   //刪除舊檔案
                $coursemap_files = DB::select('SELECT file FROM curriculumframe where id=?', [$id]);
                foreach ($coursemap_files as $coursemap_file) {
                    $filename = $coursemap_file->file;
                }
                $fullPath = public_path('img/courseprocess//') . $filename;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
                //將新檔案移到檔案存放區
                $new_file = $file->getClientOriginalName();
                $file->move(public_path('img/courseprocess/'), $new_file);
            } else {
                $coursemap_files = DB::select('SELECT file FROM curriculumframe where id=?', [$id]);
                foreach ($coursemap_files as $coursemap_file) {
                    $filename = $coursemap_file->file;
                }
                $new_file = $filename;
            }
            $update_coursemap =  DB::update('update curriculumframe set year = ?,file = ? where id=?', [$year, $new_file, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除課程架構圖
    public function delete_courseframe(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from curriculumframe where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //新增畢業門檻畫面
    public function add_graduation_view()
    {
        return view('Backstage/curriculum/add_graduation');
    }
    //新增畢業門檻
    public function add_graduation(Request $request)
    {
        try {
            $description = $request->input('file-description');
            $edescription = $request->input('file-description-eng');
            // 取得中文檔案
            $file = $request->file('file');
            // 取得英文檔案
            $efile = $request->file('file_en');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }

            if ($efile != null) {
                $efilename = $efile->getClientOriginalName();
                $efile->move(public_path('download'), $efilename);
            } else {
                $efilename = null;
            }
            $weight_num = DB::select('SELECT weight FROM downloadarea where category=?', ['2']);
            $num = count($weight_num);
            $weight = $num + 1;
            $add_graduation = DB::statement('INSERT INTO downloadarea (description,edescription,file,file_en,category,weight) VALUES (?,?,?,?,?,?)', [$description, $edescription, $filename, $efilename, '2', $weight]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改畢業門檻畫面
    public function re_graduation_view(Request $request)
    {
        $id = $request->input('id');
        $graduations = DB::select('SELECT * FROM downloadarea where id=? and category=?', [$id, '2']);
        return view('Backstage/curriculum/re_graduation', ['graduations' => $graduations]);
    }
    //修改畢業門檻
    public function re_graduation(Request $request)
    {
        try {
            $id = $request->input('id');
            $description = $request->input('file-description');
            $edescription = $request->input('file-description-eng');
            $file = $request->file('file');
            $efile = $request->file('file_en');
            if ($file != null) {   //刪除舊檔案
                $graduation_files = DB::select('SELECT file FROM downloadarea where id=?', [$id]);
                foreach ($graduation_files as $graduation_file) {
                    $filename = $graduation_file->file;
                }
                $fullPath = public_path('download/') . $filename;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
                //將新檔案移到檔案存放區
                $new_file = $file->getClientOriginalName();
                $file->move(public_path('download'), $new_file);
            } else {
                $graduation_files = DB::select('SELECT file FROM downloadarea where id=?', [$id]);
                foreach ($graduation_files as $graduation_file) {
                    $filename = $graduation_file->file;
                }
                $new_file = $filename;
            }

            if ($efile != null) {   //刪除舊檔案
                $graduation_efiles = DB::select('SELECT file_en FROM downloadarea where id=?', [$id]);
                foreach ($graduation_efiles as $graduation_efile) {
                    $efilename = $graduation_efile->file_en;
                }
                if ($efilename != null) {
                    $fullPath = public_path('download/') . $efilename;
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }

                //將新檔案移到檔案存放區
                $new_efile = $efile->getClientOriginalName();
                $efile->move(public_path('download'), $new_efile);
            } else {
                $graduation_efiles = DB::select('SELECT file_en FROM downloadarea where id=?', [$id]);
                foreach ($graduation_efiles as $graduation_efile) {
                    $efilename = $graduation_efile->file_en;
                }
                $new_efile = $efilename;
            }

            $update_graduation =  DB::update('update downloadarea set description = ?,edescription = ?,file = ?,file_en = ? where id=?', [$description, $edescription, $new_file, $new_efile, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除畢業門檻
    public function delete_graduation(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from downloadarea where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改畢業門檻畫面
    public function re_courseplan_view(Request $request)
    {
        $id = $request->input('id');
        $courseplans = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/curriculum/re_courseplan', ['courseplans' => $courseplans]);
    }
    //修改畢業門檻
    public function re_courseplan(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $update_graduation =  DB::update('update alltext set dtext = ?,dtext_en = ? where id=?', [$editor, $editor_en, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除畢業門檻
    public function delete_courseplan(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from alltext where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改畢業門檻畫面
    public function re_secondforeign_view(Request $request)
    {
        $id = $request->input('id');
        $secondforeigns = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/curriculum/re_secondforeign', ['secondforeigns' => $secondforeigns]);
    }
    //修改畢業門檻
    public function re_secondforeign(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $update_secondforeign =  DB::update('update alltext set dtext = ?,dtext_en = ? where id=?', [$editor, $editor_en, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除畢業門檻
    public function delete_secondforeign(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from alltext where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    //修改課程特色畫面
    public function re_coursefeature_view(Request $request)
    {
        $id = $request->input('id');
        $coursefeatures = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/curriculum/re_coursefeature', ['coursefeatures' => $coursefeatures]);
    }
    //修改課程特色
    public function re_coursefeature(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $update_coursefeature =  DB::update('update alltext set dtext = ?,dtext_en = ? where id=?', [$editor, $editor_en, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除課程特色
    public function delete_coursefeature(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from alltext where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
}
