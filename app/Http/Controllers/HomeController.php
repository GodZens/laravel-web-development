<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //顯示最新資訊
    public function Home(){
        //顯示輪播圖
        $frontpics = DB::select('SELECT * FROM frontpics');
        //顯示系所公告
        $DAS =DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[2]);
        //顯示活動消息
        $ENS = DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[3]);
        //顯示榮譽榜
        $HRS = DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[5]);
        //顯示徵才公告
        $RAS = DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[7]);
        return view('home_page',['DAS'=>$DAS,'ENS'=>$ENS,'HRS'=>$HRS,'RAS'=>$RAS,'frontpics'=>$frontpics]);
    }

    //顯示最新資訊
    public function en_home(){
        //顯示輪播圖
        $frontpics = DB::select('SELECT * FROM frontpics');
        //顯示系所公告
        $DAS =DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[2]);
        //顯示活動消息
        $ENS = DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[3]);
        //顯示榮譽榜
        $HRS = DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[5]);
        //顯示徵才公告
        $RAS = DB::select('SELECT * FROM depnews where precategory=? AND CURRENT_DATE() <= deadline order by weight DESC LIMIT 20',[7]);
        return view('en/home_page',['DAS'=>$DAS,'ENS'=>$ENS,'HRS'=>$HRS,'RAS'=>$RAS,'frontpics'=>$frontpics]);
    }

}
