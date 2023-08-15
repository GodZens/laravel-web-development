<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Backdepartment_plansController extends Controller
{
    //後台系所辦法
    public function department_plan()
    {
        return view('Backstage/department_plan/department_plan');
    }
    //新增系所辦法學年度畫面
    public function add_depart_year_view()
    {
        $departmentplan_years = DB::select('SELECT DISTINCT year FROM departmentplan_year ORDER BY year DESC');
        return view('Backstage/department_plan/add_depart_year', ['departmentplan_years' => $departmentplan_years]);
    }
    //新增系所辦法學年度
    public function add_depart_year(Request $request)
    {
        try {
            $new_year = $request->input('new_year');
            $insert_year = DB::statement('INSERT INTO departmentplan_year (year) VALUES (?)', [$new_year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //刪除系所辦法學年度畫面
    public function delete_depart_year_view()
    {
        $departmentplan_years = DB::select('SELECT DISTINCT year FROM departmentplan_year ORDER BY year DESC');
        return view('Backstage/department_plan/delete_depart_year', ['departmentplan_years' => $departmentplan_years]);
    }
    //刪除系所辦法學年度
    public function delete_depart_year(Request $request)
    {
        try {
            $delete_year = $request->input('delete_year');
            $delete = DB::delete('delete from departmentplan_year where year = ?', [$delete_year]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //合作廠商畫面
    public function partner()
    {
        $partners = DB::select('SELECT * FROM firmplan');
        return view('Backstage/department_plan/partner', ['partners' => $partners]);
    }
    //新增合作廠商畫面
    public function add_partner_view()
    {
        return view('Backstage/department_plan/add_partner');
    }
    //新增合作廠商
    public function add_partner(Request $request)
    {
        try {
            $name_ch = $request->input('name-ch');
            $name_eng = $request->input('name-eng');
            $add_partner = DB::statement('INSERT INTO firmplan (firm,efirm) VALUES (?,?)', [$name_ch, $name_eng]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改合作廠商畫面
    public function re_partner_view(Request $request)
    {
        $id = $request->input('id');
        $re_partners = DB::select('SELECT * FROM firmplan where id=?', [$id]);
        return view('Backstage/department_plan/re_partner', ['re_partners' => $re_partners]);
    }
    //修改合作廠商
    public function re_partner(Request $request)
    {
        try {
            $id = $request->input('id');
            $name_ch = $request->input('name-ch');
            $name_eng = $request->input('name-eng');
            $update_partner =  DB::update('update firmplan set firm = ?,efirm = ? where id=?', [$name_ch, $name_eng, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除合作廠商
    public function delete_partner(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from firmplan where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //業界合作畫面
    public function cooperation()
    {
        $cooperations = DB::select('SELECT * FROM industry ORDER BY id DESC');
        return view('Backstage/department_plan/cooperation', ['cooperations' => $cooperations]);
    }
    //新增業界合作畫面
    public function add_cooperation_view(Request $request)
    {
        $partners = DB::select('SELECT * FROM firmplan');
        $teachers = DB::select('SELECT * FROM teacher order by name');
        $departmentplan_years = DB::select('SELECT * FROM departmentplan_year order by year desc');
        return view('Backstage/department_plan/add_cooperation', ['partners' => $partners, 'teachers' => $teachers, 'departmentplan_years' => $departmentplan_years]);
    }
    //新增業界合作
    public function add_cooperation(Request $request)
    {
        try {
            $time = $request->input('time');
            $name = $request->input('firm');
            $ename = $request->input('efirm');
            $plan = $request->input('plan-ch');
            $eplan = $request->input('plan-eng');
            $teacher = $request->input('teacher_ch');
            $eteacher = $request->input('teacher_eng');
            $year = $request->input('year');
            //新增語法還未打
            $add_cooperation = DB::statement('INSERT INTO industry (date,firm,efirm,projectname,eprojectname,leader,eleader,year) VALUES (?,?,?,?,?,?,?,?)', [$time, $name, $ename, $plan, $eplan, $teacher, $eteacher, $year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改業界合作畫面
    public function re_cooperation_view(Request $request)
    {
        $id = $request->input('id');
        $cooperations = DB::select('SELECT * FROM industry where id=?', [$id]);
        $partners = DB::select('SELECT * FROM firmplan');
        $teachers = DB::select('SELECT * FROM teacher order by name');
        $departmentplan_years = DB::select('SELECT * FROM departmentplan_year order by year desc');
        return view('Backstage/department_plan/re_cooperation', ['partners' => $partners, 'teachers' => $teachers, 'departmentplan_years' => $departmentplan_years, 'cooperations' => $cooperations]);
    }
    //修改業界合作
    public function re_cooperation(Request $request)
    {
        try {
            $id = $request->input('id');
            $time = $request->input('time');
            $name = $request->input('firm');
            $ename = $request->input('efirm');
            $plan = $request->input('plan-ch');
            $eplan = $request->input('plan-eng');
            $teacher = $request->input('teacher_ch');
            $eteacher = $request->input('teacher_eng');
            $year = $request->input('year');
            $update_cooperation =  DB::update('update industry set date = ?,firm = ?,efirm = ?,projectname = ?,eprojectname = ?,leader = ?,eleader = ?,year = ? where id=?', [$time, $name, $ename, $plan, $eplan, $teacher, $eteacher, $year, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除業界合作
    public function delete_cooperation(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from industry where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //科技部計畫畫面
    public function technology_plan()
    {
        $technology_plans = DB::select('SELECT * FROM nsc ORDER BY id DESC');
        return view('Backstage/department_plan/technology_plan', ['technology_plans' => $technology_plans]);
    }
    //新增科技部計畫畫面
    public function add_technology_plan_view(Request $request)
    {
        $teachers = DB::select('SELECT * FROM teacher order by name');
        $departmentplan_years = DB::select('SELECT * FROM departmentplan_year order by year desc');
        return view('Backstage/department_plan/add_technology_plan', ['teachers' => $teachers, 'departmentplan_years' => $departmentplan_years]);
    }
    //新增科技部計畫
    public function add_technology_plan(Request $request)
    {
        try {
            $start = $request->input('start');
            $end = $request->input('end');
            $plan = $request->input('plan-name-ch');
            $eplan = $request->input('plan-name-eng');
            $teacher = $request->input('teacher_ch');
            $eteacher = $request->input('teacher_eng');
            $year = $request->input('year');
            $add_technology_plan = DB::statement('INSERT INTO nsc (plan_start,plan_end,projectname,eprojectname,leader,eleader,year) VALUES (?,?,?,?,?,?,?)', [$start, $end, $plan, $eplan, $teacher, $eteacher, $year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改業界合作畫面
    public function re_technology_plan_view(Request $request)
    {
        $id = $request->input('id');
        $technology_plans = DB::select('SELECT * FROM nsc where id=?', [$id]);
        $teachers = DB::select('SELECT * FROM teacher order by name');
        $departmentplan_years = DB::select('SELECT * FROM departmentplan_year order by year desc');
        return view('Backstage/department_plan/re_technology_plan', ['technology_plans' => $technology_plans, 'teachers' => $teachers, 'departmentplan_years' => $departmentplan_years]);
    }
    //修改業界合作
    public function re_technology_plan(Request $request)
    {
        try {
            $id = $request->input('id');
            $start = $request->input('start');
            $end = $request->input('end');
            $plan = $request->input('plan-name-ch');
            $eplan = $request->input('plan-name-eng');
            $teacher = $request->input('teacher_ch');
            $eteacher = $request->input('teacher_eng');
            $year = $request->input('year');
            $update_technology_plan =  DB::update('update nsc set plan_start = ?,plan_end = ?,projectname = ?,eprojectname = ?,leader = ?,eleader = ?,year = ? where id=?', [$start, $end, $plan, $eplan, $teacher, $eteacher, $year, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除業界合作
    public function delete_technology_plan(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from nsc where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
    //政府部門輔助畫面
    public function back_government()
    {
        $governments = DB::select('SELECT * FROM education ORDER BY id DESC');
        return view('Backstage/department_plan/government', ['governments' => $governments]);
    }
    //新增政府部門輔助畫面
    public function add_government_view(Request $request)
    {
        $partners = DB::select('SELECT * FROM firmplan');
        $teachers = DB::select('SELECT * FROM teacher order by name');
        $departmentplan_years = DB::select('SELECT * FROM departmentplan_year order by year desc');
        return view('Backstage/department_plan/add_government', ['partners' => $partners, 'teachers' => $teachers, 'departmentplan_years' => $departmentplan_years]);
    }
    //新增政府部門輔助
    public function add_government(Request $request)
    {
        try {
            $time = $request->input('time');
            $name = $request->input('firm');
            $ename = $request->input('efirm');
            $plan = $request->input('plan-name-ch');
            $eplan = $request->input('plan-name-eng');
            $teacher = $request->input('teacher_ch');
            $eteacher = $request->input('teacher_eng');
            $year = $request->input('year');
            $add_government = DB::statement('INSERT INTO education (date,firm,efirm,projectname,eprojectname,leader,eleader,year) VALUES (?,?,?,?,?,?,?,?)', [$time, $name, $ename, $plan, $eplan, $teacher, $eteacher, $year]);
            return redirect()->back()->with('success', '新增成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '新增失敗' . $e->getMessage());
        }
    }
    //修改政府部門輔助畫面
    public function re_government_view(Request $request)
    {
        $id = $request->input('id');
        $governments = DB::select('SELECT * FROM education where id=?', [$id]);
        $partners = DB::select('SELECT * FROM firmplan');
        $teachers = DB::select('SELECT * FROM teacher order by name');
        $departmentplan_years = DB::select('SELECT * FROM departmentplan_year order by year desc');
        return view('Backstage/department_plan/re_government', ['governments' => $governments, 'partners' => $partners, 'teachers' => $teachers, 'departmentplan_years' => $departmentplan_years]);
    }
    //修改政府部門輔助
    public function re_government(Request $request)
    {
        try {
            $id = $request->input('id');
            $time = $request->input('time');
            $name = $request->input('firm');
            $ename = $request->input('efirm');
            $plan = $request->input('plan-name-ch');
            $eplan = $request->input('plan-name-eng');
            $teacher = $request->input('teacher_ch');
            $eteacher = $request->input('teacher_eng');
            $year = $request->input('year');
            $update_government =  DB::update('update education set date = ?,firm = ?,efirm = ?,projectname = ?,eprojectname = ?,leader = ?,eleader = ?,year = ? where id=?', [$time, $name, $ename, $plan, $eplan, $teacher, $eteacher, $year, $id]);
            return redirect()->back()->with('success', '修改成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '修改失敗' . $e->getMessage());
        }
    }
    //刪除政府部門輔助
    public function delete_government(Request $request)
    {
        try {
            $id = $request->input('id');
            $delete = DB::delete('delete from education where id = ?', [$id]);
            return redirect()->back()->with('success', '刪除成功');
        } catch (\Exception $e) { #. $e->getMessage()
            return redirect()->back()->with('error', '刪除失敗' . $e->getMessage());
        }
    }
}
