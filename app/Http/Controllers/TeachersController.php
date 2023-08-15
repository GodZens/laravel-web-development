<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    //專任師資
    public function teacher()
    {
        $F_teachers = DB::select('SELECT * FROM teacher where tcategory=?', [1]);
        return view('teacher', ['F_teachers' => $F_teachers]);
    }
    //專任師資內容
    public function teacher_content(Request $request)
    {
        $name = $request->input('name');
        $teachers = DB::select('SELECT * FROM teacher where name=?', [$name]);
        $texperiences = DB::select('SELECT * FROM texperience where name=? ORDER BY position DESC', [$name]);
        //論文、研討會論文、研討會發表、技術報告、專利、專書、其他著作、榮譽、社會服務
        $thesispapers = DB::select('SELECT * FROM thesispaper where name=? ORDER BY position DESC', [$name]);
        $conpapers = DB::select('SELECT * FROM conpaper where name=? ORDER BY position DESC', [$name]);
        $conpublications = DB::select('SELECT * FROM conpublication where name=? ORDER BY position DESC', [$name]);
        $techpapers = DB::select('SELECT * FROM techpaper where name=? ORDER BY position DESC', [$name]);
        $techpatents = DB::select('SELECT * FROM techpatent where name=? ORDER BY position DESC', [$name]);
        $books = DB::select('SELECT * FROM book where name=? ORDER BY position DESC', [$name]);
        $otherbooks = DB::select('SELECT * FROM otherbook where name=? ORDER BY position DESC', [$name]);
        $honors = DB::select('SELECT * FROM honor where name=? ORDER BY position DESC', [$name]);
        $socialservices = DB::select('SELECT * FROM socialservices where name=? ORDER BY position DESC', [$name]);
        return view('teacher_content', ['teachers' => $teachers, 'texperiences' => $texperiences, 'thesispapers' => $thesispapers, 'conpapers' => $conpapers, 'conpublications' => $conpublications, 'techpapers' => $techpapers, 'techpatents' => $techpatents, 'books' => $books, 'otherbooks' => $otherbooks, 'honors' => $honors, 'socialservices' => $socialservices]);
    }
    //兼任師資
    public function PTteacher()
    {
        $PTteachers = DB::select('SELECT ability, name, email, position, education FROM teacher WHERE tcategory = ?', [2]);
        $PTcount = count($PTteachers);
        return view('PTteacher', ['PTteachers' => $PTteachers, 'PTcount' => $PTcount]);
    }
    //相關師資
    public function relateteacher()
    {
        $REteachers = DB::select('SELECT ability, name, email, position, education FROM teacher WHERE tcategory = ?', [4]);
        $REcount = count($REteachers);
        return view('relateteacher', ['REteachers' => $REteachers, 'REcount' => $REcount]);
    }
    //行政人員
    public function adstaff()
    {
        $adstaffs = DB::select('SELECT * FROM teacher WHERE tcategory = ? ORDER BY weight ASC', [3]);
        #抓取行政人員的id，並存在陣列變數中
        $adstaffs_ids = array_column($adstaffs, 'name');
        #array_fill()創建一個新的array[起始位置,數量,變數]=>[?,?,?,?,?...]
        #implode()將陣列改成字串=>'?,?,?,?,?...'
        $placeholders = implode(',', array_fill(0, count($adstaffs_ids), '?'));
        $positions = DB::select("SELECT * FROM positioncontent WHERE name IN ($placeholders)", $adstaffs_ids);
        return view('adstaff', ['adstaffs' => $adstaffs, 'positions' => $positions]);
    }
    //退休人員
    public function retiredteacher()
    {
        $reteachers = DB::select('SELECT * FROM teacher WHERE tcategory = ?', [5]);

        return view('retiredteacher', ['reteachers' => $reteachers]);
    }


    //專任師資
    public function en_teacher()
    {
        $F_teachers = DB::select('SELECT * FROM teacher where tcategory=?', [1]);
        return view('en/teacher', ['F_teachers' => $F_teachers]);
    }
    //專任師資內容
    public function en_teacher_content(Request $request)
    {
        $name = $request->input('name');
        $teachers = DB::select('SELECT * FROM teacher where name=?', [$name]);
        $texperiences = DB::select('SELECT * FROM texperience where name=? ORDER BY position DESC', [$name]);
        //論文、研討會論文、研討會發表、技術報告、專利、專書、其他著作、榮譽、社會服務
        $thesispapers = DB::select('SELECT * FROM thesispaper where name=? ORDER BY position DESC', [$name]);
        $conpapers = DB::select('SELECT * FROM conpaper where name=? ORDER BY position DESC', [$name]);
        $conpublications = DB::select('SELECT * FROM conpublication where name=? ORDER BY position DESC', [$name]);
        $techpapers = DB::select('SELECT * FROM techpaper where name=? ORDER BY position DESC', [$name]);
        $techpatents = DB::select('SELECT * FROM techpatent where name=? ORDER BY position DESC', [$name]);
        $books = DB::select('SELECT * FROM book where name=? ORDER BY position DESC', [$name]);
        $otherbooks = DB::select('SELECT * FROM otherbook where name=? ORDER BY position DESC', [$name]);
        $honors = DB::select('SELECT * FROM honor where name=? ORDER BY position DESC', [$name]);
        $socialservices = DB::select('SELECT * FROM socialservices where name=? ORDER BY position DESC', [$name]);
        return view('en/teacher_content', ['teachers' => $teachers, 'texperiences' => $texperiences, 'thesispapers' => $thesispapers, 'conpapers' => $conpapers, 'conpublications' => $conpublications, 'techpapers' => $techpapers, 'techpatents' => $techpatents, 'books' => $books, 'otherbooks' => $otherbooks, 'honors' => $honors, 'socialservices' => $socialservices]);
    }
    //兼任師資
    public function en_PTteacher()
    {
        $PTteachers = DB::select('SELECT * FROM teacher WHERE tcategory = ?', [2]);
        $PTcount = count($PTteachers);
        return view('en/PTteacher', ['PTteachers' => $PTteachers, 'PTcount' => $PTcount]);
    }
    //相關師資
    public function en_relateteacher()
    {
        $REteachers = DB::select('SELECT * FROM teacher WHERE tcategory = ?', [4]);
        $REcount = count($REteachers);
        return view('en/relateteacher', ['REteachers' => $REteachers, 'REcount' => $REcount]);
    }
    //行政人員
    public function en_adstaff()
    {
        $adstaffs = DB::select('SELECT * FROM teacher WHERE tcategory = ? ORDER BY weight ASC', [3]);
        #抓取行政人員的id，並存在陣列變數中
        $adstaffs_ids = array_column($adstaffs, 'name');
        #array_fill()創建一個新的array[起始位置,數量,變數]=>[?,?,?,?,?...]
        #implode()將陣列改成字串=>'?,?,?,?,?...'
        $placeholders = implode(',', array_fill(0, count($adstaffs_ids), '?'));
        $positions = DB::select("SELECT * FROM positioncontent WHERE name IN ($placeholders)", $adstaffs_ids);
        return view('en/adstaff', ['adstaffs' => $adstaffs, 'positions' => $positions]);
    }
    //退休人員
    public function en_retiredteacher()
    {
        $reteachers = DB::select('SELECT * FROM teacher WHERE tcategory = ?', [5]);

        return view('en/retiredteacher', ['reteachers' => $reteachers]);
    }
}
