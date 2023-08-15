<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function test(){

        $tests = DB::table('daflnews')->take(20)->get();

        // $id = $request->input('id');

        // $img =  [['img'=>asset('img/莊老師圖片.jpg')],['img'=>asset('img/漸變背景.jpg')]];

        // $chosses = $img[$id];

        return view('test',['tests'=>$tests]);
    }
}
