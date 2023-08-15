<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    //下載專區
    public function stdownload(){
        $downloads = DB::select('SELECT * FROM downloadarea where category=? ORDER BY weight ASC', [1]);
        return view('stdownload', ['downloads' => $downloads]);
    }
    //下載專區
    public function en_stdownload(){
        $downloads = DB::select('SELECT * FROM downloadarea where category=? ORDER BY weight ASC', [1]);
        return view('en/stdownload', ['downloads' => $downloads]);
    }
}
