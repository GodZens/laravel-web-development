<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorsController extends Controller
{
    //
    public function ckeditor_upload(Request $request)
    {
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName,PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'.'.$extension;
            $request->file('upload')->move(public_path('img'),$fileName);
            $url = asset('img/'. $fileName);

            return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
        }
    }
}
