<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BackquicklinksController extends Controller
{
    //快速連結選擇畫面
    public function quick_link()
    {
        return view('Backstage/quick_link/quick_link');
    }

    //推廣教育畫面
    public function promote_education()
    {
        $promote_educations = DB::select('SELECT * FROM alltext where position=?', ['extensioncourse']);
        return view('Backstage/quick_link/promote_education', ['promote_educations' => $promote_educations]);
    }
    //修改推廣教育畫面
    public function re_promote_education_view(Request $request)
    {
        $id = $request->input('id');
        $re_alltexts = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/quick_link/re_promote_education', ['re_alltexts' => $re_alltexts]);
    }
    //修改推廣教育
    public function re_promote_education(Request $request)
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

    //應外系刊畫面
    public function series(Request $request)
    {
        $daflnews = DB::select('SELECT * FROM daflnews ORDER BY id DESC');
        return view('Backstage/quick_link/series', ['daflnews' => $daflnews]);
    }

    //新增應外系刊畫面
    public function add_series_view()
    {
        return view('Backstage/quick_link/add_series');
    }
    //新增應外系刊
    public function add_series(Request $request)
    {
        try {
            $series_name = $request->input('series-name');
            $series_name_en = $request->input('series-name-eng');
            $semester = $request->input('semester');
            $file = $request->file('file');
            if (isset($file)) {
                $fileOriginal = $file->getClientOriginalName();
                $file->move(public_path('download'), $fileOriginal);
            } else {
                $fileOriginal = null;
            }
            $add_daflnews = DB::statement('INSERT INTO daflnews (title, en_title,semester,file) VALUES (?,?,?,?)', [$series_name, $series_name_en, $semester, $fileOriginal]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //修改應外系刊畫面
    public function re_series_view(Request $request)
    {
        $id = $request->input('id');
        $daflnews = DB::select('SELECT * FROM daflnews where id=?', [$id]);
        return view('Backstage/quick_link/re_series', ['daflnews' => $daflnews]);
    }

    //修改應外系刊
    public function re_series(Request $request)
    {
        try {
            $id = $request->input('id');
            $daflnews_files = DB::select('SELECT * FROM daflnews where id=?', [$id]);
            foreach ($daflnews_files as $daflnews_file) {
                $oldfile = $daflnews_file->file;
            }

            $series_name = $request->input('series-name');
            $series_name_en = $request->input('series-name-eng');
            $semester = $request->input('semester');
            $file = $request->file('file');
            if (isset($file)) {
                $fileOriginal = $file->getClientOriginalName();
                $file->move(public_path('download'), $fileOriginal);
            }
            else{
                $fileOriginal = $oldfile;
            }
            $add_daflnews = DB::statement('update daflnews set title=?, en_title=?,semester=?,file=?  where id=?', [$series_name, $series_name_en, $semester, $fileOriginal,$id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除應外系刊
    public function delete_series(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from daflnews where id = ?', [$id]);
            $delete = DB::delete('delete from daflnewsimg where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //系圖書館畫面
    public function library(Request $request)
    {
        $alltexts = DB::select('SELECT * FROM alltext WHERE position=?', ['library']);
        $librarys = DB::select('SELECT * FROM library ORDER BY id DESC;');
        return view('Backstage/quick_link/library', ['alltexts' => $alltexts, 'librarys' => $librarys]);
    }
    //修改借出規則畫面
    public function re_bookrule_view(Request $request)
    {
        $id = $request->input('id');
        $re_alltexts = DB::select('SELECT * FROM alltext where id=?', [$id]);
        return view('Backstage/quick_link/re_bookrule', ['re_alltexts' => $re_alltexts]);
    }
    //修改借出規則
    public function re_bookrule(Request $request)
    {
        try {
            $id = $request->input('id');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $update_alltext =  DB::update('update alltext set dtext = ?,dtext_en = ?,date = ? where id=?', [$editor, $editor_en, $date, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //新增書籍類別畫面
    public function add_booktype_view()
    {
        $librarytypes = DB::select('SELECT * FROM librarytype');
        return view('Backstage/quick_link/add_booktype', ['librarytypes' => $librarytypes]);
    }
    //新增書籍類別
    public function add_booktype(Request $request)
    {
        try {
            $newtype = $request->input('newtype');
            $add_librarytype = DB::statement('INSERT INTO librarytype (type) VALUES (?)', [$newtype]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //刪除書籍類別畫面
    public function delete_booktype_view()
    {
        $librarytypes = DB::select('SELECT * FROM librarytype');
        return view('Backstage/quick_link/delete_booktype', ['librarytypes' => $librarytypes]);
    }
    //新增書籍類別
    public function delete_booktype(Request $request)
    {
        try {
            $id = $request->input('type');
            $delete = DB::delete('delete from librarytype where id = ?', [$id]);

            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '刪除失敗:' . $e->getMessage());
        }
    }

    //新增書籍畫面
    public function add_book_view()
    {
        $librarytypes = DB::select('SELECT * FROM librarytype');
        return view('Backstage/quick_link/add_book', ['librarytypes' => $librarytypes]);
    }
    //新增書籍
    public function add_book(Request $request)
    {
        try {
            $bookname = $request->input('bookname');
            $author = $request->input('author');
            $publish = $request->input('publish');
            $isbn = $request->input('isbn');
            $date = $request->input('date');
            $newbook = $request->input('newbook');
            $top = $request->input('top');
            $type = $request->input('type');

            $add_library = DB::statement('INSERT INTO library (bookname, author, publish, isbn, date, new, top, type) VALUES (?,?,?,?,?,?,?,?)', [$bookname, $author, $publish, $isbn, $date, $newbook, $top, $type]);

            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '新增失敗:' . $e->getMessage());
        }
    }

    //修改書籍畫面
    public function re_book_view(Request $request)
    {
        $id = $request->input('id');
        $librarys = DB::select('SELECT * FROM library where id=?', [$id]);
        $librarytypes = DB::select('SELECT * FROM librarytype');
        return view('Backstage/quick_link/re_book', ['librarys' => $librarys, 'librarytypes' => $librarytypes]);
    }
    //修改書籍
    public function re_book(Request $request)
    {
        try {
            $id = $request->input('id');
            $bookname = $request->input('bookname');
            $author = $request->input('author');
            $publish = $request->input('publish');
            $isbn = $request->input('isbn');
            $date = $request->input('date');
            $newbook = $request->input('newbook');
            $top = $request->input('top');
            $type = $request->input('type');

            $re_library = DB::update('update library set bookname = ?,author = ?,publish = ?,isbn = ?,date = ?,new = ?,top = ?,type = ? where id=?', [$bookname, $author, $publish, $isbn, $date, $newbook, $top, $type, $id]);

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '修改失敗:' . $e->getMessage());
        }
    }
    //刪除書籍
    public function delete_book(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from library where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
}
