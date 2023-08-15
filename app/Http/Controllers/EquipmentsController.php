<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentsController extends Controller
{
    //空間設備
    public function equipment()
    {
        //顯示系所公告
        $eduequipments = DB::select('select * from eduequipment ORDER BY weight asc');
        return view('equipment', ['eduequipments' => $eduequipments]);
    }

    //空間設備
    public function en_equipment()
    {
        //顯示系所公告
        $eduequipments = DB::select('select * from eduequipment ORDER BY weight asc');
        return view('en/equipment', ['eduequipments' => $eduequipments]);
    }
}
