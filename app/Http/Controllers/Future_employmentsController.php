<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Future_employmentsController extends Controller
{
    //未來就業
    public function future()
    {
        $future_employments = DB::select('SELECT * , alumnijob.id as fe_id FROM alumnijob,alumnijob_department,alumnijob_class WHERE alumnijob.department=alumnijob_department.id AND alumnijob_department.class=alumnijob_class.id ORDER BY type DESC, year DESC');
        return view('future_employment', ['future_employments' => $future_employments]);
    }
    //各領域統計資料
    public function statistical()
    {
        $future_employments = DB::select('SELECT * , alumnijob.id as fe_id FROM alumnijob,alumnijob_department,alumnijob_class WHERE alumnijob.department=alumnijob_department.id AND alumnijob_department.class=alumnijob_class.id ORDER BY type DESC, year DESC');
        return view('statistical', ['future_employments' => $future_employments]);
    }

    //未來就業
    public function en_future()
    {
        $future_employments = DB::select('SELECT * , alumnijob.id as fe_id FROM alumnijob,alumnijob_department,alumnijob_class WHERE alumnijob.department=alumnijob_department.id AND alumnijob_department.class=alumnijob_class.id ORDER BY type DESC, year DESC');
        return view('en/future_employment', ['future_employments' => $future_employments]);
    }
    //各領域統計資料
    public function en_statistical()
    {
        $future_employments = DB::select('SELECT * , alumnijob.id as fe_id FROM alumnijob,alumnijob_department,alumnijob_class WHERE alumnijob.department=alumnijob_department.id AND alumnijob_department.class=alumnijob_class.id ORDER BY type DESC, year DESC');
        return view('en/statistical', ['future_employments' => $future_employments]);
    }
}
