<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackstagesController extends Controller
{
    //後台顯示
    public function Backstage(){
        return view('Backstage/login');
    }
    //主頁顯示
    public function index(){
        return view('Backstage/index');
    }
    //登入
    public function login(Request $request){
        $account = $request->input('account');
        $password = $request->input('password');
        //查看資料庫中是否有該帳密
        $login = DB::select('select * from acc where acc = ? AND pass = ?',[$account,$password]);
        $result = count($login);
        if($result==0){
            return view('Backstage/login');
        }
        else{
            return view('Backstage/index');
        }
    }
}
