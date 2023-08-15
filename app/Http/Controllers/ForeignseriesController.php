<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForeignseriesController extends Controller
{
    //應外系刊
    public function foreignseries(Request $request)
    {
        $title = $request->input('title');
        $page = $request->input('page');
        $semester_1 = DB::select('SELECT * FROM daflnews WHERE semester=?', [1]);
        $semester_2 = DB::select('SELECT * FROM daflnews WHERE semester=?', [2]);

        return view('foreignseries', ['semester_1' => $semester_1, 'semester_2' => $semester_2]);
    }

    //應外系刊
    public function en_foreignseries(Request $request)
    {
        $title = $request->input('title');
        $page = $request->input('page');
        $titles = DB::select('SELECT * FROM daflnews');
        $daflnews = DB::select('SELECT * FROM daflnews WHERE en_title=? ORDER BY en_title DESC', [$title]);
        foreach ($daflnews as $daflnew) {
            $id = $daflnew->id;
        }
        $daflnewsimgs = DB::select('SELECT * FROM daflnewsimg where id=? ORDER BY page ASC', [$id]);
        $imgs = DB::select('SELECT * FROM daflnewsimg where id=? and page=? ORDER BY page ASC', [$id, $page]);
        return view('en/foreignseries', ['daflnews' => $daflnews, 'daflnewsimgs' => $daflnewsimgs, 'titles' => $titles, 'imgs' => $imgs, 'title' => $title]);
    }
}
