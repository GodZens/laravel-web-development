<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepnewsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\Future_employmentsController;
use App\Http\Controllers\DepintroductsController;
use App\Http\Controllers\DepfeaturesController;
use App\Http\Controllers\DepmethodsController;
use App\Http\Controllers\EdugoalsController;
use App\Http\Controllers\InnovateachsController;
use App\Http\Controllers\CorecompetencesController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\CurriculumStructuresController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ForeignsController;
use App\Http\Controllers\AdmissionsController;
use App\Http\Controllers\ExstudentsController;
use App\Http\Controllers\DemeetingController;
use App\Http\Controllers\ForeignseriesController;
//後台
use App\Http\Controllers\BackstagesController;
use App\Http\Controllers\CarouselsController;
use App\Http\Controllers\BackdepnewsController;
use App\Http\Controllers\BackdepprofilesController;
use App\Http\Controllers\BackcurriculumsController;
use App\Http\Controllers\BackteachersController;
use App\Http\Controllers\Backdepartment_plansController;
use App\Http\Controllers\BackstudentsController;
use App\Http\Controllers\BackkeyaffairsController;
use App\Http\Controllers\BackquicklinksController;
use App\Http\Controllers\CkeditorsController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


#獲得路徑，以function形式回傳Hello world
// Route::get('/', function () {
//     return view('home_page');
// });

Route::get('/', [HomeController::class, 'Home'])->name('Home');;
Route::get('/en_home', [HomeController::class, 'en_home'])->name('en_home');
#系所公告
Route::get('/depnews', [DepnewsController::class, 'depnews'])->name('depnews');
Route::get('/depnews_content', [DepnewsController::class, 'depnews_content'])->name('depnews_content');
#系所公告英文
Route::get('/en_depnews', [DepnewsController::class, 'en_depnews'])->name('en_depnews');
Route::get('/en_depnews_content', [DepnewsController::class, 'en_depnews_content'])->name('en_depnews_content');
#學生專區
Route::match(['get', 'post'], '/students', [StudentsController::class, 'students'])->name('students');
Route::match(['get', 'post'], '/students_content', [StudentsController::class, 'students_content'])->name('students_content');
Route::get('/studentsactivity', [StudentsController::class, 'studentsactivity'])->name('studentsactivity');
Route::get('/st_activity_content', [StudentsController::class, 'st_activity_content'])->name('st_activity_content');
Route::get('/stdownload', [DownloadsController::class, 'stdownload'])->name('stdownload');
#學生專區英文
Route::match(['get', 'post'], '/en_students', [StudentsController::class, 'en_students'])->name('en_students');
Route::match(['get', 'post'], '/en_students_content', [StudentsController::class, 'en_students_content'])->name('en_students_content');
Route::get('/en_studentsactivity', [StudentsController::class, 'en_studentsactivity'])->name('en_studentsactivity');
Route::get('/en_st_activity_content', [StudentsController::class, 'en_st_activity_content'])->name('en_st_activity_content');
Route::get('/en_stdownload', [DownloadsController::class, 'en_stdownload'])->name('en_stdownload');
#論文專區
Route::match(['get', 'post'], '/thesis', [ThesisController::class, 'thesis'])->name('thesis');
Route::match(['get', 'post'], '/re_measures', [ThesisController::class, 're_measures'])->name('re_measures');
Route::match(['get', 'post'], '/re_forms', [ThesisController::class, 're_forms'])->name('re_forms');
#論文專區英文
Route::match(['get', 'post'], '/en_thesis', [ThesisController::class, 'en_thesis'])->name('en_thesis');
Route::match(['get', 'post'], '/en_re_measures', [ThesisController::class, 'en_re_measures'])->name('en_re_measures');
Route::match(['get', 'post'], '/en_re_forms', [ThesisController::class, 'en_re_forms'])->name('en_re_forms');
#實務專區
Route::match(['get', 'post'], '/practice', [PracticeController::class, 'practice'])->name('practice');
Route::match(['get', 'post'], '/practive_forms', [PracticeController::class, 'practive_forms'])->name('practive_forms');
Route::match(['get', 'post'], '/practive_intership', [PracticeController::class, 'practive_intership'])->name('practive_intership');
Route::match(['get', 'post'], '/pr_intership_content', [PracticeController::class, 'pr_intership_content'])->name('pr_intership_content');
Route::match(['get', 'post'], '/practicaltopic', [PracticeController::class, 'practicaltopic'])->name('practicaltopic');
Route::match(['get', 'post'], '/practicaltopic_paper', [PracticeController::class, 'practicaltopic_paper'])->name('practicaltopic_paper');
Route::match(['get', 'post'], '/practicaltopic_video', [PracticeController::class, 'practicaltopic_video'])->name('practicaltopic_video');
#實務專區英文
Route::match(['get', 'post'], '/en_practice', [PracticeController::class, 'en_practice'])->name('en_practice');
Route::match(['get', 'post'], '/en_practive_forms', [PracticeController::class, 'en_practive_forms'])->name('en_practive_forms');
Route::match(['get', 'post'], '/en_practive_intership', [PracticeController::class, 'en_practive_intership'])->name('en_practive_intership');
Route::match(['get', 'post'], '/en_pr_intership_content', [PracticeController::class, 'en_pr_intership_content'])->name('en_pr_intership_content');
Route::match(['get', 'post'], '/en_practicaltopic', [PracticeController::class, 'en_practicaltopic'])->name('en_practicaltopic');
Route::match(['get', 'post'], '/en_practicaltopic_paper', [PracticeController::class, 'en_practicaltopic_paper'])->name('en_practicaltopic_paper');
Route::match(['get', 'post'], '/en_practicaltopic_video', [PracticeController::class, 'en_practicaltopic_video'])->name('en_practicaltopic_video');
#未來就業
Route::get('/future', [Future_employmentsController::class, 'future'])->name('future');
Route::get('/statistical', [Future_employmentsController::class, 'statistical'])->name('statistical');
#未來就業英文
Route::get('/en_future', [Future_employmentsController::class, 'en_future'])->name('en_future');
Route::get('/en_statistical', [Future_employmentsController::class, 'en_statistical'])->name('en_statistical');
#系所簡介
Route::get('/depintroduct', [DepintroductsController::class, 'depintroduct'])->name('depintroduct');
Route::get('/depfeatures', [DepfeaturesController::class, 'depfeatures'])->name('depfeatures');
Route::get('/depmethod', [DepmethodsController::class, 'depmethod'])->name('depmethod');
Route::get('/edugoal', [EdugoalsController::class, 'edugoal'])->name('edugoal');
Route::get('/innovateach', [InnovateachsController::class, 'innovateach'])->name('innovateach');
Route::get('/corecompetence', [CorecompetencesController::class, 'corecompetence'])->name('corecompetence');
Route::get('/equipment', [EquipmentsController::class, 'equipment'])->name('equipment');
#系所簡介英文
Route::get('/en_depintroduct', [DepintroductsController::class, 'en_depintroduct'])->name('en_depintroduct');
Route::get('/en_depfeatures', [DepfeaturesController::class, 'en_depfeatures'])->name('en_depfeatures');
Route::get('/en_depmethod', [DepmethodsController::class, 'en_depmethod'])->name('en_depmethod');
Route::get('/en_edugoal', [EdugoalsController::class, 'en_edugoal'])->name('en_edugoal');
Route::get('/en_innovateach', [InnovateachsController::class, 'en_innovateach'])->name('en_innovateach');
Route::get('/en_corecompetence', [CorecompetencesController::class, 'en_corecompetence'])->name('en_corecompetence');
Route::get('/en_equipment', [EquipmentsController::class, 'en_equipment'])->name('en_equipment');
#課程架構
Route::get('/curriculumplan', [CurriculumStructuresController::class, 'curriculumplan'])->name('curriculumplan');
Route::get('/secondlang', [CurriculumStructuresController::class, 'secondlang'])->name('secondlang');
Route::get('/coursefeature', [CurriculumStructuresController::class, 'coursefeature'])->name('coursefeature');
Route::match(['get', 'post'], '/courseflowchart', [CurriculumStructuresController::class, 'courseflowchart'])->name('courseflowchart');
Route::match(['get', 'post'], '/coursemap', [CurriculumStructuresController::class, 'coursemap'])->name('coursemap');
Route::match(['get', 'post'], '/coursestructure', [CurriculumStructuresController::class, 'coursestructure'])->name('coursestructure');
Route::match(['get', 'post'], '/graduation', [CurriculumStructuresController::class, 'graduation'])->name('graduation');
#課程架構英文
Route::get('/en_curriculumplan', [CurriculumStructuresController::class, 'en_curriculumplan'])->name('en_curriculumplan');
Route::get('/en_secondlang', [CurriculumStructuresController::class, 'en_secondlang'])->name('en_secondlang');
Route::get('/en_coursefeature', [CurriculumStructuresController::class, 'en_coursefeature'])->name('en_coursefeature');
Route::match(['get', 'post'], '/en_courseflowchart', [CurriculumStructuresController::class, 'en_courseflowchart'])->name('en_courseflowchart');
Route::match(['get', 'post'], '/en_coursemap', [CurriculumStructuresController::class, 'en_coursemap'])->name('en_coursemap');
Route::match(['get', 'post'], '/en_coursestructure', [CurriculumStructuresController::class, 'en_coursestructure'])->name('en_coursestructure');
Route::match(['get', 'post'], '/en_graduation', [CurriculumStructuresController::class, 'en_graduation'])->name('en_graduation');
#系所師資
Route::match(['get', 'post'], '/teacher', [TeachersController::class, 'teacher'])->name('teacher');
Route::match(['get', 'post'], '/teacher_content', [TeachersController::class, 'teacher_content'])->name('teacher_content');
Route::match(['get', 'post'], '/PTteacher', [TeachersController::class, 'PTteacher'])->name('PTteacher');
Route::match(['get', 'post'], '/relateteacher', [TeachersController::class, 'relateteacher'])->name('relateteacher');
Route::match(['get', 'post'], '/adstaff', [TeachersController::class, 'adstaff'])->name('adstaff');
Route::match(['get', 'post'], '/retiredteacher', [TeachersController::class, 'retiredteacher'])->name('retiredteacher');
#系所師資英文
Route::match(['get', 'post'], '/en_teacher', [TeachersController::class, 'en_teacher'])->name('en_teacher');
Route::match(['get', 'post'], '/en_teacher_content', [TeachersController::class, 'en_teacher_content'])->name('en_teacher_content');
Route::match(['get', 'post'], '/en_PTteacher', [TeachersController::class, 'en_PTteacher'])->name('en_PTteacher');
Route::match(['get', 'post'], '/en_relateteacher', [TeachersController::class, 'en_relateteacher'])->name('en_relateteacher');
Route::match(['get', 'post'], '/en_adstaff', [TeachersController::class, 'en_adstaff'])->name('en_adstaff');
Route::match(['get', 'post'], '/en_retiredteacher', [TeachersController::class, 'en_retiredteacher'])->name('en_retiredteacher');
#產學連結
Route::match(['get', 'post'], '/partner_link', [PartnersController::class, 'partner_link'])->name('partner_link');
Route::match(['get', 'post'], '/cooperation_link', [PartnersController::class, 'cooperation_link'])->name('cooperation_link');
Route::match(['get', 'post'], '/techprogram', [PartnersController::class, 'techprogram'])->name('techprogram');
Route::match(['get', 'post'], '/government', [PartnersController::class, 'government'])->name('government');
#產學連結英文
Route::match(['get', 'post'], '/en_partner_link', [PartnersController::class, 'en_partner_link'])->name('en_partner_link');
Route::match(['get', 'post'], '/en_cooperation_link', [PartnersController::class, 'en_cooperation_link'])->name('en_cooperation_link');
Route::match(['get', 'post'], '/en_techprogram', [PartnersController::class, 'en_techprogram'])->name('en_techprogram');
Route::match(['get', 'post'], '/en_government', [PartnersController::class, 'en_government'])->name('en_government');
#應外風雲榜
Route::match(['get', 'post'], '/foreign', [ForeignsController::class, 'foreign'])->name('foreign');
Route::match(['get', 'post'], '/f_certificate', [ForeignsController::class, 'f_certificate'])->name('f_certificate');
Route::match(['get', 'post'], '/f_teacher', [ForeignsController::class, 'f_teacher'])->name('f_teacher');
Route::match(['get', 'post'], '/f_outstanding', [ForeignsController::class, 'f_outstanding'])->name('f_outstanding');
#應外風雲榜英文
Route::match(['get', 'post'], '/en_foreign', [ForeignsController::class, 'en_foreign'])->name('en_foreign');
Route::match(['get', 'post'], '/en_f_certificate', [ForeignsController::class, 'en_f_certificate'])->name('en_f_certificate');
Route::match(['get', 'post'], '/en_f_teacher', [ForeignsController::class, 'en_f_teacher'])->name('en_f_teacher');
Route::match(['get', 'post'], '/en_f_outstanding', [ForeignsController::class, 'en_f_outstanding'])->name('en_f_outstanding');
#招生專區
Route::match(['get', 'post'], '/admissions', [AdmissionsController::class, 'admissions'])->name('admissions');
Route::match(['get', 'post'], '/ad_master', [AdmissionsController::class, 'ad_master'])->name('ad_master');
Route::match(['get', 'post'], '/ad_mastercourse', [AdmissionsController::class, 'ad_mastercourse'])->name('ad_mastercourse');
Route::match(['get', 'post'], '/ad_promotion', [AdmissionsController::class, 'ad_promotion'])->name('ad_promotion');
Route::match(['get', 'post'], '/ad_guide', [AdmissionsController::class, 'ad_guide'])->name('ad_guide');
Route::match(['get', 'post'], '/ad_industry', [AdmissionsController::class, 'ad_industry'])->name('ad_industry');
Route::match(['get', 'post'], '/ad_alumni', [AdmissionsController::class, 'ad_alumni'])->name('ad_alumni');
#招生專區英文
Route::match(['get', 'post'], '/en_admissions', [AdmissionsController::class, 'en_admissions'])->name('en_admissions');
Route::match(['get', 'post'], '/en_ad_master', [AdmissionsController::class, 'en_ad_master'])->name('en_ad_master');
Route::match(['get', 'post'], '/en_ad_mastercourse', [AdmissionsController::class, 'en_ad_mastercourse'])->name('en_ad_mastercourse');
Route::match(['get', 'post'], '/en_ad_promotion', [AdmissionsController::class, 'en_ad_promotion'])->name('en_ad_promotion');
Route::match(['get', 'post'], '/en_ad_guide', [AdmissionsController::class, 'en_ad_guide'])->name('en_ad_guide');
Route::match(['get', 'post'], '/en_ad_industry', [AdmissionsController::class, 'en_ad_industry'])->name('en_ad_industry');
Route::match(['get', 'post'], '/en_ad_alumni', [AdmissionsController::class, 'en_ad_alumni'])->name('en_ad_alumni');
#國際交換生
Route::match(['get', 'post'], '/ex_student', [ExstudentsController::class, 'ex_student'])->name('ex_student');
Route::match(['get', 'post'], '/ex_activity', [ExstudentsController::class, 'ex_activity'])->name('ex_activity');
Route::match(['get', 'post'], '/ex_abroad', [ExstudentsController::class, 'ex_abroad'])->name('ex_abroad');
Route::match(['get', 'post'], '/ex_department', [ExstudentsController::class, 'ex_department'])->name('ex_department');
Route::match(['get', 'post'], '/ex_report', [ExstudentsController::class, 'ex_report'])->name('ex_report');
#國際交換生英文
Route::match(['get', 'post'], '/en_ex_student', [ExstudentsController::class, 'en_ex_student'])->name('en_ex_student');
Route::match(['get', 'post'], '/en_ex_activity', [ExstudentsController::class, 'en_ex_activity'])->name('en_ex_activity');
Route::match(['get', 'post'], '/en_ex_abroad', [ExstudentsController::class, 'en_ex_abroad'])->name('en_ex_abroad');
Route::match(['get', 'post'], '/en_ex_department', [ExstudentsController::class, 'en_ex_department'])->name('en_ex_department');
Route::match(['get', 'post'], '/en_ex_report', [ExstudentsController::class, 'en_ex_report'])->name('en_ex_report');
#系務會議
Route::match(['get', 'post'], '/de_meeting', [DemeetingController::class, 'de_meeting'])->name('de_meeting');
Route::match(['get', 'post'], '/de_master', [DemeetingController::class, 'de_master'])->name('de_master');
Route::match(['get', 'post'], '/de_class', [DemeetingController::class, 'de_class'])->name('de_class');
#系務會議英文
Route::match(['get', 'post'], '/en_de_meeting', [DemeetingController::class, 'en_de_meeting'])->name('en_de_meeting');
Route::match(['get', 'post'], '/en_de_master', [DemeetingController::class, 'en_de_master'])->name('en_de_master');
Route::match(['get', 'post'], '/en_de_class', [DemeetingController::class, 'en_de_class'])->name('en_de_class');
#應外系刊
Route::match(['get', 'post'], '/foreignseries', [ForeignseriesController::class, 'foreignseries'])->name('foreignseries');
#應外系刊英文
Route::match(['get', 'post'], '/en_foreignseries', [ForeignseriesController::class, 'en_foreignseries'])->name('en_foreignseries');

Route::get('/test', [TestController::class, 'test']);



//後台
Route::get('/Backstage', [BackstagesController::class, 'Backstage'])->name('Backstage');
Route::get('/index', [BackstagesController::class, 'index'])->name('index');
Route::post('/index', [BackstagesController::class, 'login'])->name('login');




//輪播圖
Route::match(['get', 'post'], '/back_carousel', [CarouselsController::class, 'show_carousel'])->name('back_carousel');
Route::match(['get', 'post'], '/back_carousel/add_carousel_view', [CarouselsController::class, 'add_carousel_view'])->name('add_carousel_view');
Route::match(['get', 'post'], '/back_carousel/add_carousel', [CarouselsController::class, 'add_carousel'])->name('add_carousel');
Route::match(['get', 'post'], '/delete_carousel', [CarouselsController::class, 'delete_carousel'])->name('delete_carousel');
//系所公告
Route::match(['get', 'post'], '/depnew', [BackdepnewsController::class, 'depnew'])->name('depnew');
Route::match(['get', 'post'], '/depnew/add_depnew_view', [BackdepnewsController::class, 'add_depnew_view'])->name('add_depnew_view');
Route::match(['get', 'post'], '/depnew/add_depnew', [BackdepnewsController::class, 'add_depnew'])->name('add_depnew');
Route::match(['get', 'post'], '/depnew/re_depnew_view', [BackdepnewsController::class, 're_depnew_view'])->name('re_depnew_view');
Route::match(['get', 'post'], '/depnew/re_depnew', [BackdepnewsController::class, 're_depnew'])->name('re_depnew');
Route::match(['get', 'post'], '/depnew/delete_depnew', [BackdepnewsController::class, 'delete_depnew'])->name('delete_depnew');
Route::match(['get', 'post'], '/depnew/move_up_depnew', [BackdepnewsController::class, 'move_up_depnew'])->name('move_up_depnew');
Route::match(['get', 'post'], '/depnew/move_down_depnew', [BackdepnewsController::class, 'move_down_depnew'])->name('move_down_depnew');


//系所簡介
Route::match(['get', 'post'], '/back_profile/dep_profile', [BackdepprofilesController::class, 'dep_profile'])->name('dep_profile');
Route::match(['get', 'post'], '/back_profile/introduction', [BackdepprofilesController::class, 'introduction'])->name('introduction');
Route::match(['get', 'post'], '/back_profile/re_introduction_view', [BackdepprofilesController::class, 're_introduction_view'])->name('re_introduction_view');
Route::match(['get', 'post'], '/back_profile/re_introduction', [BackdepprofilesController::class, 're_introduction'])->name('re_introduction');

Route::match(['get', 'post'], '/back_profile/dep_formulate', [BackdepprofilesController::class, 'dep_formulate'])->name('dep_formulate');
Route::match(['get', 'post'], '/back_profile/add_dep_formulate_view', [BackdepprofilesController::class, 'add_dep_formulate_view'])->name('add_dep_formulate_view');
Route::match(['get', 'post'], '/back_profile/add_dep_formulate', [BackdepprofilesController::class, 'add_dep_formulate'])->name('add_dep_formulate');
Route::match(['get', 'post'], '/back_profile/re_dep_formulate_view', [BackdepprofilesController::class, 're_dep_formulate_view'])->name('re_dep_formulate_view');
Route::match(['get', 'post'], '/back_profile/re_dep_formulate', [BackdepprofilesController::class, 're_dep_formulate'])->name('re_dep_formulate');
Route::match(['get', 'post'], '/back_profile/delete_dep_formulate', [BackdepprofilesController::class, 'delete_dep_formulate'])->name('delete_dep_formulate');

Route::match(['get', 'post'], '/back_profile/dep_equipment', [BackdepprofilesController::class, 'dep_equipment'])->name('dep_equipment');
Route::match(['get', 'post'], '/back_profile/add_dep_equipment_view', [BackdepprofilesController::class, 'add_dep_equipment_view'])->name('add_dep_equipment_view');
Route::match(['get', 'post'], '/back_profile/add_dep_equipment', [BackdepprofilesController::class, 'add_dep_equipment'])->name('add_dep_equipment');
Route::match(['get', 'post'], '/back_profile/re_dep_equipment_view', [BackdepprofilesController::class, 're_dep_equipment_view'])->name('re_dep_equipment_view');
Route::match(['get', 'post'], '/back_profile/re_dep_equipment', [BackdepprofilesController::class, 're_dep_equipment'])->name('re_dep_equipment');
Route::match(['get', 'post'], '/back_profile/delete_dep_equipment', [BackdepprofilesController::class, 'delete_dep_equipment'])->name('delete_dep_equipment');

//課程架構
Route::match(['get', 'post'], '/back_curriculum', [BackcurriculumsController::class, 'back_curriculum'])->name('back_curriculum');
Route::match(['get', 'post'], '/back_curriculum/add_curr_year_view', [BackcurriculumsController::class, 'add_curr_year_view'])->name('add_curr_year_view');
Route::match(['get', 'post'], '/back_curriculum/add_curr_year', [BackcurriculumsController::class, 'add_curr_year'])->name('add_curr_year');
Route::match(['get', 'post'], '/back_curriculum/delete_curr_year_view', [BackcurriculumsController::class, 'delete_curr_year_view'])->name('delete_curr_year_view');
Route::match(['get', 'post'], '/back_curriculum/delete_curr_year', [BackcurriculumsController::class, 'delete_curr_year'])->name('delete_curr_year');
//新增課程流程圖
Route::match(['get', 'post'], '/back_curriculum/add_courseflow_view', [BackcurriculumsController::class, 'add_courseflow_view'])->name('add_courseflow_view');
Route::match(['get', 'post'], '/back_curriculum/add_courseflow', [BackcurriculumsController::class, 'add_courseflow'])->name('add_courseflow');
Route::match(['get', 'post'], '/back_curriculum/re_courseflow_view', [BackcurriculumsController::class, 're_courseflow_view'])->name('re_courseflow_view');
Route::match(['get', 'post'], '/back_curriculum/re_courseflow', [BackcurriculumsController::class, 're_courseflow'])->name('re_courseflow');
Route::match(['get', 'post'], '/back_curriculum/delete_courseflow', [BackcurriculumsController::class, 'delete_courseflow'])->name('delete_courseflow');
//新增課程地圖
Route::match(['get', 'post'], '/back_curriculum/add_coursemap_view', [BackcurriculumsController::class, 'add_coursemap_view'])->name('add_coursemap_view');
Route::match(['get', 'post'], '/back_curriculum/add_coursemap', [BackcurriculumsController::class, 'add_coursemap'])->name('add_coursemap');
Route::match(['get', 'post'], '/back_curriculum/re_coursemap_view', [BackcurriculumsController::class, 're_coursemap_view'])->name('re_coursemap_view');
Route::match(['get', 'post'], '/back_curriculum/re_coursemap', [BackcurriculumsController::class, 're_coursemap'])->name('re_coursemap');
Route::match(['get', 'post'], '/back_curriculum/delete_coursemap', [BackcurriculumsController::class, 'delete_coursemap'])->name('delete_coursemap');
//新增課程架構圖
Route::match(['get', 'post'], '/back_curriculum/add_courseframe_view', [BackcurriculumsController::class, 'add_courseframe_view'])->name('add_courseframe_view');
Route::match(['get', 'post'], '/back_curriculum/add_courseframe', [BackcurriculumsController::class, 'add_courseframe'])->name('add_courseframe');
Route::match(['get', 'post'], '/back_curriculum/re_courseframe_view', [BackcurriculumsController::class, 're_courseframe_view'])->name('re_courseframe_view');
Route::match(['get', 'post'], '/back_curriculum/re_courseframe', [BackcurriculumsController::class, 're_courseframe'])->name('re_courseframe');
Route::match(['get', 'post'], '/back_curriculum/delete_courseframe', [BackcurriculumsController::class, 'delete_courseframe'])->name('delete_courseframe');
//新增畢業門檻
Route::match(['get', 'post'], '/back_curriculum/add_graduation_view', [BackcurriculumsController::class, 'add_graduation_view'])->name('add_graduation_view');
Route::match(['get', 'post'], '/back_curriculum/add_graduation', [BackcurriculumsController::class, 'add_graduation'])->name('add_graduation');
Route::match(['get', 'post'], '/back_curriculum/re_graduation_view', [BackcurriculumsController::class, 're_graduation_view'])->name('re_graduation_view');
Route::match(['get', 'post'], '/back_curriculum/re_graduation', [BackcurriculumsController::class, 're_graduation'])->name('re_graduation');
Route::match(['get', 'post'], '/back_curriculum/delete_graduation', [BackcurriculumsController::class, 'delete_graduation'])->name('delete_graduation');
//修改課程規劃
Route::match(['get', 'post'], '/back_curriculum/re_courseplan_view', [BackcurriculumsController::class, 're_courseplan_view'])->name('re_courseplan_view');
Route::match(['get', 'post'], '/back_curriculum/re_courseplan', [BackcurriculumsController::class, 're_courseplan'])->name('re_courseplan');
Route::match(['get', 'post'], '/back_curriculum/delete_courseplan', [BackcurriculumsController::class, 'delete_courseplan'])->name('delete_courseplan');
//修改第二外語
Route::match(['get', 'post'], '/back_curriculum/re_secondforeign_view', [BackcurriculumsController::class, 're_secondforeign_view'])->name('re_secondforeign_view');
Route::match(['get', 'post'], '/back_curriculum/re_secondforeign', [BackcurriculumsController::class, 're_secondforeign'])->name('re_secondforeign');
Route::match(['get', 'post'], '/back_curriculum/delete_secondforeign', [BackcurriculumsController::class, 'delete_secondforeign'])->name('delete_secondforeign');
//修改課程特色
Route::match(['get', 'post'], '/back_curriculum/re_coursefeature_view', [BackcurriculumsController::class, 're_coursefeature_view'])->name('re_coursefeature_view');
Route::match(['get', 'post'], '/back_curriculum/re_coursefeature', [BackcurriculumsController::class, 're_coursefeature'])->name('re_coursefeature');
Route::match(['get', 'post'], '/back_curriculum/delete_coursefeature', [BackcurriculumsController::class, 'delete_coursefeature'])->name('delete_coursefeature');
//系所師資
Route::match(['get', 'post'], '/back_teacher', [BackteachersController::class, 'back_teacher'])->name('back_teacher');
Route::match(['get', 'post'], '/back_teacher/add_back_teacher_view', [BackteachersController::class, 'add_back_teacher_view'])->name('add_back_teacher_view');
Route::match(['get', 'post'], '/back_teacher/add_back_teacher', [BackteachersController::class, 'add_back_teacher'])->name('add_back_teacher');
Route::match(['get', 'post'], '/back_teacher/re_acc_teacher_view', [BackteachersController::class, 're_acc_teacher_view'])->name('re_acc_teacher_view');
Route::match(['get', 'post'], '/back_teacher/re_acc_teacher', [BackteachersController::class, 're_acc_teacher'])->name('re_acc_teacher');
//修改專任教師資料
Route::match(['get', 'post'], '/back_teacher/re_teacher_profile_view', [BackteachersController::class, 're_teacher_profile_view'])->name('re_teacher_profile_view');
Route::match(['get', 'post'], '/back_teacher/re_teacher_profile', [BackteachersController::class, 're_teacher_profile'])->name('re_teacher_profile');
//修改兼任教師資料
Route::match(['get', 'post'], '/back_teacher/re_p_teacher_view', [BackteachersController::class, 're_p_teacher_view'])->name('re_p_teacher_view');
Route::match(['get', 'post'], '/back_teacher/re_p_teacher', [BackteachersController::class, 're_p_teacher'])->name('re_p_teacher');
//修改相關教師資料
Route::match(['get', 'post'], '/back_teacher/re_relate_teacher_view', [BackteachersController::class, 're_relate_teacher_view'])->name('re_relate_teacher_view');
Route::match(['get', 'post'], '/back_teacher/re_relate_teacher', [BackteachersController::class, 're_relate_teacher'])->name('re_relate_teacher');
//修改辦公人員資料
Route::match(['get', 'post'], '/back_teacher/re_office_staff_view', [BackteachersController::class, 're_office_staff_view'])->name('re_office_staff_view');
Route::match(['get', 'post'], '/back_teacher/re_office_staff', [BackteachersController::class, 're_office_staff'])->name('re_office_staff');
//辦公人員職務
Route::match(['get', 'post'], '/back_teacher/office_job_view', [BackteachersController::class, 'office_job_view'])->name('office_job_view');
Route::match(['get', 'post'], '/back_teacher/add_office_job_view', [BackteachersController::class, 'add_office_job_view'])->name('add_office_job_view');
Route::match(['get', 'post'], '/back_teacher/add_office_job', [BackteachersController::class, 'add_office_job'])->name('add_office_job');
Route::match(['get', 'post'], '/back_teacher/re_office_job_view', [BackteachersController::class, 're_office_job_view'])->name('re_office_job_view');
Route::match(['get', 'post'], '/back_teacher/re_office_job', [BackteachersController::class, 're_office_job'])->name('re_office_job');
Route::match(['get', 'post'], '/back_teacher/delete_office_job', [BackteachersController::class, 'delete_office_job'])->name('delete_office_job');
//修改退休教師資料
Route::match(['get', 'post'], '/back_teacher/re_retire_teacher_view', [BackteachersController::class, 're_retire_teacher_view'])->name('re_retire_teacher_view');
Route::match(['get', 'post'], '/back_teacher/re_retire_teacher', [BackteachersController::class, 're_retire_teacher'])->name('re_retire_teacher');
//新增和修改教師榮譽
Route::match(['get', 'post'], '/back_teacher/add_teacher_honor_view', [BackteachersController::class, 'add_teacher_honor_view'])->name('add_teacher_honor_view');
Route::match(['get', 'post'], '/back_teacher/add_teacher_honor', [BackteachersController::class, 'add_teacher_honor'])->name('add_teacher_honor');
Route::match(['get', 'post'], '/back_teacher/re_teacher_honor_view', [BackteachersController::class, 're_teacher_honor_view'])->name('re_teacher_honor_view');
Route::match(['get', 'post'], '/back_teacher/re_teacher_honor', [BackteachersController::class, 're_teacher_honor'])->name('re_teacher_honor');
//修改教師經歷
Route::match(['get', 'post'], '/back_teacher/re_texperience_view', [BackteachersController::class, 're_texperience_view'])->name('re_texperience_view');
Route::match(['get', 'post'], '/back_teacher/re_texperience', [BackteachersController::class, 're_texperience'])->name('re_texperience');
Route::match(['get', 'post'], '/back_teacher/delete_texperience', [BackteachersController::class, 'delete_texperience'])->name('delete_texperience');
//修改期刊論文
Route::match(['get', 'post'], '/back_teacher/re_thesispaper_view', [BackteachersController::class, 're_thesispaper_view'])->name('re_thesispaper_view');
Route::match(['get', 'post'], '/back_teacher/re_thesispaper', [BackteachersController::class, 're_thesispaper'])->name('re_thesispaper');
Route::match(['get', 'post'], '/back_teacher/delete_thesispaper', [BackteachersController::class, 'delete_thesispaper'])->name('delete_thesispaper');
//修改研討會論文
Route::match(['get', 'post'], '/back_teacher/re_conpaper_view', [BackteachersController::class, 're_conpaper_view'])->name('re_conpaper_view');
Route::match(['get', 'post'], '/back_teacher/re_conpaper', [BackteachersController::class, 're_conpaper'])->name('re_conpaper');
Route::match(['get', 'post'], '/back_teacher/delete_conpaper', [BackteachersController::class, 'delete_conpaper'])->name('delete_conpaper');
//修改研討會發表
Route::match(['get', 'post'], '/back_teacher/re_conpublic_view', [BackteachersController::class, 're_conpublic_view'])->name('re_conpublic_view');
Route::match(['get', 'post'], '/back_teacher/re_conpublic', [BackteachersController::class, 're_conpublic'])->name('re_conpublic');
Route::match(['get', 'post'], '/back_teacher/delete_conpublic', [BackteachersController::class, 'delete_conpublic'])->name('delete_conpublic');
//修改技術報告
Route::match(['get', 'post'], '/back_teacher/re_techpaper_view', [BackteachersController::class, 're_techpaper_view'])->name('re_techpaper_view');
Route::match(['get', 'post'], '/back_teacher/re_techpaper', [BackteachersController::class, 're_techpaper'])->name('re_techpaper');
Route::match(['get', 'post'], '/back_teacher/delete_techpaper', [BackteachersController::class, 'delete_techpaper'])->name('delete_techpaper');
//修改專利
Route::match(['get', 'post'], '/back_teacher/re_techpatent_view', [BackteachersController::class, 're_techpatent_view'])->name('re_techpatent_view');
Route::match(['get', 'post'], '/back_teacher/re_techpatent', [BackteachersController::class, 're_techpatent'])->name('re_techpatent');
Route::match(['get', 'post'], '/back_teacher/delete_techpatent', [BackteachersController::class, 'delete_techpatent'])->name('delete_techpatent');
//修改專書
Route::match(['get', 'post'], '/back_teacher/re_book_view', [BackteachersController::class, 're_book_view'])->name('re_book_view');
Route::match(['get', 'post'], '/back_teacher/re_book', [BackteachersController::class, 're_book'])->name('re_book');
Route::match(['get', 'post'], '/back_teacher/delete_book', [BackteachersController::class, 'delete_book'])->name('delete_book');
//修改其他著作
Route::match(['get', 'post'], '/back_teacher/re_otherbook_view', [BackteachersController::class, 're_otherbook_view'])->name('re_otherbook_view');
Route::match(['get', 'post'], '/back_teacher/re_otherbook', [BackteachersController::class, 're_otherbook'])->name('re_otherbook');
Route::match(['get', 'post'], '/back_teacher/delete_otherbook', [BackteachersController::class, 'delete_otherbook'])->name('delete_otherbook');
//修改榮譽
Route::match(['get', 'post'], '/back_teacher/re_honor_view', [BackteachersController::class, 're_honor_view'])->name('re_honor_view');
Route::match(['get', 'post'], '/back_teacher/re_honor', [BackteachersController::class, 're_honor'])->name('re_honor');
Route::match(['get', 'post'], '/back_teacher/delete_honor', [BackteachersController::class, 'delete_honor'])->name('delete_honor');
//修改社會服務
Route::match(['get', 'post'], '/back_teacher/re_social_view', [BackteachersController::class, 're_social_view'])->name('re_social_view');
Route::match(['get', 'post'], '/back_teacher/re_social', [BackteachersController::class, 're_social'])->name('re_social');
Route::match(['get', 'post'], '/back_teacher/delete_social', [BackteachersController::class, 'delete_social'])->name('delete_social');
//刪除教師
Route::match(['get', 'post'], '/back_teacher/delete_F_teacher', [BackteachersController::class, 'delete_F_teacher'])->name('delete_F_teacher');
Route::match(['get', 'post'], '/back_teacher/delete_P_teacher', [BackteachersController::class, 'delete_P_teacher'])->name('delete_P_teacher');
Route::match(['get', 'post'], '/back_teacher/delete_relate_teacher', [BackteachersController::class, 'delete_relate_teacher'])->name('delete_relate_teacher');
Route::match(['get', 'post'], '/back_teacher/delete_office_staff', [BackteachersController::class, 'delete_office_staff'])->name('delete_office_staff');
Route::match(['get', 'post'], '/back_teacher/delete_retire_teacher', [BackteachersController::class, 'delete_retire_teacher'])->name('delete_retire_teacher');
//系所辦法
Route::match(['get', 'post'], '/department_plan', [Backdepartment_plansController::class, 'department_plan'])->name('department_plan');
Route::match(['get', 'post'], '/department_plan/add_depart_year_view', [Backdepartment_plansController::class, 'add_depart_year_view'])->name('add_depart_year_view');
Route::match(['get', 'post'], '/department_plan/add_depart_year', [Backdepartment_plansController::class, 'add_depart_year'])->name('add_depart_year');
Route::match(['get', 'post'], '/department_plan/delete_depart_year_view', [Backdepartment_plansController::class, 'delete_depart_year_view'])->name('delete_depart_year_view');
Route::match(['get', 'post'], '/department_plan/delete_depart_year', [Backdepartment_plansController::class, 'delete_depart_year'])->name('delete_depart_year');
//合作廠商
Route::match(['get', 'post'], '/department_plan/partner', [Backdepartment_plansController::class, 'partner'])->name('partner');
Route::match(['get', 'post'], '/department_plan/add_partner_view', [Backdepartment_plansController::class, 'add_partner_view'])->name('add_partner_view');
Route::match(['get', 'post'], '/department_plan/add_partner', [Backdepartment_plansController::class, 'add_partner'])->name('add_partner');
Route::match(['get', 'post'], '/department_plan/re_partner_view', [Backdepartment_plansController::class, 're_partner_view'])->name('re_partner_view');
Route::match(['get', 'post'], '/department_plan/re_partner', [Backdepartment_plansController::class, 're_partner'])->name('re_partner');
Route::match(['get', 'post'], '/department_plan/delete_partner', [Backdepartment_plansController::class, 'delete_partner'])->name('delete_partner');
//業界合作計畫
Route::match(['get', 'post'], '/department_plan/cooperation', [Backdepartment_plansController::class, 'cooperation'])->name('cooperation');
Route::match(['get', 'post'], '/department_plan/add_cooperation_view', [Backdepartment_plansController::class, 'add_cooperation_view'])->name('add_cooperation_view');
Route::match(['get', 'post'], '/department_plan/add_cooperation', [Backdepartment_plansController::class, 'add_cooperation'])->name('add_cooperation');
Route::match(['get', 'post'], '/department_plan/re_cooperation_view', [Backdepartment_plansController::class, 're_cooperation_view'])->name('re_cooperation_view');
Route::match(['get', 'post'], '/department_plan/re_cooperation', [Backdepartment_plansController::class, 're_cooperation'])->name('re_cooperation');
Route::match(['get', 'post'], '/department_plan/delete_cooperation', [Backdepartment_plansController::class, 'delete_cooperation'])->name('delete_cooperation');
//科技部計畫
Route::match(['get', 'post'], '/department_plan/technology_plan', [Backdepartment_plansController::class, 'technology_plan'])->name('technology_plan');
Route::match(['get', 'post'], '/department_plan/add_technology_plan_view', [Backdepartment_plansController::class, 'add_technology_plan_view'])->name('add_technology_plan_view');
Route::match(['get', 'post'], '/department_plan/add_technology_plan', [Backdepartment_plansController::class, 'add_technology_plan'])->name('add_technology_plan');
Route::match(['get', 'post'], '/department_plan/re_technology_plan_view', [Backdepartment_plansController::class, 're_technology_plan_view'])->name('re_technology_plan_view');
Route::match(['get', 'post'], '/department_plan/re_technology_plan', [Backdepartment_plansController::class, 're_technology_plan'])->name('re_technology_plan');
Route::match(['get', 'post'], '/department_plan/delete_technology_plan', [Backdepartment_plansController::class, 'delete_technology_plan'])->name('delete_technology_plan');
//政府部門輔助
Route::match(['get', 'post'], '/department_plan/back_government', [Backdepartment_plansController::class, 'back_government'])->name('back_government');
Route::match(['get', 'post'], '/department_plan/add_government_view', [Backdepartment_plansController::class, 'add_government_view'])->name('add_government_view');
Route::match(['get', 'post'], '/department_plan/add_government', [Backdepartment_plansController::class, 'add_government'])->name('add_government');
Route::match(['get', 'post'], '/department_plan/re_government_view', [Backdepartment_plansController::class, 're_government_view'])->name('re_government_view');
Route::match(['get', 'post'], '/department_plan/re_government', [Backdepartment_plansController::class, 're_government'])->name('re_government');
Route::match(['get', 'post'], '/department_plan/delete_government', [Backdepartment_plansController::class, 'delete_government'])->name('delete_government');
//學生專區
Route::match(['get', 'post'], '/back_student', [BackstudentsController::class, 'back_student'])->name('back_student');
//新增學生學年度
Route::match(['get', 'post'], '/back_student/add_st_year_view', [BackstudentsController::class, 'add_st_year_view'])->name('add_st_year_view');
Route::match(['get', 'post'], '/back_student/add_st_year', [BackstudentsController::class, 'add_st_year'])->name('add_st_year');
//刪除學生學年度
Route::match(['get', 'post'], '/back_student/delete_st_year_view', [BackstudentsController::class, 'delete_st_year_view'])->name('delete_st_year_view');
Route::match(['get', 'post'], '/back_student/delete_st_year', [BackstudentsController::class, 'delete_st_year'])->name('delete_st_year');
//未來就業
Route::match(['get', 'post'], '/back_student/future_employment', [BackstudentsController::class, 'future_employment'])->name('future_employment');
Route::match(['get', 'post'], '/back_student/addcategory_view', [BackstudentsController::class, 'addcategory_view'])->name('addcategory_view');
Route::match(['get', 'post'], '/back_student/addcategory', [BackstudentsController::class, 'addcategory'])->name('addcategory');
Route::match(['get', 'post'], '/back_student/deletecategory', [BackstudentsController::class, 'deletecategory'])->name('deletecategory');
Route::match(['get', 'post'], '/back_student/addjobtitle_view', [BackstudentsController::class, 'addjobtitle_view'])->name('addjobtitle_view');
Route::match(['get', 'post'], '/back_student/addjobtitle', [BackstudentsController::class, 'addjobtitle'])->name('addjobtitle');
Route::match(['get', 'post'], '/back_student/deletejobtitle', [BackstudentsController::class, 'deletejobtitle'])->name('deletejobtitle');
Route::match(['get', 'post'], '/back_student/addinformation_view', [BackstudentsController::class, 'addinformation_view'])->name('addinformation_view');
Route::match(['get', 'post'], '/back_student/addinformation', [BackstudentsController::class, 'addinformation'])->name('addinformation');
Route::match(['get', 'post'], '/back_student/fe_modification_view', [BackstudentsController::class, 'fe_modification_view'])->name('fe_modification_view');
Route::match(['get', 'post'], '/back_student/fe_modification', [BackstudentsController::class, 'fe_modification'])->name('fe_modification');
Route::match(['get', 'post'], '/back_student/de_future_employment', [BackstudentsController::class, 'de_future_employment'])->name('de_future_employment');
//學生作品
Route::match(['get', 'post'], '/back_student/student_work_view', [BackstudentsController::class, 'student_work_view'])->name('student_work_view');
Route::match(['get', 'post'], '/back_student/add_sw_result_view', [BackstudentsController::class, 'add_sw_result_view'])->name('add_sw_result_view');
Route::match(['get', 'post'], '/back_student/add_sw_result', [BackstudentsController::class, 'add_sw_result'])->name('add_sw_result');
Route::match(['get', 'post'], '/back_student/delete_studentwork', [BackstudentsController::class, 'delete_studentwork'])->name('delete_studentwork');
Route::match(['get', 'post'], '/back_student/re_sw_result_view', [BackstudentsController::class, 're_sw_result_view'])->name('re_sw_result_view');
Route::match(['get', 'post'], '/back_student/re_sw_result', [BackstudentsController::class, 're_sw_result'])->name('re_sw_result');
//學生活動
Route::match(['get', 'post'], '/back_student/student_activate_view', [BackstudentsController::class, 'student_activate_view'])->name('student_activate_view');
Route::match(['get', 'post'], '/back_student/add_st_activate_view', [BackstudentsController::class, 'add_st_activate_view'])->name('add_st_activate_view');
Route::match(['get', 'post'], '/back_student/add_st_activate', [BackstudentsController::class, 'add_st_activate'])->name('add_st_activate');
Route::match(['get', 'post'], '/back_student/re_st_activate_view', [BackstudentsController::class, 're_st_activate_view'])->name('re_st_activate_view');
Route::match(['get', 'post'], '/back_student/re_st_activate', [BackstudentsController::class, 're_st_activate'])->name('re_st_activate');
Route::match(['get', 'post'], '/back_student/delete_st_activate', [BackstudentsController::class, 'delete_st_activate'])->name('delete_st_activate');
//下載專區
Route::match(['get', 'post'], '/back_student/st_download', [BackstudentsController::class, 'st_download'])->name('st_download');
Route::match(['get', 'post'], '/back_student/delete_download', [BackstudentsController::class, 'delete_download'])->name('delete_download');
Route::match(['get', 'post'], '/back_student/add_download_view', [BackstudentsController::class, 'add_download_view'])->name('add_download_view');
Route::match(['get', 'post'], '/back_student/add_download', [BackstudentsController::class, 'add_download'])->name('add_download');
Route::match(['get', 'post'], '/back_student/practical_topics', [BackstudentsController::class, 'practical_topics'])->name('practical_topics');
#碩士論文
Route::match(['get', 'post'], '/back_student/back_thesis', [BackstudentsController::class, 'back_thesis'])->name('back_thesis');
Route::match(['get', 'post'], '/back_student/add_method_file_view', [BackstudentsController::class, 'add_method_file_view'])->name('add_method_file_view');
Route::match(['get', 'post'], '/back_student/add_method_file', [BackstudentsController::class, 'add_method_file'])->name('add_method_file');
Route::match(['get', 'post'], '/back_student/re_method_file_view', [BackstudentsController::class, 're_method_file_view'])->name('re_method_file_view');
Route::match(['get', 'post'], '/back_student/re_method_file', [BackstudentsController::class, 're_method_file'])->name('re_method_file');
Route::match(['get', 'post'], '/back_student/delete_method_file', [BackstudentsController::class, 'delete_method_file'])->name('delete_method_file');
Route::match(['get', 'post'], '/back_student/add_related_form_view', [BackstudentsController::class, 'add_related_form_view'])->name('add_related_form_view');
Route::match(['get', 'post'], '/back_student/add_related_form', [BackstudentsController::class, 'add_related_form'])->name('add_related_form');
Route::match(['get', 'post'], '/back_student/re_related_form_view', [BackstudentsController::class, 're_related_form_view'])->name('re_related_form_view');
Route::match(['get', 'post'], '/back_student/re_related_form', [BackstudentsController::class, 're_related_form'])->name('re_related_form');
Route::match(['get', 'post'], '/back_student/delete_related_form', [BackstudentsController::class, 'delete_related_form'])->name('delete_related_form');
Route::match(['get', 'post'], '/back_student/add_thesis_view', [BackstudentsController::class, 'add_thesis_view'])->name('add_thesis_view');
Route::match(['get', 'post'], '/back_student/add_thesis', [BackstudentsController::class, 'add_thesis'])->name('add_thesis');
Route::match(['get', 'post'], '/back_student/re_thesis_view', [BackstudentsController::class, 're_thesis_view'])->name('re_thesis_view');
Route::match(['get', 'post'], '/back_student/re_thesis', [BackstudentsController::class, 're_thesis'])->name('re_thesis');
Route::match(['get', 'post'], '/back_student/delete_thesis', [BackstudentsController::class, 'delete_thesis'])->name('delete_thesis');

#新增實務專題畫面
Route::match(['get', 'post'], '/back_student/add_implement_method_view', [BackstudentsController::class, 'add_implement_method_view'])->name('add_implement_method_view');
Route::match(['get', 'post'], '/back_student/add_implement_method', [BackstudentsController::class, 'add_implement_method'])->name('add_implement_method');
Route::match(['get', 'post'], '/back_student/re_implement_method_view', [BackstudentsController::class, 're_implement_method_view'])->name('re_implement_method_view');
Route::match(['get', 'post'], '/back_student/re_implement_method', [BackstudentsController::class, 're_implement_method'])->name('re_implement_method');
Route::match(['get', 'post'], '/back_student/delete_implement_method', [BackstudentsController::class, 'delete_implement_method'])->name('delete_implement_method');
Route::match(['get', 'post'], '/back_student/add_pt_download_view', [BackstudentsController::class, 'add_pt_download_view'])->name('add_pt_download_view');
Route::match(['get', 'post'], '/back_student/add_pt_download', [BackstudentsController::class, 'add_pt_download'])->name('add_pt_download');
Route::match(['get', 'post'], '/back_student/re_pt_download_view', [BackstudentsController::class, 're_pt_download_view'])->name('re_pt_download_view');
Route::match(['get', 'post'], '/back_student/re_pt_download', [BackstudentsController::class, 're_pt_download'])->name('re_pt_download');
Route::match(['get', 'post'], '/back_student/delete_pt_download', [BackstudentsController::class, 'delete_pt_download'])->name('delete_pt_download');

Route::match(['get', 'post'], '/back_student/add_internship_view', [BackstudentsController::class, 'add_internship_view'])->name('add_internship_view');
Route::match(['get', 'post'], '/back_student/add_internship', [BackstudentsController::class, 'add_internship'])->name('add_internship');
Route::match(['get', 'post'], '/back_student/re_internship_view', [BackstudentsController::class, 're_internship_view'])->name('re_internship_view');
Route::match(['get', 'post'], '/back_student/re_internship', [BackstudentsController::class, 're_internship'])->name('re_internship');
Route::match(['get', 'post'], '/back_student/delete_internship', [BackstudentsController::class, 'delete_internship'])->name('delete_internship');

Route::match(['get', 'post'], '/back_student/add_result_view', [BackstudentsController::class, 'add_result_view'])->name('add_result_view');
Route::match(['get', 'post'], '/back_student/add_result', [BackstudentsController::class, 'add_result'])->name('add_result');
Route::match(['get', 'post'], '/back_student/re_result_view', [BackstudentsController::class, 're_result_view'])->name('re_result_view');
Route::match(['get', 'post'], '/back_student/re_result', [BackstudentsController::class, 're_result'])->name('re_result');
Route::match(['get', 'post'], '/back_student/delete_result', [BackstudentsController::class, 'delete_result'])->name('delete_result');

#重點事務
Route::match(['get', 'post'], '/back_keyaffair/keyaffair', [BackkeyaffairsController::class, 'keyaffair'])->name('keyaffair');
#應外風雲榜
Route::match(['get', 'post'], '/back_keyaffair/ka_billboard', [BackkeyaffairsController::class, 'ka_billboard'])->name('ka_billboard');
#新增、刪除學年度
Route::match(['get', 'post'], '/back_keyaffair/add_ka_billboard_years_view', [BackkeyaffairsController::class, 'add_ka_billboard_years_view'])->name('add_ka_billboard_years_view');
Route::match(['get', 'post'], '/back_keyaffair/add_ka_billboard_years', [BackkeyaffairsController::class, 'add_ka_billboard_years'])->name('add_ka_billboard_years');
Route::match(['get', 'post'], '/back_keyaffair/delete_ka_billboard_years_view', [BackkeyaffairsController::class, 'delete_ka_billboard_years_view'])->name('delete_ka_billboard_years_view');
Route::match(['get', 'post'], '/back_keyaffair/delete_ka_billboard_years', [BackkeyaffairsController::class, 'delete_ka_billboard_years'])->name('delete_ka_billboard_years');
#教師榮譽
Route::match(['get', 'post'], '/back_keyaffair/add_billboard_view', [BackkeyaffairsController::class, 'add_billboard_view'])->name('add_billboard_view');
Route::match(['get', 'post'], '/back_keyaffair/add_billboard', [BackkeyaffairsController::class, 'add_billboard'])->name('add_billboard');
Route::match(['get', 'post'], '/back_keyaffair/re_billboard_view', [BackkeyaffairsController::class, 're_billboard_view'])->name('re_billboard_view');
Route::match(['get', 'post'], '/back_keyaffair/re_billboard', [BackkeyaffairsController::class, 're_billboard'])->name('re_billboard');
Route::match(['get', 'post'], '/back_keyaffair/delete_billboard', [BackkeyaffairsController::class, 'delete_billboard'])->name('delete_billboard');
#學生得獎紀錄
Route::match(['get', 'post'], '/back_keyaffair/student_award', [BackkeyaffairsController::class, 'student_award'])->name('student_award');
Route::match(['get', 'post'], '/back_keyaffair/add_student_award_view', [BackkeyaffairsController::class, 'add_student_award_view'])->name('add_student_award_view');
Route::match(['get', 'post'], '/back_keyaffair/add_student_award', [BackkeyaffairsController::class, 'add_student_award'])->name('add_student_award');
Route::match(['get', 'post'], '/back_keyaffair/re_student_award_view', [BackkeyaffairsController::class, 're_student_award_view'])->name('re_student_award_view');
Route::match(['get', 'post'], '/back_keyaffair/re_student_award', [BackkeyaffairsController::class, 're_student_award'])->name('re_student_award');
Route::match(['get', 'post'], '/back_keyaffair/delete_student_award', [BackkeyaffairsController::class, 'delete_student_award'])->name('delete_student_award');
#證照統計表
Route::match(['get', 'post'], '/back_keyaffair/certificate', [BackkeyaffairsController::class, 'certificate'])->name('certificate');
Route::match(['get', 'post'], '/back_keyaffair/add_certificate_view', [BackkeyaffairsController::class, 'add_certificate_view'])->name('add_certificate_view');
Route::match(['get', 'post'], '/back_keyaffair/add_certificate', [BackkeyaffairsController::class, 'add_certificate'])->name('add_certificate');
Route::match(['get', 'post'], '/back_keyaffair/re_certificate_view', [BackkeyaffairsController::class, 're_certificate_view'])->name('re_certificate_view');
Route::match(['get', 'post'], '/back_keyaffair/re_certificate', [BackkeyaffairsController::class, 're_certificate'])->name('re_certificate');
Route::match(['get', 'post'], '/back_keyaffair/delete_certificate', [BackkeyaffairsController::class, 'delete_certificate'])->name('delete_certificate');
Route::match(['get', 'post'], '/back_keyaffair/re_statistics_view', [BackkeyaffairsController::class, 're_statistics_view'])->name('re_statistics_view');
Route::match(['get', 'post'], '/back_keyaffair/re_statistics', [BackkeyaffairsController::class, 're_statistics'])->name('re_statistics');
#傑出校友
Route::match(['get', 'post'], '/back_keyaffair/outstanding', [BackkeyaffairsController::class, 'outstanding'])->name('outstanding');
Route::match(['get', 'post'], '/back_keyaffair/add_outstanding_view', [BackkeyaffairsController::class, 'add_outstanding_view'])->name('add_outstanding_view');
Route::match(['get', 'post'], '/back_keyaffair/add_outstanding', [BackkeyaffairsController::class, 'add_outstanding'])->name('add_outstanding');
Route::match(['get', 'post'], '/back_keyaffair/re_outstanding_view', [BackkeyaffairsController::class, 're_outstanding_view'])->name('re_outstanding_view');
Route::match(['get', 'post'], '/back_keyaffair/re_outstanding', [BackkeyaffairsController::class, 're_outstanding'])->name('re_outstanding');
Route::match(['get', 'post'], '/back_keyaffair/delete_outstanding', [BackkeyaffairsController::class, 'delete_outstanding'])->name('delete_outstanding');
#國際雙連制度
Route::match(['get', 'post'], '/back_keyaffair/double_education', [BackkeyaffairsController::class, 'double_education'])->name('double_education');
Route::match(['get', 'post'], '/back_keyaffair/add_double_education_view', [BackkeyaffairsController::class, 'add_double_education_view'])->name('add_double_education_view');
Route::match(['get', 'post'], '/back_keyaffair/add_double_education', [BackkeyaffairsController::class, 'add_double_education'])->name('add_double_education');
Route::match(['get', 'post'], '/back_keyaffair/re_double_education_view', [BackkeyaffairsController::class, 're_double_education_view'])->name('re_double_education_view');
Route::match(['get', 'post'], '/back_keyaffair/re_double_education', [BackkeyaffairsController::class, 're_double_education'])->name('re_double_education');
Route::match(['get', 'post'], '/back_keyaffair/delete_double_education', [BackkeyaffairsController::class, 'delete_double_education'])->name('delete_double_education');
Route::match(['get', 'post'], '/back_keyaffair/re_doublemethod_view', [BackkeyaffairsController::class, 're_doublemethod_view'])->name('re_doublemethod_view');
Route::match(['get', 'post'], '/back_keyaffair/re_doublemethod', [BackkeyaffairsController::class, 're_doublemethod'])->name('re_doublemethod');
#國際交換生
Route::match(['get', 'post'], '/back_keyaffair/st_exchange', [BackkeyaffairsController::class, 'st_exchange'])->name('st_exchange');
#申請資格
Route::match(['get', 'post'], '/back_keyaffair/petition_form', [BackkeyaffairsController::class, 'petition_form'])->name('petition_form');
Route::match(['get', 'post'], '/back_keyaffair/re_petition_form_view', [BackkeyaffairsController::class, 're_petition_form_view'])->name('re_petition_form_view');
Route::match(['get', 'post'], '/back_keyaffair/re_petition_form', [BackkeyaffairsController::class, 're_petition_form'])->name('re_petition_form');
#交換生名單
Route::match(['get', 'post'], '/back_keyaffair/student_list', [BackkeyaffairsController::class, 'student_list'])->name('student_list');
Route::match(['get', 'post'], '/back_keyaffair/add_student_list_view', [BackkeyaffairsController::class, 'add_student_list_view'])->name('add_student_list_view');
Route::match(['get', 'post'], '/back_keyaffair/add_student_list', [BackkeyaffairsController::class, 'add_student_list'])->name('add_student_list');
Route::match(['get', 'post'], '/back_keyaffair/re_student_list_view', [BackkeyaffairsController::class, 're_student_list_view'])->name('re_student_list_view');
Route::match(['get', 'post'], '/back_keyaffair/re_student_list', [BackkeyaffairsController::class, 're_student_list'])->name('re_student_list');
Route::match(['get', 'post'], '/back_keyaffair/delete_student_list', [BackkeyaffairsController::class, 'delete_student_list'])->name('delete_student_list');
#學生心得報告
Route::match(['get', 'post'], '/back_keyaffair/report', [BackkeyaffairsController::class, 'report'])->name('report');
Route::match(['get', 'post'], '/back_keyaffair/add_report_view', [BackkeyaffairsController::class, 'add_report_view'])->name('add_report_view');
Route::match(['get', 'post'], '/back_keyaffair/add_report', [BackkeyaffairsController::class, 'add_report'])->name('add_report');
Route::match(['get', 'post'], '/back_keyaffair/re_report_view', [BackkeyaffairsController::class, 're_report_view'])->name('re_report_view');
Route::match(['get', 'post'], '/back_keyaffair/re_report', [BackkeyaffairsController::class, 're_report'])->name('re_report');
Route::match(['get', 'post'], '/back_keyaffair/delete_report', [BackkeyaffairsController::class, 'delete_report'])->name('delete_report');
Route::match(['get', 'post'], '/back_keyaffair/add_country_view', [BackkeyaffairsController::class, 'add_country_view'])->name('add_country_view');
Route::match(['get', 'post'], '/back_keyaffair/add_country', [BackkeyaffairsController::class, 'add_country'])->name('add_country');
Route::match(['get', 'post'], '/back_keyaffair/delete_country_view', [BackkeyaffairsController::class, 'delete_country_view'])->name('delete_country_view');
Route::match(['get', 'post'], '/back_keyaffair/delete_country', [BackkeyaffairsController::class, 'delete_country'])->name('delete_country');
#活動照片
Route::match(['get', 'post'], '/back_keyaffair/activity_photo', [BackkeyaffairsController::class, 'activity_photo'])->name('activity_photo');
Route::match(['get', 'post'], '/back_keyaffair/add_activity_photo_view', [BackkeyaffairsController::class, 'add_activity_photo_view'])->name('add_activity_photo_view');
Route::match(['get', 'post'], '/back_keyaffair/add_activity_photo', [BackkeyaffairsController::class, 'add_activity_photo'])->name('add_activity_photo');
Route::match(['get', 'post'], '/back_keyaffair/re_activity_photo_view', [BackkeyaffairsController::class, 're_activity_photo_view'])->name('re_activity_photo_view');
Route::match(['get', 'post'], '/back_keyaffair/re_activity_photo', [BackkeyaffairsController::class, 're_activity_photo'])->name('re_activity_photo');
Route::match(['get', 'post'], '/back_keyaffair/delete_activity_photo', [BackkeyaffairsController::class, 'delete_activity_photo'])->name('delete_activity_photo');
#招生專區
Route::match(['get', 'post'], '/back_keyaffair/admission', [BackkeyaffairsController::class, 'admission'])->name('admission');
#招生公告(大學部)
Route::match(['get', 'post'], '/back_keyaffair/add_admission_view', [BackkeyaffairsController::class, 'add_admission_view'])->name('add_admission_view');
Route::match(['get', 'post'], '/back_keyaffair/add_admission', [BackkeyaffairsController::class, 'add_admission'])->name('add_admission');
Route::match(['get', 'post'], '/back_keyaffair/re_admission_view', [BackkeyaffairsController::class, 're_admission_view'])->name('re_admission_view');
Route::match(['get', 'post'], '/back_keyaffair/re_admission', [BackkeyaffairsController::class, 're_admission'])->name('re_admission');
Route::match(['get', 'post'], '/back_keyaffair/delete_admission', [BackkeyaffairsController::class, 'delete_admission'])->name('delete_admission');
#考古題
Route::match(['get', 'post'], '/back_keyaffair/add_institute_view', [BackkeyaffairsController::class, 'add_institute_view'])->name('add_institute_view');
Route::match(['get', 'post'], '/back_keyaffair/add_institute', [BackkeyaffairsController::class, 'add_institute'])->name('add_institute');
Route::match(['get', 'post'], '/back_keyaffair/re_institute_view', [BackkeyaffairsController::class, 're_institute_view'])->name('re_institute_view');
Route::match(['get', 'post'], '/back_keyaffair/re_institute', [BackkeyaffairsController::class, 're_institute'])->name('re_institute');
Route::match(['get', 'post'], '/back_keyaffair/delete_institute', [BackkeyaffairsController::class, 'delete_institute'])->name('delete_institute');
#標竿校友
Route::match(['get', 'post'], '/back_keyaffair/add_alumni_view', [BackkeyaffairsController::class, 'add_alumni_view'])->name('add_alumni_view');
Route::match(['get', 'post'], '/back_keyaffair/add_alumni', [BackkeyaffairsController::class, 'add_alumni'])->name('add_alumni');
Route::match(['get', 'post'], '/back_keyaffair/re_alumni_view', [BackkeyaffairsController::class, 're_alumni_view'])->name('re_alumni_view');
Route::match(['get', 'post'], '/back_keyaffair/re_alumni', [BackkeyaffairsController::class, 're_alumni'])->name('re_alumni');
Route::match(['get', 'post'], '/back_keyaffair/delete_alumni', [BackkeyaffairsController::class, 'delete_alumni'])->name('delete_alumni');
#招生簡章
Route::match(['get', 'post'], '/back_keyaffair/re_recruitstudent_view', [BackkeyaffairsController::class, 're_recruitstudent_view'])->name('re_recruitstudent_view');
Route::match(['get', 'post'], '/back_keyaffair/re_recruitstudent', [BackkeyaffairsController::class, 're_recruitstudent'])->name('re_recruitstudent');
Route::match(['get', 'post'], '/back_keyaffair/delete_recruitstudent', [BackkeyaffairsController::class, 'delete_recruitstudent'])->name('delete_recruitstudent');
Route::match(['get', 'post'], '/back_keyaffair/re_master_view', [BackkeyaffairsController::class, 're_master_view'])->name('re_master_view');
Route::match(['get', 'post'], '/back_keyaffair/re_master', [BackkeyaffairsController::class, 're_master'])->name('re_master');
#系務會議
Route::match(['get', 'post'], '/back_keyaffair/meeting', [BackkeyaffairsController::class, 'meeting'])->name('meeting');
Route::match(['get', 'post'], '/back_keyaffair/re_meeting_view', [BackkeyaffairsController::class, 're_meeting_view'])->name('re_meeting_view');
Route::match(['get', 'post'], '/back_keyaffair/re_meeting', [BackkeyaffairsController::class, 're_meeting'])->name('re_meeting');
#學生產業實習
Route::match(['get', 'post'], '/back_keyaffair/industry', [BackkeyaffairsController::class, 'industry'])->name('industry');
Route::match(['get', 'post'], '/back_keyaffair/add_industry_view', [BackkeyaffairsController::class, 'add_industry_view'])->name('add_industry_view');
Route::match(['get', 'post'], '/back_keyaffair/add_industry', [BackkeyaffairsController::class, 'add_industry'])->name('add_industry');
Route::match(['get', 'post'], '/back_keyaffair/re_industry_view', [BackkeyaffairsController::class, 're_industry_view'])->name('re_industry_view');
Route::match(['get', 'post'], '/back_keyaffair/re_industry', [BackkeyaffairsController::class, 're_industry'])->name('re_industry');
Route::match(['get', 'post'], '/back_keyaffair/delete_industry', [BackkeyaffairsController::class, 'delete_industry'])->name('delete_industry');
#快速連結
Route::match(['get', 'post'], '/back_quick_link/quick_link', [BackquicklinksController::class, 'quick_link'])->name('quick_link');
#推廣教育
Route::match(['get', 'post'], '/back_quick_link/promote_education', [BackquicklinksController::class, 'promote_education'])->name('promote_education');
Route::match(['get', 'post'], '/back_quick_link/re_promote_education_view', [BackquicklinksController::class, 're_promote_education_view'])->name('re_promote_education_view');
Route::match(['get', 'post'], '/back_quick_link/re_promote_education', [BackquicklinksController::class, 're_promote_education'])->name('re_promote_education');
#應外系刊
Route::match(['get', 'post'], '/back_quick_link/series', [BackquicklinksController::class, 'series'])->name('series');
Route::match(['get', 'post'], '/back_quick_link/add_series_view', [BackquicklinksController::class, 'add_series_view'])->name('add_series_view');
Route::match(['get', 'post'], '/back_quick_link/add_series', [BackquicklinksController::class, 'add_series'])->name('add_series');
Route::match(['get', 'post'], '/back_quick_link/re_series_view', [BackquicklinksController::class, 're_series_view'])->name('re_series_view');
Route::match(['get', 'post'], '/back_quick_link/re_series_one_view', [BackquicklinksController::class, 're_series_one_view'])->name('re_series_one_view');
Route::match(['get', 'post'], '/back_quick_link/re_series', [BackquicklinksController::class, 're_series'])->name('re_series');
Route::match(['get', 'post'], '/back_quick_link/delete_series', [BackquicklinksController::class, 'delete_series'])->name('delete_series');
#系圖書館
Route::match(['get', 'post'], '/back_quick_link/library', [BackquicklinksController::class, 'library'])->name('library');
Route::match(['get', 'post'], '/back_quick_link/re_bookrule_view', [BackquicklinksController::class, 're_bookrule_view'])->name('re_bookrule_view');
Route::match(['get', 'post'], '/back_quick_link/re_bookrule', [BackquicklinksController::class, 're_bookrule'])->name('re_bookrule');
#類別
Route::match(['get', 'post'], '/back_quick_link/add_booktype_view', [BackquicklinksController::class, 'add_booktype_view'])->name('add_booktype_view');
Route::match(['get', 'post'], '/back_quick_link/add_booktype', [BackquicklinksController::class, 'add_booktype'])->name('add_booktype');
Route::match(['get', 'post'], '/back_quick_link/delete_booktype_view', [BackquicklinksController::class, 'delete_booktype_view'])->name('delete_booktype_view');
Route::match(['get', 'post'], '/back_quick_link/delete_booktype', [BackquicklinksController::class, 'delete_booktype'])->name('delete_booktype');
#書籍
Route::match(['get', 'post'], '/back_quick_link/add_book_view', [BackquicklinksController::class, 'add_book_view'])->name('add_book_view');
Route::match(['get', 'post'], '/back_quick_link/add_book', [BackquicklinksController::class, 'add_book'])->name('add_book');
Route::match(['get', 'post'], '/back_quick_link/re_book_view', [BackquicklinksController::class, 're_book_view'])->name('re_book_view');
Route::match(['get', 'post'], '/back_quick_link/re_book', [BackquicklinksController::class, 're_book'])->name('re_book');
Route::match(['get', 'post'], '/back_quick_link/delete_book', [BackquicklinksController::class, 'delete_book'])->name('delete_book');

//ckeditor路由
Route::match(['get', 'post'], '/Ckeditor/upload', [CkeditorsController::class, 'ckeditor_upload'])->name('ckeditor.upload');
// Route::post('/index',[BackstagesController::class,'Backstage'])->name('Backstage');
// Route::post('/students',[StudentsController::class,'show_studentwork'])->name('show_studentwork');
