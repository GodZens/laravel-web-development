<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarouselsController extends Controller
{
    //輪播圖顯示
    public function show_carousel(Request $request)
    {
        $carousels = DB::select('select * from frontpics ORDER BY weight ASC');
        return view('Backstage/carousel/carousel', ['carousels' => $carousels]);
    }
    //輪播圖顯示
    public function add_carousel_view()
    {
        return view('Backstage/carousel/add_carousel');
    }
    //新增輪播圖
    public function add_carousel(Request $request)
    {
        try {
            $file = $request->file('file');
            if ($file != null) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('frontpics'), $filename);
            } else {
                $filename = null;
            }
            $weight_num = DB::select('SELECT weight FROM frontpics');
            $num = count($weight_num);
            $weight = $num + 1;
            $add_carousel = DB::statement('INSERT INTO frontpics (name,file,weight) VALUES (?,?,?)', [$filename, $filename, $weight]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //刪除輪播圖圖片
    public function delete_carousel(Request $request)
    {
        try {
            $id = $request->input('id');
            $files = DB::select('SELECT * FROM frontpics where id = ?', [$id]);
            foreach ($files as $file) {
                $filename = $file->file;
            }
            $fullPath = public_path('download/') . $filename;
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            $delete = DB::delete('delete from frontpics where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
}
