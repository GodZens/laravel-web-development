<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepnewsController extends Controller
{
    //顯示公告資訊
    public function depnews(Request $request){
        $id = $request->input('id');
        if($id==0){
            //顯示系所公告
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[2]);
            return view('depnews',['DAS'=>$DAS,'name'=>'系所公告']);
        }
        else if($id==1){
            //顯示最新消息
            $DAS = DB::select('select * from depnews where  CURRENT_DATE() <= deadline ORDER BY weight DESC');
            return view('depnews',['DAS'=>$DAS,'name'=>'最新消息']);
        }
        else if($id==2){
            //顯示演講資訊
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[3]);
            return view('depnews',['DAS'=>$DAS,'name'=>'演講資訊']);
        }
        else if($id==3){
            //顯示招生公告
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[4]);
            return view('depnews',['DAS'=>$DAS,'name'=>'招生公告']);
        }
        else if($id==4){
            //顯示狂賀
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[5]);
            return view('depnews',['DAS'=>$DAS,'name'=>'狂賀']);
        }
        else if($id==5){
            //顯示重要
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[6]);
            return view('depnews',['DAS'=>$DAS,'name'=>'重要']);
        }
        else if($id==6){
            //顯示最新消息
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[7]);
            return view('depnews',['DAS'=>$DAS,'name'=>'實習相關']);
        }
        else{
            return abort(404);;
        }
    }
    public function depnews_content(Request $request){
        $id = $request->input('id');
        $DAS = DB::select('select * from depnews,precategory where id = ? AND depnews.precategory = precategory.pid',[$id]);
        $DAS_links = DB::select('select * from depnewslink where id = ?',[$id]);
        $DAS_files = DB::select('select * from depnewsfile where id = ?',[$id]);
        return view('depnews_content',['DAS'=>$DAS,'DAS_links'=>$DAS_links,'DAS_files'=>$DAS_files]);
    }

    //顯示公告資訊
    public function en_depnews(Request $request){
        $id = $request->input('id');
        if($id==0){
            //顯示系所公告
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[2]);
            return view('en/depnews',['DAS'=>$DAS,'name'=>'Department announcement']);
        }
        else if($id==1){
            //顯示最新消息
            $DAS = DB::select('select * from depnews where  CURRENT_DATE() <= deadline ORDER BY weight DESC');
            return view('en/depnews',['DAS'=>$DAS,'name'=>'latest news']);
        }
        else if($id==2){
            //顯示演講資訊
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[3]);
            return view('en/depnews',['DAS'=>$DAS,'name'=>'Speech information']);
        }
        else if($id==3){
            //顯示招生公告
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[4]);
            return view('en/depnews',['DAS'=>$DAS,'name'=>'Admissions announcement']);
        }
        else if($id==4){
            //顯示狂賀
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[5]);
            return view('en/depnews',['DAS'=>$DAS,'name'=>'congratulations']);
        }
        else if($id==5){
            //顯示重要
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[6]);
            return view('en/depnews',['DAS'=>$DAS,'name'=>'important']);
        }
        else if($id==6){
            //顯示最新消息
            $DAS = DB::select('select * from depnews where precategory = ? AND CURRENT_DATE() <= deadline ORDER BY weight DESC',[7]);
            return view('en/depnews',['DAS'=>$DAS,'name'=>'Internship related']);
        }
        else{
            return abort(404);
        }
    }
    public function en_depnews_content(Request $request){
        $id = $request->input('id');
        $DAS = DB::select('select * from depnews,precategory where id = ? AND depnews.precategory = precategory.pid',[$id]);
        $DAS_links = DB::select('select * from depnewslink where id = ?',[$id]);
        $DAS_files = DB::select('select * from depnewsfile where id = ?',[$id]);
        return view('en/depnews_content',['DAS'=>$DAS,'DAS_links'=>$DAS_links,'DAS_files'=>$DAS_files]);
    }
}
