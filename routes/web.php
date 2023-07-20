<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_page;
use App\Http\Controllers\users_controle;
use App\Http\Controllers\milling_operation;
use App\Http\Controllers\storage_control;
use App\Http\Controllers\equ_control;
use App\Http\Controllers\controlle_storages_setting;
use App\Http\Controllers\noifi_control;
use App\Http\Controllers\PDF_control;
use App\Http\Controllers\Procurement;
use App\Http\Controllers\stop_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\show_data_equp;
use App\Events\show_pay_data;
use App\Events\who_pay;
use App\Events\i_open;
use App\Events\stop_reports;
use App\Events\count_buy_report;
use App\Events\get_data_changes;
use Illuminate\Support\Facades\DB;
use App\Models\data_part;
use App\Models\paper_part;
use App\Models\User;


Route::get('/', function () { return redirect()->route('login'); });


Route::get('/login', function () {
    if(Auth::guard('users')->check()||Auth::guard('admins')->check()||Auth::guard('top_admins')->check())
    {
        return redirect()->route('sections');
    }else{
        return view('welcome');
    }
})->name('login');

Route::post('/enter_page',[controller_page::class,'enter_page'])->name('enter_page');
Route::get('/Sign_out',[controller_page::class,'Sign_out'])->name('Sign_out');



Route::middleware('if_login')->group(function () {
    

Route::get('/egyption_swiss', function () {
    if(Auth::guard('users')->check()||Auth::guard('admins')->check()||Auth::guard('top_admins')->check())
    {
        return view('home');
    }else{
        return redirect()->route('login');
    }
})->name('sections');


///////////////////////////////// this functions for dashboard \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/users_show', [users_controle::class, 'users_show']);
Route::get('/admins_show', [users_controle::class, 'admins_show']);
Route::get('/topadmins_show', [users_controle::class, 'topadmins_show']);//
Route::post('/delete_users_table', [users_controle::class, 'delete_users_table']);
Route::post('/edit_users_table', [users_controle::class, 'edit_users_table']);
Route::post('/save_change_data_now', [users_controle::class, 'save_change_data_now']);
Route::post('/sender_', [Procurement::class, 'sender_']);



///////////////////////////////// this functions for emails \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/Add_mail', [users_controle::class, 'Add_mail']);
Route::post('/dropz', [users_controle::class, 'dropz']);
Route::post('/editz', [users_controle::class, 'editz']);
Route::post('/update_mail', [users_controle::class, 'update_mail']);


///////////////////////////////// this functions for my setting \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/change_my_data', [users_controle::class, 'change_my_data']);
Route::get('/Events', [users_controle::class, 'Events']);
Route::post('/save_now_user', [users_controle::class, 'save_now_user']);



///////////////////////////////// this functions for calendar \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::get('/tool_add', [users_controle::class, 'tool_add']);
Route::get('/tool_update', [users_controle::class, 'tool_update']);
Route::get('/tool_edit', [users_controle::class, 'tool_edit']);
Route::get('/tool_drop', [users_controle::class, 'tool_drop']);
Route::post('/maintenance_db',function(){
    return response()->json(DB::table('maintenance_db')->get());
});



///////////////////////////////// this functions for milling \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\   
Route::post('/get_data_report_for_edit', [milling_operation::class, 'get_data_report_for_edit']);
Route::post('/update_in_milling', [milling_operation::class, 'update_in_milling']);
Route::post('/add_in_milling', [milling_operation::class, 'add_in_milling']);
Route::post('/date_search', [milling_operation::class, 'give_me_this_report']);
Route::post('/git_id_milling', [milling_operation::class, 'git_id_milling']);//
Route::post('/get_all_mails', [milling_operation::class, 'get_all_mails']);
Route::post('/send_mail_for_all', [milling_operation::class, 'send_mail_for_all']);
Route::post('/send_mails', [milling_operation::class, 'send_mails']);

Route::post('/calcuo', function (Request $R) {
    $d1 = new DateTime($R->stop_time);
    $d2 = new DateTime($R->start_time);
    $interval = $d1->diff($d2);
    $diffInSeconds = $interval->s;
    $diffInHours   = $interval->h;
    $diffInMinutes  = $interval->i;
    return response()->json(['h'=>$diffInHours,'m'=>$diffInMinutes,'s'=>$diffInSeconds]);
});


///////////////////////////////// this functions for storage \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Route::post('/save_pay_parts', [storage_control::class, 'save_pay_parts']);
Route::post('/save_add_part', [storage_control::class, 'save_add_part']);
Route::post('/save_return_add', [storage_control::class, 'save_return_add']);
Route::post('/save_Chack_Report', [storage_control::class, 'save_Chack_Report']);
Route::post('/save_order_pay', [storage_control::class, 'save_order_pay']);
Route::post('/save_order_pay2', [storage_control::class, 'save_order_pay2']);
Route::post('/get_users_of_dpart', [storage_control::class, 'get_users_of_dpart']);
Route::post('/get_list_depe', [storage_control::class, 'get_list_depe']);
Route::post('/get_all_equp',[storage_control::class,'get_all_equp']);
Route::post('/live_search_storage_name',[storage_control::class,'live_search_storage_name']);
Route::post('/live_search_storage_code',[storage_control::class,'live_search_storage_code']);



///////////////////////////////// this functions for storages setting \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/storage_settinng_data', [controlle_storages_setting::class, 'storage_settinng_data']);
Route::post('/get_data_h_b', [controlle_storages_setting::class, 'get_data_h_b']);
Route::post('/update_pay_report', [controlle_storages_setting::class, 'update_pay_report']);
Route::post('/update_add_report', [controlle_storages_setting::class, 'update_add_report']);
Route::post('/update_addreturn_report', [controlle_storages_setting::class, 'update_addreturn_report']);
Route::post('/update_check_report', [controlle_storages_setting::class, 'update_check_report']);
Route::post('/update_ordder_buy_report', [controlle_storages_setting::class, 'update_ordder_buy_report']);
Route::post('/update_ordder_buy_report1', [controlle_storages_setting::class, 'update_ordder_buy_report1']);
Route::post('/delet_dp', [controlle_storages_setting::class, 'delet_dp']);
Route::post('/get_users_of_der', [controlle_storages_setting::class, 'get_users_of_der']);




///////////////////////////////// this functions for department setting \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/create_dep', [controlle_storages_setting::class, 'create_dep']);
Route::post('/delete_element', [controlle_storages_setting::class, 'delete_element']);
Route::post('/edit_element', [controlle_storages_setting::class, 'edit_element']);
Route::post('/update_element', [controlle_storages_setting::class, 'update_element']);



///////////////////////////////// this functions for notifi setting \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/get_notifi', [noifi_control::class, 'get_notifi']);
Route::post('/accept_pay_report', [noifi_control::class, 'accept_pay_report']);
Route::post('/get_data_stop_report', [noifi_control::class, 'get_data_stop_report']);
Route::post('/get_data_form_in_form', [noifi_control::class, 'get_data_form_in_form']);
Route::post('/no_accept_pay_report', [noifi_control::class, 'no_accept_pay_report']);
Route::post('/accept_stop_report', [noifi_control::class, 'accept_stop_report']);



///////////////////////////////// this functions for control the equipment \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/save_add_new_tools', [equ_control::class, 'save_add_new_tools']);
Route::post('/get_all_data', [equ_control::class, 'get_all_data']);
Route::post('/delete_this_ele', [equ_control::class, 'delete_this_ele']);
Route::post('/edit_this_ele', [equ_control::class, 'edit_this_ele']);
Route::post('/update_add_new_tools', [equ_control::class, 'update_add_new_tools']);
Route::post('/live_search_of_qu', [equ_control::class, 'live_search_of_qu']);



///////////////////////////////// this functions for the stop report \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Route::post('/get_users_controlle_milling', [stop_report::class,'get_users_controlle_milling']); 
Route::post('/save_data_stop_report', [stop_report::class, 'save_data_stop_report']);
Route::post('/get_all_equ_milling', [stop_report::class,'get_all_equ_milling']);
Route::post('/get_after_change', [stop_report::class,'get_after_change']);
Route::post('/depart_change', [stop_report::class,'depart_change']);
Route::post('/inserts_tools', [stop_report::class,'inserts_tools']);




///////////////////////////////// this functions for Procurement Section Dashboard \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/search_by_name_buy', [Procurement::class,'search_by_name_buy']);
Route::post('/search_by_date_buy', [Procurement::class,'search_by_date_buy']);
Route::post('/search_by_code_buy', [Procurement::class,'search_by_code_buy']);
Route::post('/save_now_change_buy', [Procurement::class,'save_now_change_buy']);
Route::post('/get_data_buy_sec', [Procurement::class,'get_data_buy_sec']);
Route::post('/PDF_control', [PDF_control::class,'PDF_cont']);




///////////////////////////////// this functions for the Generale report Dashboard \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/search_by_name_of_department_buy_two', [Procurement::class,'search_by_name_of_department_buy_two']);
Route::post('/search_by_menager_storage_buy_two', [Procurement::class,'search_by_menager_storage_buy_two']);
Route::post('/search_by_recipted_report_buy_two', [Procurement::class,'search_by_recipted_report_buy_two']);
Route::post('/search_by_type_report_buy_two', [Procurement::class,'search_by_type_report_buy_two']);
Route::post('/search_by_name_buy_two', [Procurement::class,'search_by_name_buy_two']);
Route::post('/search_by_date_buy_two', [Procurement::class,'search_by_date_buy_two']);
Route::post('/search_by_code_buy_two', [Procurement::class,'search_by_code_buy_two']);
Route::post('/get_data_ge_report', [Procurement::class,'get_data_ge_report']);




///////////////////////////////// this functions for the Generale 2 report Dashboard \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/search_by_name_buy_two2', [Procurement::class,'search_by_name_buy_two2']);
Route::post('/search_by_code_buy_two2', [Procurement::class,'search_by_code_buy_two2']);
Route::post('/get_data_ge_report2', [Procurement::class,'get_data_ge_report2']);




///////////////////////////////// this functions for the data_of_milling_reporets \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Route::post('/get_data_milling_reports', [equ_control::class,'get_data_milling_reports']);
Route::post('/search_by_name_milling', [equ_control::class,'search_by_name_milling']);
Route::post('/search_by_date_milling', [equ_control::class,'search_by_date_milling']);
Route::post('/search_by_code_milling', [equ_control::class,'search_by_code_milling']);




///////////////////////////////// this functions for the woraning \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ 
Route::post('/get_all_qup_need_order_buy', [Procurement::class,'get_all_qup_need_order_buy']);
/*Route::post('/search_by_name_milling', [equ_control::class,'search_by_name_milling']);
Route::post('/search_by_date_milling', [equ_control::class,'search_by_date_milling']);
Route::post('/search_by_code_milling', [equ_control::class,'search_by_code_milling']);*/


    




Route::post('/login_here',[controller_page::class,'login_here']);
});

Route::post('do_event_one/{id}',function($id){ broadcast(new who_pay($id))->toOthers(); });//llklasjfdklasdjkajdlkasjd
Route::post('notifi_stop_report/{id}',function($id){ broadcast(new stop_reports($id))->toOthers(); });
Route::post('show_data_equ',function(){ event(new show_data_equp()); });
Route::post('show_pay_dat/{id}',function($id){ broadcast(new show_pay_data($id))->toOthers(); });
Route::post('do_event_two/{id}',function($id){ broadcast(new get_data_changes($id))->toOthers(); });//broadcast(new get_data_changes($id))->toOthers();
Route::post('i_open',function(){ broadcast(new i_open())->toOthers(); });
Route::post('count_buy_report',function(){ broadcast(new count_buy_report())->toOthers(); });


Route::post('/count_notifi_api',function(){
    if(Auth::guard('users')->check())
    {
        $data=collect(DB::table('all_users_notification_p')->where('recipient',Auth::guard('users')->user()->Signature)->select('id_num')->get())->count();
        return $data;
    }
    if(Auth::guard('admins')->check())
        return DB::table('count_notification')->where('recipient', Auth::guard('admins')->user()->Signature)->sum('count');
    if(Auth::guard('top_admins')->check())
        return DB::table('all_manger_notification')->get('id_num')->count();
    });

Route::get('/data_showing',function(){
    $data=DB::table('all_users_notification_p')->where('recipient',Auth::guard('users')->user()->Signature)->orderBy('id_num', 'DESC')->get();
    return $data;
});