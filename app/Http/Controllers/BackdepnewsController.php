<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Depnew;
use PhpParser\Node\Stmt\Foreach_;

class BackdepnewsController extends Controller
{
    //系所公告畫面
    public function depnew(Request $request)
    {
        $type = $request->input('type');

        if ($type != 'all') {

            $newscategorys = DB::select('SELECT * FROM newscategory');
            $depnews = DB::select('SELECT * FROM depnews,precategory WHERE depnews.precategory=precategory.pid AND depnews.category = ? ORDER BY weight DESC', [$type]);
        } else {
            $newscategorys = DB::select('SELECT * FROM newscategory');
            $depnews = DB::select('SELECT * FROM depnews,precategory WHERE depnews.precategory=precategory.pid ORDER BY weight DESC');
        }
        // foreach($depnews as $index => $depnew)
        // {
        //     $weight = $index+1;
        //     $id = $depnew->id;
        //     $re_depnews = DB::update('update depnews set weight=? where id=?', [$weight, $id]);
        // }
        $length = count($depnews);
        $perPage = 50; // 每頁顯示的資料筆數
        $page = request()->input('page', 1); // 當前頁碼

        $total = count($depnews); // 總筆數
        $lastPage = ceil($total / $perPage); // 最後一頁的頁碼

        $offset = ($page - 1) * $perPage; // 計算偏移量

        $depnews = array_slice($depnews, $offset, $perPage); // 根據偏移量和每頁顯示筆數來截取結果

        $depnews = new LengthAwarePaginator($depnews, $total, $perPage, $page, [
            'path' => request()->url(), // 當前頁面的 URL
            'query' => request()->query() // 當前頁面的查詢參數
        ]);

        return view('Backstage/depnew/depnew', ['newscategorys' => $newscategorys, 'depnews' => $depnews, 'type' => $type]);
    }
    //新增系所公告畫面
    public function add_depnew_view()
    {
        $newscategorys = DB::select('SELECT * FROM newscategory');
        $precategorys = DB::select('SELECT * FROM precategory');

        return view('Backstage/depnew/add_depnew', ['newscategorys' => $newscategorys, 'precategorys' => $precategorys]);
    }
    //新增系所公告
    public function add_depnew(Request $request)
    {
        try {
            $new_depnews = DB::select('SELECT * FROM depnews ORDER BY id DESC LIMIT 1');
            foreach ($new_depnews as $new_depnew) {
                $weight = $new_depnew->weight;
            }
            $new_weight =$weight+1;
            $title = $request->input('title');
            $title_en = $request->input('eng-title');
            $type = $request->input('news-type');
            $precategory = $request->input('precategory');
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $end_time = $request->input('end-time');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $add_depnews = DB::statement('INSERT INTO depnews (title, etitle, category, precategory, date, deadline, content, econtent,weight) VALUES (?,?,?,?,?,?,?,?,?)', [$title, $title_en, $type, $precategory, $date, $end_time, $editor, $editor_en,$new_weight]);

            $new_result = DB::select('SELECT * FROM depnews ORDER BY id DESC LIMIT 1');
            $new_result = json_decode(json_encode($new_result), true);

            // $linkname = $request->input('linkname');
            // $elinkname = $request->input('elinkname');
            // $link = $request->input('link');
            // if ($linkname[0] != null) {
            //     $lnum = count($linkname);
            //     for ($i = 0; $i < $lnum; $i++) {
            //         if ($linkname[$i] != '') {
            //             $add_depnewslink = DB::statement('INSERT INTO depnewslink (id, description, edescription, link) VALUES (?,?,?,?)', [$new_result[0]['id'], $linkname[$i], $elinkname[$i], $link[$i]]);
            //         }
            //     }
            // }

            $filename = $request->input('filename');
            $efilename = $request->input('efilename');
            $file = $request->file('file');
            if ($filename[0] != null) {
                $filenum = count($filename);
                for ($i = 0; $i < $filenum; $i++) {
                    $fileOriginal = $file[$i]->getClientOriginalName();
                    $file[$i]->move(public_path('download'), $fileOriginal);
                    $add_depnewsfile = DB::statement('INSERT INTO depnewsfile (id, description, edescription, file) VALUES (?,?,?,?)', [$new_result[0]['id'], $filename[$i], $efilename[$i], $fileOriginal]);
                }
            }


            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }

    //修改系所公告畫面
    public function re_depnew_view(Request $request)
    {
        $id = $request->input('id');
        $depnews = DB::select('SELECT * FROM depnews where id=?', [$id]);
        $depnewslinks = DB::select('SELECT * FROM depnewslink where id=?', [$id]);
        $depnewsfiles = DB::select('SELECT * FROM depnewsfile where id=?', [$id]);
        $newscategorys = DB::select('SELECT * FROM newscategory');
        $precategorys = DB::select('SELECT * FROM precategory');
        return view('Backstage/depnew/re_depnew', ['depnews' => $depnews, 'depnewslinks' => $depnewslinks, 'depnewsfiles' => $depnewsfiles, 'newscategorys' => $newscategorys, 'precategorys' => $precategorys]);
    }

    //修改系所公告
    public function re_depnew(Request $request)
    {
        try {
            $id = $request->input('id');
            $title = $request->input('title');
            $title_en = $request->input('eng-title');
            $type = $request->input('news-type');
            $precategory = $request->input('precategory');
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            $end_time = $request->input('end-time');
            $editor = $request->input('editor');
            $editor_en = $request->input('editor_en');
            $re_depnews = DB::update('update depnews set title=?, etitle=?, category=?, precategory=?, date=?, deadline=?, content=?, econtent=? where id=?', [$title, $title_en, $type, $precategory, $date, $end_time, $editor, $editor_en, $id]);

            // $depnewslinks = DB::select('SELECT * FROM depnewslink where id=? order by link_id DESC', [$id]);
            // $new_depnewslink = json_decode(json_encode($depnewslinks), true);
            // $linkname = $request->input('linkname');
            // $elinkname = $request->input('elinkname');
            // $link = $request->input('link');
            // if ($linkname[0] != null) {
            //     $lnum = count($linkname);
            //     for ($i = 0; $i < $lnum; $i++) {
            //         if ($link[$i] != '') {
            //             if ($link[$i] != $new_depnewslink[$i]['link']) {
            //                 $re_depnewslink = DB::update('update depnewslink set description=?, edescription=?, link=? where link_id=?', [$linkname[$i], $elinkname[$i], $link[$i], $new_depnewslink[$i]['link_id']]);
            //             }
            //         }
            //     }
            // }

            $depnewsfiles = DB::select('SELECT * FROM depnewsfile where id=? order by file_id DESC', [$id]);
            $new_depnewsfile = json_decode(json_encode($depnewsfiles), true);
            $filename = $request->input('filename');
            $efilename = $request->input('efilename');
            $file = $request->file('file');
            if ($filename[0] != null) {
                $filenum = count($filename);
                for ($i = 0; $i < $filenum; $i++) {
                    if (isset($file[$i])) {
                        $fileOriginal = $file[$i]->getClientOriginalName();
                        if ($fileOriginal != $new_depnewsfile[$i]['file']) {
                            $file[$i]->move(public_path('download'), $fileOriginal);
                            $re_depnewsfile = DB::update('update depnewsfile set description=?, edescription=?, file=? where file_id=?', [$filename[$i], $efilename[$i], $fileOriginal, $new_depnewsfile[$i]['file_id']]);
                        }
                    } else {
                        $re_depnewsfile = DB::update('update depnewsfile set description=?, edescription=? where file_id=?', [$filename[$i], $efilename[$i], $new_depnewsfile[$i]['file_id']]);
                    }
                }
            }

            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除系所公告
    public function delete_depnew(Request $request)
    {
        try {
            $id = $request->input('id');
            $depnews = DB::delete('delete from depnews where id = ?', [$id]);
            $depnewslink = DB::delete('delete from depnewslink where id = ?', [$id]);
            $depnewsfile = DB::delete('delete from depnewsfile where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }

    #上下移
    public function move_up_depnew(Request $request)
    {
        try {
            $weight_numbers = DB::select('SELECT COUNT(*) AS count FROM depnews');
            foreach ($weight_numbers as $weight_number) {
                $total_weights = $weight_number->count;
            }
            $id = $request->input('id');
            $depnews = DB::select('SELECT weight FROM depnews where id=?', [$id]);
            foreach ($depnews as $depnew) {
                $weight = $depnew->weight;
            }
            if ($weight == $total_weights) {
                return redirect()->back()->with('success', '該位置已是最上方');
            } else {
                $new_weight = $weight + 1;
                $new_depnews = DB::select('SELECT * FROM depnews where weight=?', [$new_weight]);
                foreach ($new_depnews as $new_depnew) {
                    $new_id = $new_depnew->id;
                }
                $old_location = DB::update('update depnews set weight=? where id=?', [$new_weight, $id]);
                $new_location = DB::update('update depnews set weight=? where id=?', [$weight, $new_id]);
            }
            return redirect()->back()->with('success', '位置調換成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '位置調換失敗' . $e->getMessage());
        }
    }

    public function move_down_depnew(Request $request)
    {
        try {
            $id = $request->input('id');
            $depnews = DB::select('SELECT weight FROM depnews where id=?', [$id]);
            foreach ($depnews as $depnew) {
                $weight = $depnew->weight;
            }
            if ($weight == 1) {
                return redirect()->back()->with('success', '該位置已是最下方');
            } else {
                $new_weight = $weight - 1;
                $new_depnews = DB::select('SELECT * FROM depnews where weight=?', [$new_weight]);
                foreach ($new_depnews as $new_depnew) {
                    $new_id = $new_depnew->id;
                }
                $old_location = DB::update('update depnews set weight=? where id=?', [$new_weight, $id]);
                $new_location = DB::update('update depnews set weight=? where id=?', [$weight, $new_id]);
            }
            return redirect()->back()->with('success', '位置調換成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '位置調換失敗' . $e->getMessage());
        }
    }
}
