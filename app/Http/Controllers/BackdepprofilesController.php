<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BackdepprofilesController extends Controller
{
    //系所簡介選擇畫面
    public function dep_profile()
    {
        return view('Backstage/department_profile/dep_profile');
    }

    //簡介畫面
    public function introduction()
    {
        $edutargets = DB::select('SELECT * FROM alltext WHERE position=?', ['edutarget']);
        $depintroducts = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroduct']);
        $depintroductns = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroductn']);
        $depintroductn1s = DB::select('SELECT * FROM alltext WHERE position=?', ['depintroductn1']);
        $studentabilitys = DB::select('SELECT * FROM alltext WHERE position=?', ['studentability']);
        $tests = DB::select('SELECT * FROM alltext WHERE position=?', ['123']);
        return view('Backstage/department_profile/introduction', ['tests' => $tests, 'edutargets' => $edutargets, 'depintroducts' => $depintroducts, 'depintroductns' => $depintroductns, 'depintroductn1s' => $depintroductn1s, 'studentabilitys' => $studentabilitys]);
    }
    //修改簡介畫面
    public function re_introduction_view(Request $request)
    {
        $id = $request->input('id');
        $re_alltexts = DB::select('SELECT * FROM alltext where id=?', [$id]);
        // dd($re_alltexts);
        return view('Backstage/department_profile/re_introduction', ['re_alltexts' => $re_alltexts]);
    }
    //修改簡介
    public function re_introduction(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $update_alltext =  DB::update('update alltext set dtext = ?,dtext_en = ? where id=?', [$editor, $editor_en, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }

    //訂定畫面
    public function dep_formulate(Request $request)
    {
        $depmethods = DB::select('SELECT * FROM depmethod order by weight ASC');
        // dd($re_alltexts);
        return view('Backstage/department_profile/dep_formulate', ['depmethods' => $depmethods]);
    }

    //新增訂定畫面
    public function add_dep_formulate_view()
    {
        return view('Backstage/department_profile/add_dep_formulate');
    }
    //新增訂定
    public function add_dep_formulate(Request $request)
    {
        try {
            // 取得中文檔案(pdf)
            $file_PDF = $request->file('file_PDF');
            if ($file_PDF != null) {
                $file_PDFname = $file_PDF->getClientOriginalName();
                $file_PDF->move(public_path('download'), $file_PDFname);
            } else {
                $file_PDFname = null;
            }

            // 取得中文檔案(word)
            $file_WORD = $request->file('file_WORD');
            if ($file_WORD != null) {
                $file_WORDname = $file_WORD->getClientOriginalName();
                $file_WORD->move(public_path('download'), $file_WORDname);
            } else {
                $file_WORDname = null;
            }

            // 取得中文檔案(odt)
            $file_ODT = $request->file('file_ODT');
            if ($file_ODT != null) {
                $file_ODTname = $file_ODT->getClientOriginalName();
                $file_ODT->move(public_path('download'), $file_ODTname);
            } else {
                $file_ODTname = null;
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

            $weight_num = DB::select('SELECT weight FROM depmethod');
            $num = count($weight_num);
            $weight = $num + 1;

            $add_formulate = DB::statement('INSERT INTO depmethod (description, description_en, file, file_en, file_word,file_odt,weight) VALUES (?,?,?,?,?,?,?)', [$description, $edescription, $file_PDFname, $filename_en, $file_WORDname, $file_ODTname, $weight]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //修改訂定畫面
    public function re_dep_formulate_view(Request $request)
    {
        $id = $request->input('id');
        $depmethods = DB::select('SELECT * FROM depmethod where id=?', [$id]);
        return view('Backstage/department_profile/re_dep_formulate', ['depmethods' => $depmethods]);
    }
    //修改訂定
    public function re_dep_formulate(Request $request)
    {
        try {
            $id = $request->input('id');
            $depmethods = DB::select('SELECT * FROM depmethod where id=?', [$id]);
            foreach ($depmethods as $depmethod) {
                $oldfile_PDFname = $depmethod->file;
                $oldfile_WORDname = $depmethod->file_word;
                $oldfile_ODTname = $depmethod->file_odt;
                $oldfilename_en = $depmethod->file_en;
            }
            // 取得中文檔案(pdf)
            $file_PDF = $request->file('file_PDF');
            if ($file_PDF != null) {
                $file_PDFname = $file_PDF->getClientOriginalName();
                $file_PDF->move(public_path('download'), $file_PDFname);
            } else {
                $file_PDFname = $oldfile_PDFname;
            }

            // 取得中文檔案(word)
            $file_WORD = $request->file('file_WORD');
            if ($file_WORD != null) {
                $file_WORDname = $file_WORD->getClientOriginalName();
                $file_WORD->move(public_path('download'), $file_WORDname);
            } else {
                $file_WORDname = $oldfile_WORDname;
            }

            // 取得中文檔案(odt)
            $file_ODT = $request->file('file_ODT');
            if ($file_ODT != null) {
                $file_ODTname = $file_ODT->getClientOriginalName();
                $file_ODT->move(public_path('download'), $file_ODTname);
            } else {
                $file_ODTname = $oldfile_ODTname;
            }

            // 取得英文檔案
            $file_en = $request->file('file_en');
            if ($file_en != null) {
                $filename_en = $file_en->getClientOriginalName();
                $file_en->move(public_path('download'), $filename_en);
            } else {
                $filename_en = $oldfilename_en;
            }

            $description = $request->input('description');
            $edescription = $request->input('edescription');

            $update_depmethod =  DB::update('update depmethod set description = ?,description_en = ?,file = ?,file_en = ?,file_word = ?,file_odt = ? where id=?', [$description, $edescription, $file_PDFname, $filename_en, $file_WORDname, $file_ODTname, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除訂定
    public function delete_dep_formulate(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from depmethod where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }


    //設備畫面
    public function dep_equipment(Request $request)
    {
        $eduequipments = DB::select('SELECT * FROM eduequipment order by weight ASC');
        // dd($re_alltexts);
        return view('Backstage/department_profile/dep_equipment', ['eduequipments' => $eduequipments]);
    }

    //新增設備畫面
    public function add_dep_equipment_view()
    {
        return view('Backstage/department_profile/add_dep_equipment');
    }
    //新增設備
    public function add_dep_equipment(Request $request)
    {
        try {
            $classname = $request->input('classname');
            $classname_en = $request->input('classname_en');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $f_editor = $request->input('f_editor');
            $f_editor_en = $request->input('f_editor_en');

            // 取得照片
            $file = $request->file('file_img');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = null;
            }

            $weight_num = DB::select('SELECT weight FROM eduequipment');
            $num = count($weight_num);
            $weight = $num + 1;

            $add_eduequipment = DB::statement('INSERT INTO eduequipment (classname, classname_en, equipment, equipment_en,function_ch,function_en,img,weight) VALUES (?,?,?,?,?,?,?,?)',[$classname, $classname_en, $editor, $editor_en,$f_editor, $f_editor_en, $filename, $weight]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //修改設備畫面
    public function re_dep_equipment_view(Request $request)
    {
        $id = $request->input('id');
        $eduequipments = DB::select('SELECT * FROM eduequipment where id=?', [$id]);
        return view('Backstage/department_profile/re_dep_equipment', ['eduequipments' => $eduequipments]);
    }
    //修改設備
    public function re_dep_equipment(Request $request)
    {
        try {
            $id = $request->input('id');
            $eduequipments = DB::select('SELECT * FROM eduequipment where id=?', [$id]);
            foreach ($eduequipments as $eduequipment) {
                $oldfile = $eduequipment->img;
            }
            // 取得照片
            $file = $request->file('file_img');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('download'), $filename);
            } else {
                $filename = $oldfile;
            }

            $classname = $request->input('classname');
            $classname_en = $request->input('classname_en');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $f_editor = $request->input('f_editor');
            $f_editor_en = $request->input('f_editor_en');

            $update_eduequipment =  DB::update('update eduequipment set classname = ?,classname_en = ?,equipment = ?,equipment_en = ?,function_ch = ?,function_en = ?,img = ? where id=?',[$classname, $classname_en, $editor, $editor_en, $f_editor, $f_editor_en,$filename, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除設備
    public function delete_dep_equipment(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from eduequipment where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

}
